<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\UserModel;

class Profil extends BaseController
{
    public function index()
    {
        $userModel = new UserModel();
        $user = $userModel->find(session()->get('user_id'));

        $data = [
            'title' => 'Profil Saya - Admin Wisata Desa Tampa',
            'user' => $user
        ];

        return view('admin/profil/index', $data);
    }

    public function update()
    {
        $userModel = new UserModel();
        $userId = session()->get('user_id');
        $user = $userModel->find($userId);

        $rules = [
            'nama' => 'required|min_length[3]',
            'email' => "required|valid_email|is_unique[users.email,id,{$userId}]"
        ];

        // Check if user wants to update password
        $password = $this->request->getPost('password');
        if (!empty($password)) {
            $rules['password'] = 'min_length[6]';
        }

        // Check if user uploaded a photo
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

        $updateData = [
            'nama' => $this->request->getPost('nama'),
            'email' => $this->request->getPost('email')
        ];

        if (!empty($password)) {
            $updateData['password'] = password_hash($password, PASSWORD_DEFAULT);
        }

        if ($foto && $foto->isValid() && !$foto->hasMoved()) {
            $namaFoto = $foto->getRandomName();
            $foto->move('uploads/profil', $namaFoto);

            if ($user['foto'] && $user['foto'] != 'default.png' && $user['foto'] != 'default-user.svg') {
                if (file_exists('uploads/profil/' . $user['foto'])) {
                    unlink('uploads/profil/' . $user['foto']);
                }
            }
            $updateData['foto'] = $namaFoto;
            
            // Update session foto
            session()->set('foto', $namaFoto);
        }

        // Update session nama
        session()->set('nama', $updateData['nama']);

        $userModel->update($userId, $updateData);

        session()->setFlashdata('success', 'Profil berhasil diperbarui!');
        return redirect()->to(base_url('admin/profil'));
    }
}
