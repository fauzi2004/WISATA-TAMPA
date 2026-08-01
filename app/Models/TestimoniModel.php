<?php

namespace App\Models;

use CodeIgniter\Model;

class TestimoniModel extends Model
{
    protected $table = 'testimoni';
    protected $primaryKey = 'id';
    protected $allowedFields = ['id_user', 'id_wisata', 'rating', 'komentar', 'status'];
    protected $useTimestamps = false;
}
