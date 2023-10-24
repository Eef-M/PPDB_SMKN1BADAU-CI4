<?php

namespace App\Models;

use CodeIgniter\Model;

class Content extends Model
{
    protected $table = 'content';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'id_menu',
        'gambar',
        'judul',
        'isi',
    ];

    public function getContentByMenuId($menuId)
    {
        return $this->where('id_menu', $menuId)->first();
    }
}