<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\WisataModel;
use App\Models\KategoriModel;
use App\Models\UserModel;

class Wisata extends BaseController
{
    public function index()
    {
        $db = \Config\Database::connect();
        $builder = $db->table('objek_wisata w');
        $builder->select('w.*, k.nama_kategori');
        $builder->join('kategori_wisata k', 'w.id_kategori = k.id');
        
        if (session()->get('role') === 'pengelola') {
            $builder->where('w.id', session()->get('id_wisata'));
        }
        
        $builder->orderBy('w.created_at', 'DESC');
        $wisata_list = $builder->get()->getResultArray();

        $data = [
            'title' => 'Manajemen Objek Wisata - Admin Wisata Desa Tampa',
            'wisata_list' => $wisata_list,
            'total_wisata_utama' => count($wisata_list)
        ];

        return view('admin/wisata/index', $data);
    }

    public function tambah()
    {
        if (session()->get('role') !== 'admin') {
            return redirect()->to(base_url('admin/wisata'));
        }

        $kategoriModel = new KategoriModel();
        $userModel = new UserModel();

        $data = [
            'title' => 'Tambah Objek Wisata - Admin Wisata Desa Tampa',
            'kategori' => $kategoriModel->findAll()
        ];

        return view('admin/wisata/tambah', $data);
    }

    public function simpan()
    {
        if (session()->get('role') !== 'admin') {
            return redirect()->to(base_url('admin/wisata'));
        }

        // Strict Validation Rules
        $rules = [
            'nama_wisata' => [
                'rules' => 'required|min_length[3]|max_length[255]',
                'errors' => [
                    'required' => 'Nama wisata harus diisi.',
                    'min_length' => 'Nama wisata minimal 3 karakter.',
                    'max_length' => 'Nama wisata maksimal 255 karakter.'
                ]
            ],
            'id_kategori' => [
                'rules' => 'required|numeric',
                'errors' => [
                    'required' => 'Kategori harus dipilih.',
                    'numeric' => 'Kategori tidak valid.'
                ]
            ],
            'nama_admin' => [
                'rules' => 'required|min_length[3]',
                'errors' => [
                    'required' => 'Nama Admin harus diisi.',
                    'min_length' => 'Nama Admin minimal 3 karakter.'
                ]
            ],
            'email_admin' => [
                'rules' => 'required|valid_email|is_unique[users.email]',
                'errors' => [
                    'required' => 'Email Admin harus diisi.',
                    'valid_email' => 'Format email tidak valid.',
                    'is_unique' => 'Email ini sudah terdaftar di sistem.'
                ]
            ],
            'password_admin' => [
                'rules' => 'required|min_length[6]',
                'errors' => [
                    'required' => 'Password Admin harus diisi.',
                    'min_length' => 'Password Admin minimal 6 karakter.'
                ]
            ],
            'lokasi' => [
                'rules' => 'required|min_length[5]',
                'errors' => [
                    'required' => 'Lokasi harus diisi.',
                    'min_length' => 'Lokasi minimal 5 karakter.'
                ]
            ],
            'kontak_wa' => [
                'rules' => 'permit_empty|numeric|min_length[10]|max_length[15]',
                'errors' => [
                    'numeric' => 'Nomor WhatsApp harus berupa angka.',
                    'min_length' => 'Nomor WhatsApp minimal 10 digit.',
                    'max_length' => 'Nomor WhatsApp maksimal 15 digit.'
                ]
            ],
            'kontak_email' => [
                'rules' => 'permit_empty|valid_email',
                'errors' => [
                    'valid_email' => 'Format email tidak valid.'
                ]
            ],
            'harga_tiket' => [
                'rules' => 'required|numeric|greater_than_equal_to[0]',
                'errors' => [
                    'required' => 'Harga tiket harus diisi.',
                    'numeric' => 'Harga tiket harus berupa angka.',
                    'greater_than_equal_to' => 'Harga tiket tidak boleh kurang dari 0.'
                ]
            ],
            'deskripsi' => [
                'rules' => 'required|min_length[10]',
                'errors' => [
                    'required' => 'Deskripsi harus diisi.',
                    'min_length' => 'Deskripsi minimal 10 karakter.'
                ]
            ],
            'bank_nama' => [
                'rules' => 'permit_empty|required_with[bank_rekening,bank_atas_nama]|in_list[BCA,BNI,BRI,Mandiri,BSI,BJB,BTN,CIMB,Permata,Danamon,Mega,BPD]',
                'errors' => [
                    'required_with' => 'Nama Bank wajib diisi jika Nomor Rekening atau Atas Nama diisi.',
                    'in_list' => 'Nama Bank tidak terdaftar. Gunakan singkatan resmi (misal: BCA, BNI, dll).'
                ]
            ],
            'bank_rekening' => [
                'rules' => 'permit_empty|required_with[bank_nama,bank_atas_nama]|numeric|min_length[5]',
                'errors' => [
                    'required_with' => 'Nomor Rekening wajib diisi jika Nama Bank atau Atas Nama diisi.',
                    'numeric' => 'Nomor rekening bank harus berupa angka.',
                    'min_length' => 'Nomor rekening minimal 5 digit.'
                ]
            ],
            'bank_atas_nama' => [
                'rules' => 'permit_empty|required_with[bank_nama,bank_rekening]|alpha_space|min_length[3]',
                'errors' => [
                    'required_with' => 'Atas Nama wajib diisi jika Nama Bank atau Nomor Rekening diisi.',
                    'alpha_space' => 'Atas Nama hanya boleh berisi huruf dan spasi.',
                    'min_length' => 'Atas Nama minimal 3 karakter.'
                ]
            ],
            'ewallet_nama' => [
                'rules' => 'permit_empty|required_with[ewallet_nomor]|in_list[Gopay,OVO,DANA,ShopeePay,LinkAja]',
                'errors' => [
                    'required_with' => 'Jenis E-Wallet wajib diisi jika Nomor E-Wallet diisi.',
                    'in_list' => 'Jenis E-Wallet tidak valid. Pilih: Gopay, OVO, DANA, ShopeePay, atau LinkAja.'
                ]
            ],
            'ewallet_nomor' => [
                'rules' => 'permit_empty|required_with[ewallet_nama]|numeric|min_length[9]',
                'errors' => [
                    'required_with' => 'Nomor E-Wallet wajib diisi jika Jenis E-Wallet diisi.',
                    'numeric' => 'Nomor E-Wallet harus berupa angka.',
                    'min_length' => 'Nomor E-Wallet minimal 9 digit.'
                ]
            ],
            'gambar' => [
                'rules' => 'is_image[gambar]|mime_in[gambar,image/jpg,image/jpeg,image/png]|max_size[gambar,2048]',
                'errors' => [
                    'is_image' => 'File yang dipilih bukan gambar.',
                    'mime_in' => 'Format gambar harus JPG, JPEG, atau PNG.',
                    'max_size' => 'Ukuran gambar tidak boleh melebihi 2MB.'
                ]
            ]
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $userModel = new UserModel();
        $wisataModel = new WisataModel();

        // 1. Buat Akun Pengelola (User) Terlebih Dahulu
        $userData = [
            'nama' => $this->request->getPost('nama_admin'),
            'email' => $this->request->getPost('email_admin'),
            'password' => password_hash((string)$this->request->getPost('password_admin'), PASSWORD_DEFAULT),
            'role' => 'pengelola',
            'id_wisata' => null // Akan di-update nanti setelah wisata terbuat
        ];
        $userModel->insert($userData);
        $idPengelola = $userModel->getInsertID();

        // 2. Buat Data Objek Wisata
        $gambar = $this->request->getFile('gambar');
        $namaGambar = 'default.png';

        if ($gambar && $gambar->isValid() && !$gambar->hasMoved()) {
            $namaGambar = $gambar->getRandomName();
            $gambar->move('uploads/wisata', $namaGambar);
        }

        $wisataModel->insert([
            'nama_wisata' => $this->request->getPost('nama_wisata'),
            'id_kategori' => $this->request->getPost('id_kategori'),
            'id_pengelola' => $idPengelola,
            'deskripsi' => $this->request->getPost('deskripsi'),
            'lokasi' => $this->request->getPost('lokasi'),
            'kontak_wa' => $this->request->getPost('kontak_wa'),
            'kontak_email' => $this->request->getPost('kontak_email'),
            'harga_tiket' => $this->request->getPost('harga_tiket'),
            'jam_buka' => $this->request->getPost('jam_buka'),
            'jam_tutup' => $this->request->getPost('jam_tutup'),
            'status' => $this->request->getPost('status'),
            'bank_nama' => $this->request->getPost('bank_nama'),
            'bank_rekening' => $this->request->getPost('bank_rekening'),
            'bank_atas_nama' => $this->request->getPost('bank_atas_nama'),
            'ewallet_nama' => $this->request->getPost('ewallet_nama'),
            'ewallet_nomor' => $this->request->getPost('ewallet_nomor'),
            'gambar' => $namaGambar
        ]);
        $idWisata = $wisataModel->getInsertID();

        // 3. Update User id_wisata agar saling terhubung
        $userModel->update($idPengelola, ['id_wisata' => $idWisata]);

        session()->setFlashdata('success', 'Data wisata & akun admin berhasil ditambahkan!');
        return redirect()->to(base_url('admin/wisata'));
    }

    public function edit($id)
    {
        $wisataModel = new WisataModel();
        $wisata = $wisataModel->find($id);

        if (!$wisata) {
            return redirect()->to(base_url('admin/wisata'));
        }

        if (session()->get('role') === 'pengelola' && $wisata['id'] != session()->get('id_wisata')) {
            return redirect()->to(base_url('admin/wisata'));
        }

        $kategoriModel = new KategoriModel();
        $userModel = new UserModel();

        $data = [
            'title' => 'Edit Objek Wisata - Admin Wisata Desa Tampa',
            'wisata' => $wisata,
            'kategori' => $kategoriModel->findAll(),
            'pengelola' => $userModel->where('role', 'pengelola')->findAll()
        ];

        return view('admin/wisata/edit', $data);
    }

    public function update($id)
    {
        $wisataModel = new WisataModel();
        $wisata = $wisataModel->find($id);

        if (!$wisata || (session()->get('role') === 'pengelola' && $wisata['id'] != session()->get('id_wisata'))) {
            return redirect()->to(base_url('admin/wisata'));
        }

        // Strict Validation Rules
        $rules = [
            'nama_wisata' => [
                'rules' => 'required|min_length[3]|max_length[255]',
                'errors' => [
                    'required' => 'Nama wisata harus diisi.',
                    'min_length' => 'Nama wisata minimal 3 karakter.',
                    'max_length' => 'Nama wisata maksimal 255 karakter.'
                ]
            ],
            'lokasi' => [
                'rules' => 'required|min_length[5]',
                'errors' => [
                    'required' => 'Lokasi harus diisi.',
                    'min_length' => 'Lokasi minimal 5 karakter.'
                ]
            ],
            'kontak_wa' => [
                'rules' => 'permit_empty|numeric|min_length[10]|max_length[15]',
                'errors' => [
                    'numeric' => 'Nomor WhatsApp harus berupa angka.',
                    'min_length' => 'Nomor WhatsApp minimal 10 digit.',
                    'max_length' => 'Nomor WhatsApp maksimal 15 digit.'
                ]
            ],
            'kontak_email' => [
                'rules' => 'permit_empty|valid_email',
                'errors' => [
                    'valid_email' => 'Format email tidak valid.'
                ]
            ],
            'harga_tiket' => [
                'rules' => 'required|numeric|greater_than_equal_to[0]',
                'errors' => [
                    'required' => 'Harga tiket harus diisi.',
                    'numeric' => 'Harga tiket harus berupa angka.',
                    'greater_than_equal_to' => 'Harga tiket tidak boleh kurang dari 0.'
                ]
            ],
            'deskripsi' => [
                'rules' => 'required|min_length[10]',
                'errors' => [
                    'required' => 'Deskripsi harus diisi.',
                    'min_length' => 'Deskripsi minimal 10 karakter.'
                ]
            ],
            'bank_nama' => [
                'rules' => 'permit_empty|required_with[bank_rekening,bank_atas_nama]|in_list[BCA,BNI,BRI,Mandiri,BSI,BJB,BTN,CIMB,Permata,Danamon,Mega,BPD]',
                'errors' => [
                    'required_with' => 'Nama Bank wajib diisi jika Nomor Rekening atau Atas Nama diisi.',
                    'in_list' => 'Nama Bank tidak terdaftar. Gunakan singkatan resmi (misal: BCA, BNI, dll).'
                ]
            ],
            'bank_rekening' => [
                'rules' => 'permit_empty|required_with[bank_nama,bank_atas_nama]|numeric|min_length[5]',
                'errors' => [
                    'required_with' => 'Nomor Rekening wajib diisi jika Nama Bank atau Atas Nama diisi.',
                    'numeric' => 'Nomor rekening bank harus berupa angka.',
                    'min_length' => 'Nomor rekening minimal 5 digit.'
                ]
            ],
            'bank_atas_nama' => [
                'rules' => 'permit_empty|required_with[bank_nama,bank_rekening]|alpha_space|min_length[3]',
                'errors' => [
                    'required_with' => 'Atas Nama wajib diisi jika Nama Bank atau Nomor Rekening diisi.',
                    'alpha_space' => 'Atas Nama hanya boleh berisi huruf dan spasi.',
                    'min_length' => 'Atas Nama minimal 3 karakter.'
                ]
            ],
            'ewallet_nama' => [
                'rules' => 'permit_empty|required_with[ewallet_nomor]|in_list[Gopay,OVO,DANA,ShopeePay,LinkAja]',
                'errors' => [
                    'required_with' => 'Jenis E-Wallet wajib diisi jika Nomor E-Wallet diisi.',
                    'in_list' => 'Jenis E-Wallet tidak valid. Pilih: Gopay, OVO, DANA, ShopeePay, atau LinkAja.'
                ]
            ],
            'ewallet_nomor' => [
                'rules' => 'permit_empty|required_with[ewallet_nama]|numeric|min_length[9]',
                'errors' => [
                    'required_with' => 'Nomor E-Wallet wajib diisi jika Jenis E-Wallet diisi.',
                    'numeric' => 'Nomor E-Wallet harus berupa angka.',
                    'min_length' => 'Nomor E-Wallet minimal 9 digit.'
                ]
            ]
        ];

        if (session()->get('role') === 'admin') {
            $rules['id_kategori'] = [
                'rules' => 'required|numeric',
                'errors' => [
                    'required' => 'Kategori harus dipilih.',
                    'numeric' => 'Kategori tidak valid.'
                ]
            ];
            $rules['id_pengelola'] = [
                'rules' => 'required|numeric',
                'errors' => [
                    'required' => 'Admin pengelola harus dipilih.',
                    'numeric' => 'Admin pengelola tidak valid.'
                ]
            ];
        }

        $gambar = $this->request->getFile('gambar');
        if ($gambar && $gambar->isValid()) {
            $rules['gambar'] = [
                'rules' => 'is_image[gambar]|mime_in[gambar,image/jpg,image/jpeg,image/png]|max_size[gambar,2048]',
                'errors' => [
                    'is_image' => 'File yang dipilih bukan gambar.',
                    'mime_in' => 'Format gambar harus JPG, JPEG, atau PNG.',
                    'max_size' => 'Ukuran gambar tidak boleh melebihi 2MB.'
                ]
            ];
        }

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $updateData = [
            'nama_wisata' => $this->request->getPost('nama_wisata'),
            'deskripsi' => $this->request->getPost('deskripsi'),
            'lokasi' => $this->request->getPost('lokasi'),
            'kontak_wa' => $this->request->getPost('kontak_wa'),
            'kontak_email' => $this->request->getPost('kontak_email'),
            'harga_tiket' => $this->request->getPost('harga_tiket'),
            'jam_buka' => $this->request->getPost('jam_buka'),
            'jam_tutup' => $this->request->getPost('jam_tutup'),
            'status' => $this->request->getPost('status'),
            'bank_nama' => $this->request->getPost('bank_nama'),
            'bank_rekening' => $this->request->getPost('bank_rekening'),
            'bank_atas_nama' => $this->request->getPost('bank_atas_nama'),
            'ewallet_nama' => $this->request->getPost('ewallet_nama'),
            'ewallet_nomor' => $this->request->getPost('ewallet_nomor')
        ];

        if (session()->get('role') === 'admin') {
            $updateData['id_kategori'] = $this->request->getPost('id_kategori');
            $updateData['id_pengelola'] = $this->request->getPost('id_pengelola');
        }

        $gambar = $this->request->getFile('gambar');
        if ($gambar && $gambar->isValid() && !$gambar->hasMoved()) {
            $namaGambar = $gambar->getRandomName();
            $gambar->move('uploads/wisata', $namaGambar);
            
            if ($wisata['gambar'] != 'default.png' && !empty($wisata['gambar'])) {
                if (file_exists('uploads/wisata/' . $wisata['gambar'])) {
                    unlink('uploads/wisata/' . $wisata['gambar']);
                }
            }
            $updateData['gambar'] = $namaGambar;
        }

        $wisataModel->update($id, $updateData);

        session()->setFlashdata('success', 'Data wisata berhasil diupdate!');
        return redirect()->to(base_url('admin/wisata/edit/' . $id));
    }

    public function hapus($id)
    {
        if (session()->get('role') !== 'admin') {
            return redirect()->to(base_url('admin/wisata'));
        }

        $wisataModel = new WisataModel();
        $wisata = $wisataModel->find($id);

        if ($wisata) {
            if ($wisata['gambar'] != 'default.png' && !empty($wisata['gambar'])) {
                if (file_exists('uploads/wisata/' . $wisata['gambar'])) {
                    unlink('uploads/wisata/' . $wisata['gambar']);
                }
            }
            $wisataModel->delete($id);
            session()->setFlashdata('success', 'Data wisata berhasil dihapus!');
        }

        return redirect()->to(base_url('admin/wisata'));
    }
}
