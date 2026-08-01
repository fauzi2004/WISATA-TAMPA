<?php

namespace App\Controllers;

use App\Models\UserModel;

class Profil extends BaseController
{
    public function index()
    {
        if (!session()->get('isLoggedIn')) {
            return redirect()->to(base_url('login'));
        }

        $userModel = new UserModel();
        $user = $userModel->find(session()->get('user_id'));

        $data = [
            'title' => 'Profil Saya - Wisata Desa Tampa',
            'user' => $user
        ];

        return view('profil/index', $data);
    }

    public function update()
    {
        if (!session()->get('isLoggedIn')) {
            return redirect()->to(base_url('login'));
        }

        $userModel = new UserModel();
        $user_id = session()->get('user_id');
        $user = $userModel->find($user_id);

        $rules = [
            'nama' => [
                'rules' => 'required|alpha_space|min_length[3]|max_length[100]',
                'errors' => [
                    'required' => 'Nama lengkap harus diisi.',
                    'alpha_space' => 'Nama hanya boleh berisi huruf dan spasi.',
                    'min_length' => 'Nama minimal 3 karakter.',
                    'max_length' => 'Nama maksimal 100 karakter.'
                ]
            ],
            'no_telp' => [
                'rules' => 'permit_empty|numeric|min_length[10]|max_length[15]',
                'errors' => [
                    'numeric' => 'Nomor Telepon harus berupa angka.',
                    'min_length' => 'Nomor Telepon minimal 10 digit.',
                    'max_length' => 'Nomor Telepon maksimal 15 digit.'
                ]
            ],
            'alamat' => [
                'rules' => 'permit_empty|min_length[5]|max_length[255]',
                'errors' => [
                    'min_length' => 'Alamat minimal 5 karakter.',
                    'max_length' => 'Alamat maksimal 255 karakter.'
                ]
            ]
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
            session()->setFlashdata('errors', $this->validator->getErrors());
            return redirect()->to(base_url('profil'))->withInput();
        }

        $nama = $this->request->getPost('nama');
        $no_telp = $this->request->getPost('no_telp');
        $alamat = $this->request->getPost('alamat');

        $updateData = [
            'nama' => $nama,
            'no_telp' => $no_telp,
            'alamat' => $alamat
        ];

        $foto = $this->request->getFile('foto');
        if ($foto && $foto->isValid() && !$foto->hasMoved()) {
            $newName = $foto->getRandomName();
            $foto->move('uploads/profil', $newName);
            
            if ($user['foto'] != 'default.png' && $user['foto'] != 'default-user.svg' && !empty($user['foto'])) {
                if (file_exists('uploads/profil/' . $user['foto'])) {
                    unlink('uploads/profil/' . $user['foto']);
                }
            }
            
            $updateData['foto'] = $newName;
            session()->set('foto', $newName);
        }

        $userModel->update($user_id, $updateData);
        session()->set('nama', $nama);

        session()->setFlashdata('success', 'Profil berhasil diupdate!');
        return redirect()->to(base_url('profil'));
    }

    public function ubah_password()
    {
        if (!session()->get('isLoggedIn')) {
            return redirect()->to(base_url('login'));
        }

        $data = [
            'title' => 'Ubah Password - Wisata Desa Tampa'
        ];

        return view('profil/ubah_password', $data);
    }

    public function process_ubah_password()
    {
        if (!session()->get('isLoggedIn')) {
            return redirect()->to(base_url('login'));
        }

        $password_lama = (string)$this->request->getPost('password_lama');
        $password_baru = (string)$this->request->getPost('password_baru');
        $password_konfirm = (string)$this->request->getPost('password_konfirm');

        $userModel = new UserModel();
        $user_id = session()->get('user_id');
        $user = $userModel->find($user_id);

        $errors = [];

        if (!password_verify($password_lama, $user['password'])) {
            $errors[] = 'Password lama salah!';
        }
        if (strlen($password_baru) < 6) {
            $errors[] = 'Password baru minimal 6 karakter!';
        }
        if ($password_baru !== $password_konfirm) {
            $errors[] = 'Konfirmasi password baru tidak cocok!';
        }

        if (!empty($errors)) {
            session()->setFlashdata('errors', $errors);
            return redirect()->to(base_url('profil/ubah_password'));
        }

        $userModel->update($user_id, [
            'password' => password_hash($password_baru, PASSWORD_DEFAULT)
        ]);

        session()->setFlashdata('success', 'Password berhasil diubah!');
        return redirect()->to(base_url('profil'));
    }
}
