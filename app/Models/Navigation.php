<?php

namespace App\Models;

use CodeIgniter\Model;

class Navigation extends Model
{
    protected $table = 'navigation_menu';
    protected $primaryKey = 'id';
    protected $allowedFields = ['nama_menu', 'url'];
}
