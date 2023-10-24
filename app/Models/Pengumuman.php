<?php

namespace App\Models;

use CodeIgniter\Model;

class Pengumuman extends Model
{
    protected $table            = 'pengumuman';
    protected $primaryKey       = 'id';
    protected $allowedFields    = [
        'foto',
        'judul',
        'isi',
        'created_at',
    ];
}
