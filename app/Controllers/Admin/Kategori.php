<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\KategoriModel;

class Kategori extends BaseController
{
    public function index()
    {
        if (session()->get('role') !== 'admin') {
            return redirect()->to(base_url('admin'));
        }

        $kategoriModel = new KategoriModel();
        
        $data = [
            'title' => 'Manajemen Kategori - Admin Wisata Desa Tampa',
            'kategori_list' => $kategoriModel->orderBy('nama_kategori', 'ASC')->findAll()
        ];

        return view('admin/kategori/index', $data);
    }

    public function tambah()
    {
        if (session()->get('role') !== 'admin') {
            return redirect()->to(base_url('admin'));
        }

        $kategoriModel = new KategoriModel();

        $rules = [
            'nama_kategori' => 'required|alpha_numeric_space|min_length[3]|max_length[50]',
            'deskripsi' => 'required|min_length[5]',
            'ikon' => 'required|max_length[50]'
        ];

        if (!$this->validate($rules)) {
            session()->setFlashdata('error', implode('<br>', $this->validator->getErrors()));
            return redirect()->to(base_url('admin/kategori'));
        }

        $kategoriModel->insert([
            'nama_kategori' => $this->request->getPost('nama_kategori'),
            'deskripsi' => $this->request->getPost('deskripsi'),
            'ikon' => $this->request->getPost('ikon')
        ]);

        session()->setFlashdata('success', 'Kategori berhasil ditambahkan!');
        return redirect()->to(base_url('admin/kategori'));
    }

    public function update()
    {
        if (session()->get('role') !== 'admin') {
            return redirect()->to(base_url('admin'));
        }

        $kategoriModel = new KategoriModel();
        $id = $this->request->getPost('id');

        $rules = [
            'id' => 'required|numeric',
            'nama_kategori' => 'required|alpha_numeric_space|min_length[3]|max_length[50]',
            'deskripsi' => 'required|min_length[5]',
            'ikon' => 'required|max_length[50]'
        ];

        if (!$this->validate($rules)) {
            session()->setFlashdata('error', implode('<br>', $this->validator->getErrors()));
            return redirect()->to(base_url('admin/kategori'));
        }

        $kategoriModel->update($id, [
            'nama_kategori' => $this->request->getPost('nama_kategori'),
            'deskripsi' => $this->request->getPost('deskripsi'),
            'ikon' => $this->request->getPost('ikon')
        ]);

        session()->setFlashdata('success', 'Kategori berhasil diupdate!');
        return redirect()->to(base_url('admin/kategori'));
    }

    public function hapus($id)
    {
        if (session()->get('role') !== 'admin') {
            return redirect()->to(base_url('admin'));
        }

        $kategoriModel = new KategoriModel();
        $kategoriModel->delete($id);
        
        session()->setFlashdata('success', 'Kategori berhasil dihapus!');
        return redirect()->to(base_url('admin/kategori'));
    }
}
