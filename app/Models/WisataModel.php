<?php

namespace App\Models;

use CodeIgniter\Model;

class WisataModel extends Model
{
    protected $table            = 'objek_wisata';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['id_kategori', 'id_pengelola', 'nama_wisata', 'deskripsi', 'kontak_wa', 'kontak_email', 'lokasi', 'harga_tiket', 'jam_buka', 'jam_tutup', 'gambar', 'status', 'bank_nama', 'bank_rekening', 'bank_atas_nama', 'ewallet_nama', 'ewallet_nomor'];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
}
