<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\TestimoniModel;

class Testimoni extends BaseController
{
    protected $testimoniModel;

    public function __construct()
    {
        $this->testimoniModel = new TestimoniModel();
    }

    public function simpan()
    {
        if (!session()->get('isLoggedIn')) {
            return redirect()->to(base_url('login'))->with('error', 'Silakan login terlebih dahulu untuk memberikan testimoni.');
        }

        $id_wisata = $this->request->getPost('id_wisata');
        $rating = $this->request->getPost('rating');
        $komentar = $this->request->getPost('komentar');
        $id_user = session()->get('user_id');

        $rules = [
            'id_wisata' => 'required|numeric',
            'rating'    => 'required|numeric|greater_than_equal_to[1]|less_than_equal_to[5]',
            'komentar'  => 'required|min_length[5]|max_length[1000]'
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->with('error', 'Validasi gagal! Pastikan rating 1-5 dan komentar minimal 5 karakter.');
        }

        $this->testimoniModel->save([
            'id_user'   => $id_user,
            'id_wisata' => $id_wisata,
            'rating'    => $rating,
            'komentar'  => $komentar,
            'status'    => 'pending'
        ]);

        return redirect()->back()->with('success', 'Testimoni Anda berhasil dikirim dan saat ini menunggu persetujuan admin.');
    }
}
