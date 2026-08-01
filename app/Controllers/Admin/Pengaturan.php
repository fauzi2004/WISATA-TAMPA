<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\KontakPengelolaModel;
use App\Models\ProfileDesaModel;

class Pengaturan extends BaseController
{
    public function kontak()
    {
        $kontakModel = new KontakPengelolaModel();
        $kontak = $kontakModel->first();

        $data = [
            'title' => 'Edit Kontak Pengelola - Admin Wisata Desa Tampa',
            'kontak' => $kontak
        ];

        return view('admin/pengaturan/kontak', $data);
    }

    public function update_kontak()
    {
        $kontakModel = new KontakPengelolaModel();
        $kontak = $kontakModel->first();

        $kontakModel->update($kontak['id'], [
            'alamat' => $this->request->getPost('alamat'),
            'no_telepon' => $this->request->getPost('no_telepon'),
            'email' => $this->request->getPost('email'),
            'maps_url' => $this->request->getPost('maps_url'),
            'facebook' => $this->request->getPost('facebook'),
            'instagram' => $this->request->getPost('instagram'),
            'youtube' => $this->request->getPost('youtube')
        ]);

        session()->setFlashdata('success', 'Kontak pengelola berhasil diupdate!');
        return redirect()->to(base_url('admin/pengaturan/kontak'));
    }

    public function profile_desa()
    {
        $profileModel = new ProfileDesaModel();
        
        $data = [
            'title' => 'Edit Profile Desa - Admin Wisata Desa Tampa',
            'tentang' => $profileModel->where('tipe', 'tentang')->first(),
            'visi' => $profileModel->where('tipe', 'visi')->first(),
            'misi' => $profileModel->where('tipe', 'misi')->first(),
            'sejarah' => $profileModel->where('tipe', 'sejarah')->first(),
        ];

        return view('admin/pengaturan/profile_desa', $data);
    }

    public function update_profile()
    {
        $profileModel = new ProfileDesaModel();
        
        $tipe = $this->request->getPost('tipe');
        $judul = $this->request->getPost('judul');
        $konten = $this->request->getPost('konten');

        $profile = $profileModel->where('tipe', $tipe)->first();

        if ($profile) {
            $profileModel->update($profile['id'], [
                'judul' => $judul,
                'konten' => $konten
            ]);
        } else {
            $profileModel->insert([
                'tipe' => $tipe,
                'judul' => $judul,
                'konten' => $konten
            ]);
        }
        
        session()->setFlashdata('success', 'Profile desa berhasil disimpan!');

        return redirect()->to(base_url('admin/pengaturan/profile_desa'));
    }
    public function tampilan_web()
    {
        $data = [
            'title' => 'Tampilan Web - Admin Wisata Desa Tampa'
        ];

        return view('admin/pengaturan/tampilan_web', $data);
    }

    public function update_tampilan_web()
    {
        $rules = [
            'hero_image' => [
                'rules' => 'permit_empty|is_image[hero_image]|mime_in[hero_image,image/jpg,image/jpeg,image/png]|max_size[hero_image,5120]',
                'errors' => [
                    'is_image' => 'File yang dipilih untuk Background Utama bukan gambar.',
                    'mime_in' => 'Format Background Utama harus JPG, JPEG, atau PNG.',
                    'max_size' => 'Ukuran Background Utama maksimal 5MB.'
                ]
            ],
            'tentang_image' => [
                'rules' => 'permit_empty|is_image[tentang_image]|mime_in[tentang_image,image/jpg,image/jpeg,image/png]|max_size[tentang_image,5120]',
                'errors' => [
                    'is_image' => 'File yang dipilih untuk Foto Tentang Desa bukan gambar.',
                    'mime_in' => 'Format Foto Tentang Desa harus JPG, JPEG, atau PNG.',
                    'max_size' => 'Ukuran Foto Tentang Desa maksimal 5MB.'
                ]
            ],
            'logo_image' => [
                'rules' => 'permit_empty|is_image[logo_image]|mime_in[logo_image,image/png,image/jpeg,image/jpg]|max_size[logo_image,2048]',
                'errors' => [
                    'is_image' => 'File yang dipilih untuk Logo bukan gambar.',
                    'mime_in' => 'Format Logo harus PNG, JPG, atau JPEG.',
                    'max_size' => 'Ukuran Logo maksimal 2MB.'
                ]
            ]
        ];

        if (!$this->validate($rules)) {
            session()->setFlashdata('error', implode('<br>', $this->validator->getErrors()));
            return redirect()->back();
        }

        $heroImage = $this->request->getFile('hero_image');
        $tentangImage = $this->request->getFile('tentang_image');
        $logoImage = $this->request->getFile('logo_image');
        $hasUpdate = false;

        if ($heroImage && $heroImage->isValid() && !$heroImage->hasMoved()) {
            if (file_exists('assets/images/river_gazebo.png')) {
                unlink('assets/images/river_gazebo.png');
            }
            $heroImage->move('assets/images', 'river_gazebo.png');
            $hasUpdate = true;
        }

        if ($tentangImage && $tentangImage->isValid() && !$tentangImage->hasMoved()) {
            if (file_exists('assets/images/tentang-desa.png')) {
                unlink('assets/images/tentang-desa.png');
            }
            $tentangImage->move('assets/images', 'tentang-desa.png');
            $hasUpdate = true;
        }

        if ($logoImage && $logoImage->isValid() && !$logoImage->hasMoved()) {
            if (file_exists('assets/images/logo.png')) {
                unlink('assets/images/logo.png');
            }
            $logoImage->move('assets/images', 'logo.png');
            $hasUpdate = true;
        }

        if ($hasUpdate) {
            session()->setFlashdata('success', 'Tampilan web berhasil diperbarui! Perubahan mungkin memerlukan waktu beberapa saat atau refresh browser.');
        } else {
            session()->setFlashdata('error', 'Tidak ada gambar baru yang diunggah.');
        }

        return redirect()->to(base_url('admin/pengaturan/tampilan_web'));
    }
}
