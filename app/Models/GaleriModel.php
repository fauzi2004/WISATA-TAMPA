<?php

namespace App\Models;

use CodeIgniter\Model;

class GaleriModel extends Model
{
    protected $table = 'galeri_wisata';
    protected $primaryKey = 'id';
    protected $allowedFields = ['id_wisata', 'foto', 'keterangan'];
}
