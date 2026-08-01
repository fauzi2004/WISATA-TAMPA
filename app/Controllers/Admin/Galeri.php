<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\GaleriModel;
use App\Models\WisataModel;

class Galeri extends BaseController
{
    public function index()
    {
        $wisataModel = new WisataModel();
        $db = \Config\Database::connect();
        
        $id_wisata = $this->request->getGet('id_wisata') ? (int)$this->request->getGet('id_wisata') : 0;
        
        if (session()->get('role') === 'pengelola') {
            $wisata_list = $wisataModel->where('id', session()->get('id_wisata'))->orderBy('nama_wisata', 'ASC')->findAll();
        } else {
            $wisata_list = $wisataModel->orderBy('nama_wisata', 'ASC')->findAll();
        }

        $builder = $db->table('galeri_wisata g');
        $builder->select('g.*, w.nama_wisata');
        $builder->join('objek_wisata w', 'g.id_wisata = w.id');
        
        if ($id_wisata > 0) {
            $builder->where('g.id_wisata', $id_wisata);
        }
        
        if (session()->get('role') === 'pengelola') {
            $builder->where('w.id', session()->get('id_wisata'));
        }
        
        $builder->orderBy('g.created_at', 'DESC');
        $galeri_list = $builder->get()->getResultArray();

        $data = [
            'title' => 'Manajemen Galeri - Admin Wisata Desa Tampa',
            'wisata_list' => $wisata_list,
            'galeri_list' => $galeri_list,
            'id_wisata' => $id_wisata
        ];

        return view('admin/galeri/index', $data);
    }

    public function tambah()
    {
        $galeriModel = new GaleriModel();

        $rules = [
            'id_wisata' => 'required|numeric',
            'keterangan' => 'permit_empty|min_length[3]|max_length[255]',
            'foto' => [
                'rules' => 'uploaded[foto]|is_image[foto]|mime_in[foto,image/jpg,image/jpeg,image/png]|max_size[foto,5120]',
                'errors' => [
                    'uploaded' => 'Foto galeri wajib diupload.',
                    'is_image' => 'File yang dipilih bukan gambar.',
                    'mime_in' => 'Format gambar harus JPG, JPEG, atau PNG.',
                    'max_size' => 'Ukuran gambar maksimal 5MB.'
                ]
            ]
        ];

        if (!$this->validate($rules)) {
            session()->setFlashdata('error', implode('<br>', $this->validator->getErrors()));
            return redirect()->back();
        }

        $id_wisata = $this->request->getPost('id_wisata');
        $keterangan = $this->request->getPost('keterangan');

        $foto = $this->request->getFile('foto');
        $namaFoto = '';

        if ($foto && $foto->isValid() && !$foto->hasMoved()) {
            $namaFoto = $foto->getRandomName();
            $foto->move('uploads/galeri', $namaFoto);
            
            $galeriModel->insert([
                'id_wisata' => $id_wisata,
                'keterangan' => $keterangan,
                'foto' => $namaFoto
            ]);
            
            session()->setFlashdata('success', 'Foto berhasil ditambahkan ke galeri!');
        } else {
            session()->setFlashdata('error', 'Gagal mengupload foto.');
        }

        return redirect()->to(base_url('admin/galeri?id_wisata=' . $id_wisata));
    }

    public function hapus($id)
    {
        $galeriModel = new GaleriModel();
        $galeri = $galeriModel->find($id);

        if ($galeri) {
            if (file_exists('uploads/galeri/' . $galeri['foto'])) {
                unlink('uploads/galeri/' . $galeri['foto']);
            }
            $galeriModel->delete($id);
            session()->setFlashdata('success', 'Foto berhasil dihapus dari galeri!');
            return redirect()->to(base_url('admin/galeri?id_wisata=' . $galeri['id_wisata']));
        }

        return redirect()->to(base_url('admin/galeri'));
    }
}
