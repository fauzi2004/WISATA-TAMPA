<?php

namespace App\Models;

use CodeIgniter\Model;

class PembayaranModel extends Model
{
    protected $table = 'pembayaran';
    protected $primaryKey = 'id';
    protected $allowedFields = ['id_pemesanan', 'jumlah_bayar', 'metode_bayar', 'bukti_bayar', 'status', 'created_at', 'updated_at'];
    protected $useTimestamps = false;
}
