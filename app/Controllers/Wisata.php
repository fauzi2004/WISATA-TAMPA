<?php

namespace App\Controllers;

use App\Models\WisataModel;
use App\Models\GaleriModel;
use App\Models\FasilitasModel;

class Wisata extends BaseController
{
    public function index()
    {
        $wisataModel = new WisataModel();
        $search = $this->request->getGet('search');

        $db      = \Config\Database::connect();
        $builder = $db->table('objek_wisata w');
        $builder->select('w.*, k.nama_kategori');
        $builder->select('(SELECT AVG(rating) FROM testimoni WHERE id_wisata = w.id AND status = \'approved\') as avg_rating');
        $builder->select('(SELECT COUNT(id) FROM testimoni WHERE id_wisata = w.id AND status = \'approved\') as review_count');
        $builder->join('kategori_wisata k', 'w.id_kategori = k.id');
        $builder->where('w.status', 'aktif');

        if (!empty($search)) {
            $builder->groupStart();
            $builder->like('w.nama_wisata', $search);
            $builder->orLike('w.lokasi', $search);
            $builder->groupEnd();
        }

        $builder->orderBy('w.created_at', 'DESC');
        $wisata_list = $builder->get()->getResultArray();

        $data = [
            'title' => 'Daftar Wisata - Wisata Desa Tampa',
            'wisata_list' => $wisata_list,
            'search' => $search
        ];

        return view('wisata/index', $data);
    }

    public function detail($id)
    {
        $db = \Config\Database::connect();
        
        $builder = $db->table('objek_wisata w');
        $builder->select('w.*, k.nama_kategori');
        $builder->join('kategori_wisata k', 'w.id_kategori = k.id');
        $builder->where('w.id', $id);
        $builder->where('w.status', 'aktif');
        $wisata = $builder->get()->getRowArray();

        if (!$wisata) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }

        $galeri = $db->table('galeri_wisata')->where('id_wisata', $id)->get()->getResultArray();
        $fasilitas = $db->table('fasilitas')->where('id_wisata', $id)->get()->getResultArray();
        
        $kunjungan_7_hari = $db->table('pemesanan')
            ->selectSum('jumlah_tiket', 'total')
            ->where('id_wisata', $id)
            ->where('status_pembayaran', 'lunas')
            ->where('tanggal_kunjungan >=', date('Y-m-d', strtotime('-7 days')))
            ->get()->getRowArray()['total'] ?? 0;

        $kunjungan_30_hari = $db->table('pemesanan')
            ->selectSum('jumlah_tiket', 'total')
            ->where('id_wisata', $id)
            ->where('status_pembayaran', 'lunas')
            ->where('tanggal_kunjungan >=', date('Y-m-d', strtotime('-30 days')))
            ->get()->getRowArray()['total'] ?? 0;
        
        $builderTesti = $db->table('testimoni t');
        $builderTesti->select('t.*, u.nama, u.foto');
        $builderTesti->join('users u', 't.id_user = u.id');
        $builderTesti->where('t.id_wisata', $id);
        $builderTesti->where('t.status', 'approved');
        $builderTesti->orderBy('t.created_at', 'DESC');
        $testimoni_list = $builderTesti->get()->getResultArray();

        $data = [
            'title' => $wisata['nama_wisata'] . ' - Wisata Desa Tampa',
            'wisata' => $wisata,
            'galeri' => $galeri,
            'fasilitas' => $fasilitas,
            'testimoni_list' => $testimoni_list,
            'kunjungan_7_hari' => $kunjungan_7_hari,
            'kunjungan_30_hari' => $kunjungan_30_hari
        ];

        return view('wisata/detail', $data);
    }
}
