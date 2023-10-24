<?php

namespace App\Models;

use CodeIgniter\Model;

class Slideshow extends Model
{
    protected $table = 'slideshow';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'id_menu',
        'judul',
        'deskripsi',
        'gambar',
    ];

}