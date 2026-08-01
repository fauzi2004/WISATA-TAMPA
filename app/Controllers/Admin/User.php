<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\UserModel;
use App\Models\WisataModel;

class User extends BaseController
{
    public function index()
    {
        if (session()->get('role') !== 'admin') {
            return redirect()->to(base_url('admin'));
        }

        $userModel = new UserModel();
        $wisataModel = new WisataModel();
        
        $db = \Config\Database::connect();
        
        $builder = $db->table('users u');
        $builder->select('u.*, w.nama_wisata');
        $builder->join('objek_wisata w', 'u.id_wisata = w.id', 'left');
        $builder->orderBy('u.created_at', 'DESC');
        
        $user_list = $builder->get()->getResultArray();
        $wisata_list = $wisataModel->orderBy('nama_wisata', 'ASC')->findAll();

        $data = [
            'title' => 'Manajemen User - Admin Wisata Desa Tampa',
            'user_list' => $user_list,
            'wisata_list' => $wisata_list
        ];

        return view('admin/user/index', $data);
    }

    public function tambah()
    {
        if (session()->get('role') !== 'admin') {
            return redirect()->to(base_url('admin'));
        }

        $userModel = new UserModel();

        $rules = [
            'nama' => 'required|alpha_space|min_length[3]',
            'email' => 'required|valid_email|is_unique[users.email]',
            'password' => 'required|min_length[6]',
            'no_telp' => 'required|numeric|min_length[10]',
            'role' => 'required|in_list[admin,pengelola,pengunjung]'
        ];

        if (!$this->validate($rules)) {
            session()->setFlashdata('error', implode('<br>', $this->validator->getErrors()));
            return redirect()->to(base_url('admin/user'));
        }

        $email = $this->request->getPost('email');
        
        // Cek email duplikat
        if ($userModel->where('email', $email)->first()) {
            session()->setFlashdata('error', 'Email sudah terdaftar!');
            return redirect()->to(base_url('admin/user'));
        }

        $role = $this->request->getPost('role');
        $id_wisata = $this->request->getPost('id_wisata');
        
        if (empty($id_wisata) || $role !== 'pengelola') {
            $id_wisata = null;
        }

        $userModel->insert([
            'nama' => $this->request->getPost('nama'),
            'email' => $email,
            'password' => password_hash((string)$this->request->getPost('password'), PASSWORD_DEFAULT),
            'no_telp' => $this->request->getPost('no_telp'),
            'role' => $role,
            'id_wisata' => $id_wisata
        ]);

        session()->setFlashdata('success', 'User berhasil ditambahkan!');
        return redirect()->to(base_url('admin/user'));
    }

    public function update_role()
    {
        if (session()->get('role') !== 'admin') {
            return redirect()->to(base_url('admin'));
        }

        $userModel = new UserModel();
        
        $rules = [
            'user_id' => 'required|numeric',
            'role' => 'required|in_list[admin,pengelola,pengunjung]'
        ];

        if (!$this->validate($rules)) {
            session()->setFlashdata('error', 'Data tidak valid!');
            return redirect()->to(base_url('admin/user'));
        }

        $id = $this->request->getPost('user_id');
        $role = $this->request->getPost('role');
        $id_wisata = $this->request->getPost('id_wisata');
        
        if (empty($id_wisata) || $role !== 'pengelola') {
            $id_wisata = null;
        }

        $userModel->update($id, [
            'role' => $role,
            'id_wisata' => $id_wisata
        ]);

        session()->setFlashdata('success', 'Role user berhasil diupdate!');
        return redirect()->to(base_url('admin/user'));
    }

    public function reset_password()
    {
        if (session()->get('role') !== 'admin') {
            return redirect()->to(base_url('admin'));
        }

        $userModel = new UserModel();
        
        $rules = [
            'user_id' => 'required|numeric',
            'password' => 'required|min_length[6]'
        ];

        if (!$this->validate($rules)) {
            session()->setFlashdata('error', 'Password minimal 6 karakter!');
            return redirect()->to(base_url('admin/user'));
        }

        $id = $this->request->getPost('user_id');
        $password = password_hash((string)$this->request->getPost('password'), PASSWORD_DEFAULT);

        $userModel->update($id, [
            'password' => $password
        ]);

        session()->setFlashdata('success', 'Password berhasil direset!');
        return redirect()->to(base_url('admin/user'));
    }

    public function hapus($id)
    {
        if (session()->get('role') !== 'admin') {
            return redirect()->to(base_url('admin'));
        }

        if ($id == session()->get('user_id')) {
            session()->setFlashdata('error', 'Tidak bisa menghapus akun sendiri!');
            return redirect()->to(base_url('admin/user'));
        }

        $userModel = new UserModel();
        $userModel->delete($id);
        
        session()->setFlashdata('success', 'User berhasil dihapus!');
        return redirect()->to(base_url('admin/user'));
    }
}
