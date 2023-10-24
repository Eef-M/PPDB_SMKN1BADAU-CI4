<?php

namespace App\Models;

use CodeIgniter\Model;

class NilaiSertif extends Model
{
    protected $table            = 'nilai_sertifikat';
    protected $primaryKey       = 'id';
    protected $allowedFields    = ['id_siswa', 'nilai'];

    public function getNSertifBySiswaId($siswaId)
    {
        return $this->where('id_siswa', $siswaId)->findAll();
    }
}
