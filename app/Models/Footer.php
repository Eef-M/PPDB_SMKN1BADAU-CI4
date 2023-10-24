<?php

namespace App\Models;

use CodeIgniter\Model;

class Footer extends Model
{
    protected $table = 'footer';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'profile',
        'phone',
        'email',
        'alamat',
        'ig',
        'fb',
    ];
}
