<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class Laporan extends BaseController
{
    public function pendapatan()
    {
        if (session()->get('role') !== 'pengelola') {
            return redirect()->to(base_url('admin'));
        }

        $db = \Config\Database::connect();
        $mulai = $this->request->getGet('mulai') ?: date('Y-m-01');
        $sampai = $this->request->getGet('sampai') ?: date('Y-m-t');

        $builder = $db->table('pemesanan p');
        $builder->select('p.*, u.nama, u.foto as foto_user, w.nama_wisata');
        $builder->join('users u', 'p.id_user = u.id');
        $builder->join('objek_wisata w', 'p.id_wisata = w.id');
        $builder->where('p.status_pembayaran', 'lunas');
        $builder->where('DATE(p.created_at) >=', $mulai);
        $builder->where('DATE(p.created_at) <=', $sampai);
        
        if (session()->get('role') === 'pengelola') {
            $builder->where('w.id', session()->get('id_wisata'));
        }

        $builder->orderBy('p.created_at', 'DESC');
        $pendapatan = $builder->get()->getResultArray();

        $total_pendapatan = 0;
        foreach ($pendapatan as $p) {
            $total_pendapatan += $p['total_harga'];
        }

        $data = [
            'title' => 'Laporan Pendapatan - Admin Wisata Desa Tampa',
            'mulai' => $mulai,
            'sampai' => $sampai,
            'pendapatan' => $pendapatan,
            'total_pendapatan' => $total_pendapatan
        ];

        return view('admin/laporan/pendapatan', $data);
    }
}
