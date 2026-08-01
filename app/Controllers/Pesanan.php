<?php

namespace App\Controllers;

use App\Models\PesananModel;
use App\Models\PembayaranModel;
use App\Models\WisataModel;

class Pesanan extends BaseController
{
    public function index()
    {
        if (!session()->get('isLoggedIn')) {
            return redirect()->to(base_url('login'));
        }

        $user_id = session()->get('user_id');
        
        $db = \Config\Database::connect();
        $builder = $db->table('pemesanan p');
        $builder->select('p.*, w.nama_wisata, w.gambar, w.lokasi');
        $builder->join('objek_wisata w', 'p.id_wisata = w.id');
        $builder->where('p.id_user', $user_id);
        $builder->orderBy('p.created_at', 'DESC');
        $pesanan_list = $builder->get()->getResultArray();

        $data = [
            'title' => 'Pesanan Saya - Wisata Desa Tampa',
            'pesanan_list' => $pesanan_list
        ];

        return view('pesanan/index', $data);
    }

    public function proses()
    {
        if (!session()->get('isLoggedIn')) {
            return redirect()->to(base_url('login'));
        }

        $rules = [
            'id_wisata' => 'required|numeric',
            'tanggal_kunjungan' => 'required|valid_date',
            'jumlah_tiket' => 'required|numeric|greater_than[0]'
        ];

        if (!$this->validate($rules)) {
            session()->setFlashdata('error', 'Data pemesanan tidak valid atau tiket harus lebih dari 0!');
            return redirect()->back()->withInput();
        }

        $id_user = session()->get('user_id');
        $id_wisata = $this->request->getPost('id_wisata');
        $tanggal_kunjungan = $this->request->getPost('tanggal_kunjungan');
        $jumlah_tiket = $this->request->getPost('jumlah_tiket');

        if (strtotime($tanggal_kunjungan) < strtotime(date('Y-m-d'))) {
            session()->setFlashdata('error', 'Tanggal kunjungan tidak boleh di masa lalu!');
            return redirect()->back()->withInput();
        }

        $wisataModel = new WisataModel();
        $wisata = $wisataModel->find($id_wisata);

        if (!$wisata) {
            session()->setFlashdata('error', 'Wisata tidak ditemukan!');
            return redirect()->back();
        }

        $harga_tiket = $wisata['harga_tiket'];
        $total_harga = $harga_tiket * $jumlah_tiket;
        $kode_booking = 'TB' . strtoupper(substr(uniqid(), -6));

        $pesananModel = new PesananModel();
        $pesananModel->insert([
            'kode_booking' => $kode_booking,
            'id_user' => $id_user,
            'id_wisata' => $id_wisata,
            'tanggal_kunjungan' => $tanggal_kunjungan,
            'jumlah_tiket' => $jumlah_tiket,
            'total_harga' => $total_harga,
            'status_pembayaran' => 'belum_bayar'
        ]);

        $id_pemesanan = $pesananModel->insertID();

        session()->setFlashdata('success', 'Pemesanan berhasil! Silakan lakukan pembayaran.');
        return redirect()->to(base_url('pesanan/detail/' . $id_pemesanan));
    }

    public function detail($id)
    {
        if (!session()->get('isLoggedIn')) {
            return redirect()->to(base_url('login'));
        }

        $db = \Config\Database::connect();
        
        $builder = $db->table('pemesanan p');
        $builder->select('p.*, w.nama_wisata, w.gambar, w.lokasi, w.jam_buka, w.jam_tutup, w.bank_nama, w.bank_rekening, w.bank_atas_nama, w.ewallet_nama, w.ewallet_nomor');
        $builder->join('objek_wisata w', 'p.id_wisata = w.id');
        $builder->where('p.id', $id);
        $builder->where('p.id_user', session()->get('user_id'));
        $pesanan = $builder->get()->getRowArray();

        if (!$pesanan) {
            return redirect()->to(base_url('pesanan'));
        }

        $pembayaranModel = new PembayaranModel();
        $pembayaran = $pembayaranModel->where('id_pemesanan', $id)->first();

        $data = [
            'title' => 'Detail Pesanan #' . $pesanan['kode_booking'] . ' - Wisata Desa Tampa',
            'pesanan' => $pesanan,
            'pembayaran' => $pembayaran
        ];

        return view('pesanan/detail', $data);
    }

    public function upload_bukti()
    {
        if (!session()->get('isLoggedIn')) {
            return redirect()->to(base_url('login'));
        }

        $rules = [
            'id_pemesanan' => 'required|numeric',
            'metode_bayar' => 'required|in_list[tunai,transfer,ewallet]',
            'total_harga' => 'required|numeric'
        ];

        $metode_bayar = $this->request->getPost('metode_bayar');

        if ($metode_bayar !== 'tunai') {
            $rules['bukti_bayar'] = [
                'rules' => 'uploaded[bukti_bayar]|is_image[bukti_bayar]|mime_in[bukti_bayar,image/jpg,image/jpeg,image/png]|max_size[bukti_bayar,2048]',
                'errors' => [
                    'uploaded' => 'Bukti pembayaran wajib diunggah.',
                    'is_image' => 'File yang dipilih bukan gambar.',
                    'mime_in' => 'Format gambar harus JPG, JPEG, atau PNG.',
                    'max_size' => 'Ukuran gambar maksimal 2MB.'
                ]
            ];
        }

        if (!$this->validate($rules)) {
            session()->setFlashdata('error', implode('<br>', $this->validator->getErrors()));
            return redirect()->back();
        }

        $id_pemesanan = $this->request->getPost('id_pemesanan');
        $total_harga = $this->request->getPost('total_harga');

        $pesananModel = new PesananModel();
        $pesanan = $pesananModel->where('id', $id_pemesanan)
                                ->where('id_user', session()->get('user_id'))
                                ->first();

        if (!$pesanan) {
            session()->setFlashdata('error', 'Pesanan tidak ditemukan!');
            return redirect()->to(base_url('pesanan'));
        }

        $pembayaranModel = new PembayaranModel();

        if ($metode_bayar == 'tunai') {
            $pembayaranModel->insert([
                'id_pemesanan' => $id_pemesanan,
                'jumlah_bayar' => $total_harga,
                'metode_bayar' => $metode_bayar,
                'status' => 'pending'
            ]);

            $pesananModel->update($id_pemesanan, ['status_pembayaran' => 'menunggu_konfirmasi']);
            session()->setFlashdata('success', 'Metode tunai dipilih! Silakan bayar di loket agar dikonfirmasi.');
        } else {
            $fileBukti = $this->request->getFile('bukti_bayar');
            
            if ($fileBukti && $fileBukti->isValid() && !$fileBukti->hasMoved()) {
                $newName = $fileBukti->getRandomName();
                $fileBukti->move('uploads/bukti_bayar', $newName);

                $pembayaranModel->insert([
                    'id_pemesanan' => $id_pemesanan,
                    'jumlah_bayar' => $total_harga,
                    'metode_bayar' => $metode_bayar,
                    'bukti_bayar' => $newName,
                    'status' => 'pending'
                ]);

                $pesananModel->update($id_pemesanan, ['status_pembayaran' => 'menunggu_konfirmasi']);
                session()->setFlashdata('success', 'Bukti pembayaran berhasil diupload! Menunggu konfirmasi admin.');
            } else {
                session()->setFlashdata('error', 'Gagal mengupload bukti pembayaran.');
            }
        }

        // Tambah Notifikasi untuk Pengelola
        if ($metode_bayar == 'tunai' || isset($newName)) {
            $db = \Config\Database::connect();
            $pengelola = $db->table('users')->where('role', 'pengelola')->where('id_wisata', $pesanan['id_wisata'])->get()->getRowArray();
            if ($pengelola) {
                $notifikasiModel = new \App\Models\NotifikasiModel();
                $notifikasiModel->insert([
                    'id_user' => $pengelola['id'],
                    'judul' => 'Pesanan Menunggu Konfirmasi',
                    'pesan' => 'Pesanan baru (' . $pesanan['kode_booking'] . ') menunggu konfirmasi pembayaran.',
                    'tipe' => 'info',
                    'link' => 'admin/pemesanan/detail/' . $id_pemesanan
                ]);
            }
        }

        return redirect()->to(base_url('pesanan/detail/' . $id_pemesanan));
    }

    public function cetak($id)
    {
        if (!session()->get('isLoggedIn')) {
            return redirect()->to(base_url('login'));
        }

        $db = \Config\Database::connect();
        $builder = $db->table('pemesanan p');
        $builder->select('p.*, u.nama, u.email, w.nama_wisata, w.lokasi, w.jam_buka, w.jam_tutup');
        $builder->join('users u', 'p.id_user = u.id');
        $builder->join('objek_wisata w', 'p.id_wisata = w.id');
        $builder->where('p.id', $id);
        $builder->where('p.id_user', session()->get('user_id'));
        $pesanan = $builder->get()->getRowArray();

        if (!$pesanan) {
            return redirect()->to(base_url('pesanan'));
        }

        $data = [
            'pesanan' => $pesanan
        ];

        return view('pesanan/cetak', $data);
    }
}
