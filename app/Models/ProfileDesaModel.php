<?php

namespace App\Models;

use CodeIgniter\Model;

class ProfileDesaModel extends Model
{
    protected $table = 'profile_desa';
    protected $primaryKey = 'id';
    protected $allowedFields = ['tipe', 'judul', 'konten'];
}
