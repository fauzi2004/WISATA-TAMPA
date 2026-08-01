<?php

namespace App\Controllers;

class Tentang extends BaseController
{
    public function index()
    {
        $db = \Config\Database::connect();
        
        $profile = $db->table('profile_desa')->where('tipe', 'tentang')->limit(1)->get()->getRowArray();
        $visi = $db->table('profile_desa')->where('tipe', 'visi')->limit(1)->get()->getRowArray();
        $misi = $db->table('profile_desa')->where('tipe', 'misi')->limit(1)->get()->getRowArray();
        $sejarah = $db->table('profile_desa')->where('tipe', 'sejarah')->limit(1)->get()->getRowArray();

        $data = [
            'title' => 'Tentang Desa - Wisata Desa Tampa',
            'profile' => $profile,
            'visi' => $visi,
            'misi' => $misi,
            'sejarah' => $sejarah
        ];

        return view('tentang/index', $data);
    }
}
