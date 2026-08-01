<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\TestimoniModel;

class Testimoni extends BaseController
{
    public function index()
    {
        $db = \Config\Database::connect();
        
        $builder = $db->table('testimoni t');
        $builder->select('t.*, u.nama, u.foto, w.nama_wisata');
        $builder->join('users u', 't.id_user = u.id');
        $builder->join('objek_wisata w', 't.id_wisata = w.id');
        
        if (session()->get('role') === 'pengelola') {
            $builder->where('w.id', session()->get('id_wisata'));
        }
        
        $builder->orderBy('t.created_at', 'DESC');
        $testimoni_list = $builder->get()->getResultArray();

        $data = [
            'title' => 'Manajemen Testimoni - Admin Wisata Desa Tampa',
            'testimoni_list' => $testimoni_list,
            'is_specific' => false
        ];

        return view('admin/testimoni/index', $data);
    }

    public function wisata($id_wisata)
    {
        $db = \Config\Database::connect();
        
        $builder = $db->table('testimoni t');
        $builder->select('t.*, u.nama, u.foto, w.nama_wisata');
        $builder->join('users u', 't.id_user = u.id');
        $builder->join('objek_wisata w', 't.id_wisata = w.id');
        $builder->where('w.id', $id_wisata);
        
        if (session()->get('role') === 'pengelola') {
            $builder->where('w.id', session()->get('id_wisata'));
        }
        
        $builder->orderBy('t.created_at', 'DESC');
        $testimoni_list = $builder->get()->getResultArray();
        
        $nama_w = '';
        if (count($testimoni_list) > 0) {
            $nama_w = $testimoni_list[0]['nama_wisata'];
        } else {
            $w = $db->table('objek_wisata')->where('id', $id_wisata)->get()->getRowArray();
            if ($w) $nama_w = $w['nama_wisata'];
        }

        $data = [
            'title' => 'Testimoni: ' . $nama_w,
            'testimoni_list' => $testimoni_list,
            'is_specific' => true
        ];

        return view('admin/testimoni/index', $data);
    }

    public function setujui($id)
    {
        $db = \Config\Database::connect();
        
        // Validate access
        $builder = $db->table('testimoni t');
        $builder->join('objek_wisata w', 't.id_wisata = w.id');
        $builder->where('t.id', $id);
        
        if (session()->get('role') === 'pengelola') {
            $builder->where('w.id', session()->get('id_wisata'));
        }
        
        $testimoni = $builder->get()->getRowArray();

        if ($testimoni) {
            $db->table('testimoni')->where('id', $id)->update(['status' => 'approved']);
            session()->setFlashdata('success', 'Testimoni disetujui!');
        }

        return redirect()->back();
    }

    public function tolak($id)
    {
        $db = \Config\Database::connect();
        
        // Validate access
        $builder = $db->table('testimoni t');
        $builder->join('objek_wisata w', 't.id_wisata = w.id');
        $builder->where('t.id', $id);
        
        if (session()->get('role') === 'pengelola') {
            $builder->where('w.id', session()->get('id_wisata'));
        }
        
        $testimoni = $builder->get()->getRowArray();

        if ($testimoni) {
            $db->table('testimoni')->where('id', $id)->update(['status' => 'rejected']);
            session()->setFlashdata('success', 'Testimoni ditolak!');
        }

        return redirect()->back();
    }

    public function hapus($id)
    {
        $db = \Config\Database::connect();
        
        // Validate access
        $builder = $db->table('testimoni t');
        $builder->join('objek_wisata w', 't.id_wisata = w.id');
        $builder->where('t.id', $id);
        
        if (session()->get('role') === 'pengelola') {
            $builder->where('w.id', session()->get('id_wisata'));
        }
        
        $testimoni = $builder->get()->getRowArray();

        if ($testimoni) {
            $db->table('testimoni')->where('id', $id)->delete();
            session()->setFlashdata('success', 'Testimoni dihapus!');
        }

        return redirect()->back();
    }
}
