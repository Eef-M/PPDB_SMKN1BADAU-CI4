<?php

namespace App\Models;

use CodeIgniter\Model;

class Nilai_mapel extends Model
{
    protected $table = 'nilai_mapel';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'id_siswa',
        'nisn',
        'bindo_1',
        'bindo_2',
        'bindo_3',
        'bindo_4',
        'bindo_5',
        'bing_1',
        'bing_2',
        'bing_3',
        'bing_4',
        'bing_5',
        'mtk_1',
        'mtk_2',
        'mtk_3',
        'mtk_4',
        'mtk_5',
        'ipa_1',
        'ipa_2',
        'ipa_3',
        'ipa_4',
        'ipa_5',
        'ips_1',
        'ips_2',
        'ips_3',
        'ips_4',
        'ips_5',
        'bobot_bindo',
        'bobot_bing',
        'bobot_mtk',
        'bobot_ipa',
        'bobot_ips',
        'bobot_hasil',
    ];

    public function insertNilaiMapel($data)
    {
        return $this->insert($data);
    }

    public function getNilaiBySiswaId($siswaId)
    {
        return $this->where('id_siswa', $siswaId)->findAll();
    }
}
