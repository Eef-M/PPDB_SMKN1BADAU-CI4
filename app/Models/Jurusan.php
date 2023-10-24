<?php

namespace App\Models;

use CodeIgniter\Model;

class Jurusan extends Model
{

    protected $table            = 'jurusan';
    protected $primaryKey       = 'id';
    protected $allowedFields    = [
        'gambar',
        'guru',
        'jurusan',
        'siswa',
    ];
}
