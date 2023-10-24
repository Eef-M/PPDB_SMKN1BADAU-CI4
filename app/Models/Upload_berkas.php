<?php

namespace App\Models;

use CodeIgniter\Model;

class Upload_berkas extends Model
{
    protected $table = 'upload_berkas';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'id_siswa',
        'foto',
        'kartu_keluarga',
        'scan_nisn',
        'rpt_smstr_1',
        'rpt_smstr_2',
        'rpt_smstr_3',
        'rpt_smstr_4',
        'rpt_smstr_5',
        'kel_kur_mampu',
        'st_ortu',
        'sertif_prestasi',
    ];

    public function insertUploadBerkas($data)
    {
        return $this->insert($data);
    }

    public function getBerkasById($berkasId)
    {
        return $this->where('id_siswa', $berkasId)->findAll();
    }

    public function getFotoBerkas($siswaId)
    {
        $berkas = $this->select('foto')->where('id_siswa', $siswaId)->first();

        if ($berkas && is_array($berkas)) {
            return $berkas['foto'];
        }

        return null;
    }
}
