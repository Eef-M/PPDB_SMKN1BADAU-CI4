<?php

namespace App\Models;

use CodeIgniter\Model;

class Data_siswa extends Model
{
    protected $table = 'data_siswa';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'tanggal_pendaftaran',
        'nisn',
        'nama_siswa',
        'nik',
        'jurusan',
        'jenis_kelamin',
        'tempat_lahir',
        'tanggal_lahir',
        'agama',
        'status_dlm_kel',
        'alamat',
        'rt',
        'rw',
        'kelurahan',
        'kecamatan',
        'kab_kota',
        'provinsi',
        'nohp_siswa',
        'nama_ayah',
        'nik_ayah',
        'nama_ibu',
        'nik_ibu',
        'nohp_ortu',
        'jalur',
        'status',
        'verif',
    ];

    public function insertDataSiswa($data)
    {
        return $this->insert($data);
    }

    public function cariSiswa($keyword)
    {
        $builder = $this->table($this->table);
        $builder->like('nama_siswa', $keyword);
        $builder->orLike('nisn', $keyword);
        $builder->orLike('nik', $keyword);
        return $builder->get()->getResult();
    }

    // public function dataUploadBerkas()
    // {
    //     return $this->hasOne(
    //         Upload_berkas::class,
    //         'id_siswa',
    //         'id'
    //     );
    // }
}
