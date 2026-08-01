<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\FasilitasModel;
use App\Models\WisataModel;

class Fasilitas extends BaseController
{
    public function index()
    {
        $wisataModel = new WisataModel();
        $db = \Config\Database::connect();
        
        $id_wisata = $this->request->getGet('id_wisata') ? (int)$this->request->getGet('id_wisata') : 0;
        
        // Wisata list for dropdown
        if (session()->get('role') === 'pengelola') {
            $wisata_list = $wisataModel->where('id', session()->get('id_wisata'))->orderBy('nama_wisata', 'ASC')->findAll();
        } else {
            $wisata_list = $wisataModel->orderBy('nama_wisata', 'ASC')->findAll();
        }

        // Fasilitas list
        $builder = $db->table('fasilitas f');
        $builder->select('f.*, w.nama_wisata');
        $builder->join('objek_wisata w', 'f.id_wisata = w.id');
        
        if ($id_wisata > 0) {
            $builder->where('f.id_wisata', $id_wisata);
        }
        
        if (session()->get('role') === 'pengelola') {
            $builder->where('w.id', session()->get('id_wisata'));
        }
        
        $builder->orderBy('f.created_at', 'DESC');
        $fasilitas_list = $builder->get()->getResultArray();

        $data = [
            'title' => 'Manajemen Fasilitas - Admin Wisata Desa Tampa',
            'wisata_list' => $wisata_list,
            'fasilitas_list' => $fasilitas_list,
            'id_wisata' => $id_wisata
        ];

        return view('admin/fasilitas/index', $data);
    }

    public function tambah()
    {
        $fasilitasModel = new FasilitasModel();

        $rules = [
            'id_wisata' => 'required|numeric',
            'nama_fasilitas' => 'required|min_length[3]|max_length[100]',
            'deskripsi' => 'required|min_length[5]',
            'ikon' => 'required|max_length[50]'
        ];

        $foto = $this->request->getFile('foto');
        if ($foto && $foto->isValid()) {
            $rules['foto'] = [
                'rules' => 'is_image[foto]|mime_in[foto,image/jpg,image/jpeg,image/png]|max_size[foto,2048]',
                'errors' => [
                    'is_image' => 'File yang dipilih bukan gambar.',
                    'mime_in' => 'Format gambar harus JPG, JPEG, atau PNG.',
                    'max_size' => 'Ukuran gambar tidak boleh melebihi 2MB.'
                ]
            ];
        }

        if (!$this->validate($rules)) {
            session()->setFlashdata('error', implode('<br>', $this->validator->getErrors()));
            return redirect()->back();
        }

        $id_wisata = $this->request->getPost('id_wisata');
        
        $nama_foto = null;

        if ($foto && $foto->isValid() && !$foto->hasMoved()) {
            // Buat direktori jika belum ada
            if (!is_dir('uploads/fasilitas')) {
                mkdir('uploads/fasilitas', 0777, true);
            }
            $nama_foto = $foto->getRandomName();
            $foto->move('uploads/fasilitas', $nama_foto);
        }
        
        $fasilitasModel->insert([
            'id_wisata' => $id_wisata,
            'nama_fasilitas' => $this->request->getPost('nama_fasilitas'),
            'deskripsi' => $this->request->getPost('deskripsi'),
            'ikon' => $this->request->getPost('ikon'),
            'foto' => $nama_foto
        ]);

        session()->setFlashdata('success', 'Fasilitas berhasil ditambahkan!');
        return redirect()->to(base_url('admin/fasilitas?id_wisata=' . $id_wisata));
    }

    public function hapus($id)
    {
        $fasilitasModel = new FasilitasModel();
        $fasilitas = $fasilitasModel->find($id);

        if ($fasilitas) {
            if (!empty($fasilitas['foto']) && file_exists('uploads/fasilitas/' . $fasilitas['foto'])) {
                unlink('uploads/fasilitas/' . $fasilitas['foto']);
            }
            
            $fasilitasModel->delete($id);
            session()->setFlashdata('success', 'Fasilitas berhasil dihapus!');
            return redirect()->to(base_url('admin/fasilitas?id_wisata=' . $fasilitas['id_wisata']));
        }

        return redirect()->to(base_url('admin/fasilitas'));
    }
}
