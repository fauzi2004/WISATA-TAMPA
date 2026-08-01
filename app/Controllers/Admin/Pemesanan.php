<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class Pemesanan extends BaseController
{
    public function index()
    {
        $db = \Config\Database::connect();
        $builder = $db->table('pemesanan p');
        $builder->select('p.*, u.nama as nama_user, u.foto as foto_user, w.nama_wisata');
        $builder->join('users u', 'p.id_user = u.id');
        $builder->join('objek_wisata w', 'p.id_wisata = w.id');
        
        if (session()->get('role') === 'pengelola') {
            $builder->where('w.id', session()->get('id_wisata'));
        }
        
        $status = $this->request->getGet('status');
        if (!empty($status)) {
            if ($status === 'menunggu_pembayaran') {
                $builder->groupStart()
                        ->where('p.status_pembayaran', 'menunggu_pembayaran')
                        ->orWhere('p.status_pembayaran', 'belum_bayar')
                        ->groupEnd();
            } elseif ($status === 'ditolak') {
                $builder->groupStart()
                        ->where('p.status_pembayaran', 'ditolak')
                        ->orWhere('p.status_pembayaran', 'dibatalkan')
                        ->groupEnd();
            } else {
                $builder->where('p.status_pembayaran', $status);
            }
        }
        
        $search = $this->request->getGet('search');
        if (!empty($search)) {
            $builder->groupStart()
                    ->like('p.kode_booking', $search)
                    ->orLike('u.nama', $search)
                    ->orLike('w.nama_wisata', $search)
                    ->groupEnd();
        }
        
        $builder->orderBy('p.id', 'DESC');
        $pemesanan = $builder->get()->getResultArray();

        $data = [
            'title' => 'Manajemen Pemesanan - Admin Wisata Desa Tampa',
            'pemesanan' => $pemesanan
        ];

        return view('admin/pemesanan/index', $data);
    }

    public function detail($id)
    {
        $db = \Config\Database::connect();
        
        // Fetch pesanan
        $builder = $db->table('pemesanan p');
        $builder->select('p.*, u.nama as nama_user, u.email, u.no_telp, u.foto as foto_user, w.nama_wisata, w.lokasi, w.id_pengelola');
        $builder->join('users u', 'p.id_user = u.id');
        $builder->join('objek_wisata w', 'p.id_wisata = w.id');
        $builder->where('p.id', $id);
        
        if (session()->get('role') === 'pengelola') {
            $builder->where('w.id', session()->get('id_wisata'));
        }
        
        $pesanan = $builder->get()->getRowArray();

        if (!$pesanan) {
            return redirect()->to(base_url('admin/pemesanan'));
        }

        // Fetch pembayaran
        $pembayaran = $db->table('pembayaran')->where('id_pemesanan', $id)->get()->getRowArray();

        $data = [
            'title' => 'Detail Pemesanan - Admin Wisata Desa Tampa',
            'pesanan' => $pesanan,
            'pembayaran' => $pembayaran
        ];

        return view('admin/pemesanan/detail', $data);
    }

    public function konfirmasi($id)
    {
        $db = \Config\Database::connect();
        
        // Validate access
        $builder = $db->table('pemesanan p');
        $builder->select('p.*, w.nama_wisata, w.id as wisata_id');
        $builder->join('objek_wisata w', 'p.id_wisata = w.id');
        $builder->where('p.id', $id);
        
        if (session()->get('role') === 'pengelola') {
            $builder->where('w.id', session()->get('id_wisata'));
        }
        
        $pesanan = $builder->get()->getRowArray();

        if (!$pesanan) {
            return redirect()->to(base_url('admin/pemesanan'));
        }

        $db->table('pemesanan')->where('id', $id)->update([
            'status_pembayaran' => 'lunas',
            'status_tiket' => 'dikonfirmasi'
        ]);

        $db->table('pembayaran')->where('id_pemesanan', $id)->update([
            'status' => 'dikonfirmasi'
        ]);

        $notifikasiModel = new \App\Models\NotifikasiModel();
        
        // Notifikasi untuk Pengunjung
        $notifikasiModel->insert([
            'id_user' => $pesanan['id_user'],
            'judul' => 'Pembayaran Dikonfirmasi',
            'pesan' => 'Hore! Pembayaran tiket Anda untuk wisata ' . $pesanan['nama_wisata'] . ' telah dikonfirmasi.',
            'tipe' => 'success',
            'link' => 'pesanan/detail/' . $id
        ]);

        // Notifikasi untuk Pengelola
        $pengelola = $db->table('users')->where('role', 'pengelola')->where('id_wisata', $pesanan['wisata_id'])->get()->getRowArray();
        if ($pengelola) {
            $notifikasiModel->insert([
                'id_user' => $pengelola['id'],
                'judul' => 'Transaksi Selesai',
                'pesan' => 'Transaksi baru! Pembayaran tiket untuk ' . $pesanan['nama_wisata'] . ' telah lunas.',
                'tipe' => 'success',
                'link' => 'admin/pemesanan/detail/' . $id
            ]);
        }

        session()->setFlashdata('success', 'Pembayaran berhasil dikonfirmasi!');
        return redirect()->to(base_url('admin/pemesanan'));
    }

    public function tolak($id)
    {
        $db = \Config\Database::connect();
        
        // Validate access
        $builder = $db->table('pemesanan p');
        $builder->join('objek_wisata w', 'p.id_wisata = w.id');
        $builder->where('p.id', $id);
        
        if (session()->get('role') === 'pengelola') {
            $builder->where('w.id', session()->get('id_wisata'));
        }
        
        $pesanan = $builder->get()->getRowArray();

        if (!$pesanan) {
            return redirect()->to(base_url('admin/pemesanan'));
        }

        $db->table('pemesanan')->where('id', $id)->update([
            'status_pembayaran' => 'ditolak'
        ]);

        $db->table('pembayaran')->where('id_pemesanan', $id)->update([
            'status' => 'ditolak'
        ]);

        $notifikasiModel = new \App\Models\NotifikasiModel();
        
        // Notifikasi untuk Pengunjung
        $notifikasiModel->insert([
            'id_user' => $pesanan['id_user'],
            'judul' => 'Pembayaran Ditolak',
            'pesan' => 'Mohon maaf, bukti pembayaran tiket Anda untuk wisata ' . $pesanan['nama_wisata'] . ' telah ditolak. Silakan upload ulang bukti yang valid.',
            'tipe' => 'danger',
            'link' => 'pesanan/detail/' . $id
        ]);

        // Notifikasi untuk Pengelola
        $pengelola = $db->table('users')->where('role', 'pengelola')->where('id_wisata', $pesanan['id_wisata'])->get()->getRowArray();
        if ($pengelola) {
            $notifikasiModel->insert([
                'id_user' => $pengelola['id'],
                'judul' => 'Pembayaran Ditolak',
                'pesan' => 'Pembayaran tiket untuk ' . $pesanan['nama_wisata'] . ' (' . $pesanan['kode_booking'] . ') telah ditolak.',
                'tipe' => 'danger',
                'link' => 'admin/pemesanan/detail/' . $id
            ]);
        }

        session()->setFlashdata('success', 'Pembayaran ditolak!');
        return redirect()->to(base_url('admin/pemesanan'));
    }
}
