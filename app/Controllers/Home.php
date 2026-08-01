<?php

namespace App\Controllers;

use App\Models\WisataModel;

class Home extends BaseController
{
    public function index()
    {
        $wisataModel = new WisataModel();
        
        // Mengambil wisata (join dengan kategori, ambil 6 terbaru)
        $db      = \Config\Database::connect();
        $builder = $db->table('objek_wisata w');
        $builder->select('w.*, k.nama_kategori');
        $builder->select('(SELECT AVG(rating) FROM testimoni WHERE id_wisata = w.id AND status = \'approved\') as avg_rating');
        $builder->select('(SELECT COUNT(id) FROM testimoni WHERE id_wisata = w.id AND status = \'approved\') as review_count');
        $builder->join('kategori_wisata k', 'w.id_kategori = k.id');
        $builder->where('w.status', 'aktif');
        $builder->orderBy('w.created_at', 'DESC');
        $builder->limit(6);
        $wisata_list = $builder->get()->getResultArray();

        // Mengambil testimoni
        $builderTesti = $db->table('testimoni t');
        $builderTesti->select('t.*, u.nama, u.foto');
        $builderTesti->join('users u', 't.id_user = u.id');
        $builderTesti->where('t.status', 'approved');
        $builderTesti->orderBy('t.created_at', 'DESC');
        $builderTesti->limit(5);
        $testimoni_list = $builderTesti->get()->getResultArray();

        // Mengambil kontak pengelola
        $builderKontak = $db->table('kontak_pengelola');
        $kontak = $builderKontak->limit(1)->get()->getRowArray();

        // Fitur Penghitung Kunjungan Website
        $visitorFile = WRITEPATH . 'visitor_count.txt';
        $visitorCount = 1050; // Angka awal agar terlihat realistis
        
        if (file_exists($visitorFile)) {
            $visitorCount = (int)file_get_contents($visitorFile);
        }
        
        // Tambah kunjungan jika bukan dari sesi yang sama
        if (!session()->has('has_visited')) {
            $visitorCount++;
            file_put_contents($visitorFile, $visitorCount);
            session()->set('has_visited', true);
        }

        $data = [
            'title' => 'Sistem Informasi Manajemen Pengelolaan Objek Wisata Alam Desa Tampa',
            'wisata_list' => $wisata_list,
            'testimoni_list' => $testimoni_list,
            'kontak' => $kontak,
            'visitor_count' => $visitorCount
        ];

        return view('home/index', $data);
    }
}
