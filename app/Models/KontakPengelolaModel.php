<?php

namespace App\Models;

use CodeIgniter\Model;

class KontakPengelolaModel extends Model
{
    protected $table = 'kontak_pengelola';
    protected $primaryKey = 'id';
    protected $allowedFields = ['alamat', 'no_telepon', 'email', 'maps_url', 'facebook', 'instagram', 'youtube'];
}
