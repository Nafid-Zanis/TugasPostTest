<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelMahasantri extends Model
{
    protected $table = "mahasantri";
    protected $primarykey = "id";
    protected $allowedFields = ['nama', 'nim', 'alamat', 'jurusan'];
}
