<?php

namespace App\Models;

use CodeIgniter\Model;

class Tahun_ajaran extends Model
{
    protected $table = 'tahun_ajaran';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'tahun_ajaran',
        'keterangan',
        'tanggal_mulai',
        'tanggal_selesai',
        'is_active',
    ];

    public function emptyTable()
    {
        $this->db->table($this->table)->emptyTable();
    }
}
