<?php

namespace App\Models;

use CodeIgniter\Model;

class Persyaratan extends Model
{
    protected $table = 'persyaratan';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'deskripsi'
    ];
}
