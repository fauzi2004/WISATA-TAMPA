<?php

namespace App\Controllers;

use App\Models\UserModel;

class Auth extends BaseController
{
    public function login()
    {
        if (session()->get('isLoggedIn')) {
            return redirect()->to(base_url());
        }

        $data = [
            'title' => 'Login - Wisata Desa Tampa',
            'errors' => session()->getFlashdata('errors'),
            'success' => session()->getFlashdata('success')
        ];

        return view('auth/login', $data);
    }

    public function processLogin()
    {
        $rules = [
            'email' => [
                'rules' => 'required|valid_email',
                'errors' => [
                    'required' => 'Email harus diisi.',
                    'valid_email' => 'Format email tidak valid.'
                ]
            ],
            'password' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Password harus diisi.'
                ]
            ]
        ];

        if (!$this->validate($rules)) {
            session()->setFlashdata('errors', $this->validator->getErrors());
            return redirect()->to(base_url('login'))->withInput();
        }

        $userModel = new UserModel();
        $email = $this->request->getPost('email');
        $password = (string)$this->request->getPost('password');

        $user = $userModel->where('email', $email)->first();

        if ($user && password_verify($password, $user['password'])) {
            $sessionData = [
                'user_id' => $user['id'],
                'nama' => $user['nama'],
                'email' => $user['email'],
                'role' => $user['role'],
                'foto' => $user['foto'],
                'id_wisata' => $user['id_wisata'],
                'isLoggedIn' => true
            ];
            session()->set($sessionData);

            $redirect_url = $this->request->getGet('redirect');
            if (!empty($redirect_url)) {
                return redirect()->to(base_url($redirect_url));
            } elseif ($user['role'] == 'admin' || $user['role'] == 'pengelola') {
                return redirect()->to(base_url('admin'));
            } else {
                return redirect()->to(base_url());
            }
        } else {
            session()->setFlashdata('errors', ['Email atau password salah!']);
            return redirect()->to(base_url('login'))->withInput();
        }
    }

    public function register()
    {
        if (session()->get('isLoggedIn')) {
            return redirect()->to(base_url());
        }

        $data = [
            'title' => 'Register - Wisata Desa Tampa',
            'errors' => session()->getFlashdata('errors')
        ];

        return view('auth/register', $data);
    }

    public function processRegister()
    {
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
            'email' => [
                'rules' => 'required|valid_email|is_unique[users.email]',
                'errors' => [
                    'required' => 'Email harus diisi.',
                    'valid_email' => 'Format email tidak valid.',
                    'is_unique' => 'Email sudah terdaftar, gunakan email lain.'
                ]
            ],
            'password' => [
                'rules' => 'required|min_length[6]',
                'errors' => [
                    'required' => 'Password harus diisi.',
                    'min_length' => 'Password minimal 6 karakter.'
                ]
            ],
            'konfirmasi_password' => [
                'rules' => 'required|matches[password]',
                'errors' => [
                    'required' => 'Konfirmasi password harus diisi.',
                    'matches' => 'Konfirmasi password tidak cocok.'
                ]
            ],
            'no_telp' => [
                'rules' => 'required|numeric|min_length[10]|max_length[15]',
                'errors' => [
                    'required' => 'Nomor WhatsApp/Telepon harus diisi.',
                    'numeric' => 'Nomor Telepon harus berupa angka.',
                    'min_length' => 'Nomor Telepon minimal 10 digit.',
                    'max_length' => 'Nomor Telepon maksimal 15 digit.'
                ]
            ]
        ];

        if (!$this->validate($rules)) {
            session()->setFlashdata('errors', $this->validator->getErrors());
            return redirect()->to(base_url('register'))->withInput();
        }

        $userModel = new UserModel();
        $userModel->insert([
            'nama' => $this->request->getPost('nama'),
            'email' => $this->request->getPost('email'),
            'password' => password_hash((string)$this->request->getPost('password'), PASSWORD_DEFAULT),
            'no_telp' => $this->request->getPost('no_telp'),
            'role' => 'pengunjung',
            'foto' => 'default.png'
        ]);

        session()->setFlashdata('success', 'Registrasi berhasil! Silakan login.');
        return redirect()->to(base_url('login'));
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to(base_url());
    }

    public function forgotPassword()
    {
        if (session()->get('isLoggedIn')) {
            return redirect()->to(base_url());
        }
        $data = [
            'title' => 'Lupa Password - Wisata Desa Tampa',
            'errors' => session()->getFlashdata('errors'),
            'success' => session()->getFlashdata('success'),
            'reset_link' => session()->getFlashdata('reset_link') // For simulation
        ];
        return view('auth/forgot_password', $data);
    }

    public function processForgotPassword()
    {
        $rules = [
            'email' => [
                'rules' => 'required|valid_email',
                'errors' => [
                    'required' => 'Email harus diisi.',
                    'valid_email' => 'Format email tidak valid.'
                ]
            ]
        ];

        if (!$this->validate($rules)) {
            session()->setFlashdata('errors', $this->validator->getErrors());
            return redirect()->to(base_url('lupa-password'))->withInput();
        }

        $userModel = new UserModel();
        $email = $this->request->getPost('email');
        $user = $userModel->where('email', $email)->first();

        if ($user) {
            $token = bin2hex(random_bytes(32));
            $userModel->update($user['id'], [
                'reset_token' => $token,
                'reset_expires_at' => date('Y-m-d H:i:s', strtotime('+1 hour'))
            ]);

            // Simulasi pengiriman email karena localhost
            $resetLink = base_url('reset-password/' . $token);
            session()->setFlashdata('success', 'Link reset password berhasil dibuat. (SIMULASI LOKAL: Klik link di bawah ini)');
            session()->setFlashdata('reset_link', $resetLink);
            
            // TODO: Konfigurasi Email Sebenarnya
            // $emailService = \Config\Services::email();
            // $emailService->setTo($email);
            // $emailService->setSubject('Reset Password - Wisata Desa Tampa');
            // $emailService->setMessage('Klik link berikut untuk mereset password Anda: <a href="'.$resetLink.'">'.$resetLink.'</a>');
            // $emailService->send();
        } else {
            session()->setFlashdata('errors', ['Email tidak ditemukan di sistem kami.']);
            return redirect()->to(base_url('lupa-password'))->withInput();
        }

        return redirect()->to(base_url('lupa-password'));
    }

    public function resetPassword($token = null)
    {
        if (session()->get('isLoggedIn') || !$token) {
            return redirect()->to(base_url());
        }

        $userModel = new UserModel();
        $user = $userModel->where('reset_token', $token)
                          ->where('reset_expires_at >=', date('Y-m-d H:i:s'))
                          ->first();

        if (!$user) {
            session()->setFlashdata('errors', ['Link reset password tidak valid atau sudah kedaluwarsa.']);
            return redirect()->to(base_url('login'));
        }

        $data = [
            'title' => 'Reset Password - Wisata Desa Tampa',
            'token' => $token,
            'errors' => session()->getFlashdata('errors')
        ];

        return view('auth/reset_password', $data);
    }

    public function processResetPassword()
    {
        $token = $this->request->getPost('token');
        
        $rules = [
            'password' => [
                'rules' => 'required|min_length[6]',
                'errors' => [
                    'required' => 'Password baru harus diisi.',
                    'min_length' => 'Password minimal 6 karakter.'
                ]
            ],
            'konfirmasi_password' => [
                'rules' => 'required|matches[password]',
                'errors' => [
                    'required' => 'Konfirmasi password harus diisi.',
                    'matches' => 'Konfirmasi password tidak cocok.'
                ]
            ]
        ];

        if (!$this->validate($rules)) {
            session()->setFlashdata('errors', $this->validator->getErrors());
            return redirect()->to(base_url('reset-password/' . $token));
        }

        $userModel = new UserModel();
        $user = $userModel->where('reset_token', $token)
                          ->where('reset_expires_at >=', date('Y-m-d H:i:s'))
                          ->first();

        if (!$user) {
            session()->setFlashdata('errors', ['Link reset password tidak valid atau sudah kedaluwarsa.']);
            return redirect()->to(base_url('login'));
        }

        $userModel->update($user['id'], [
            'password' => password_hash((string)$this->request->getPost('password'), PASSWORD_DEFAULT),
            'reset_token' => null,
            'reset_expires_at' => null
        ]);

        session()->setFlashdata('success', 'Password berhasil diubah! Silakan login dengan password baru Anda.');
        return redirect()->to(base_url('login'));
    }
}
