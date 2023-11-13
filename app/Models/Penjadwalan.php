<?php

namespace App\Models;

use CodeIgniter\Model;

class Penjadwalan extends Model
{
    protected $table = 'penjadwalan';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'kegiatan',
        'lokasi',
        'tanggal_mulai',
        'tanggal_selesai',
    ];
}
