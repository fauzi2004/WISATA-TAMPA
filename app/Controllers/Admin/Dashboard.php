<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class Dashboard extends BaseController
{
    public function index()
    {
        $db = \Config\Database::connect();
        $role = session()->get('role');
        $user_id = session()->get('user_id');

        // Statistik Wisata
        $builderWisata = $db->table('objek_wisata')->where('status', 'aktif');
        if ($role === 'pengelola') {
            $builderWisata->where('id', session()->get('id_wisata'));
        }
        $total_wisata = $builderWisata->countAllResults();

        // Statistik Pemesanan
        $builderPemesanan = $db->table('pemesanan p');
        if ($role === 'pengelola') {
            $builderPemesanan->join('objek_wisata w', 'p.id_wisata = w.id')
                             ->where('w.id', session()->get('id_wisata'));
        }
        $total_pemesanan = clone $builderPemesanan;
        $total_pemesanan = $total_pemesanan->countAllResults();

        // Menunggu Konfirmasi
        $menunggu_konfirmasi = clone $builderPemesanan;
        $menunggu_konfirmasi = $menunggu_konfirmasi->where('p.status_pembayaran', 'menunggu_konfirmasi')->countAllResults();

        // Total Pendapatan
        $pendapatan = clone $builderPemesanan;
        $total_pendapatan = $pendapatan->where('p.status_pembayaran', 'lunas')->selectSum('p.total_harga')->get()->getRow()->total_harga ?? 0;

        $title = 'Dashboard Admin - Wisata Desa Tampa';
        if ($role === 'pengelola') {
            $wisata = $db->table('objek_wisata')->where('id', session()->get('id_wisata'))->get()->getRowArray();
        }

        $data = [
            'title' => $title,
            'total_wisata' => $total_wisata,
            'total_pemesanan' => $total_pemesanan,
            'menunggu_konfirmasi' => $menunggu_konfirmasi,
            'total_pendapatan' => $total_pendapatan,
        ];

        return view('admin/dashboard', $data);
    }
}
