<?php

namespace App\Models;

use CodeIgniter\Model;

class Tata_cara extends Model
{
    protected $table = 'tata_cara';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'deskripsi'
    ];
}
