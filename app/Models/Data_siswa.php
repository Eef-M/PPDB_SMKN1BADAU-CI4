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
        'id_jurusan',
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
        $builder->select('data_siswa.*, jurusan.jurusan');
        $builder->join('jurusan', 'jurusan.id = data_siswa.id_jurusan');
        $builder->like('data_siswa.nama_siswa', $keyword);
        $builder->orLike('data_siswa.nisn', $keyword);
        $builder->orLike('data_siswa.nik', $keyword);
        return $builder->get()->getResult();
    }

    public function getIdByNisn($nisn)
    {
        return $this->select('id')
            ->where('nisn', $nisn)
            ->first();
    }

    public function getNisnById($id)
    {
        return $this->select('nisn')
            ->where('id', $id)
            ->first();
    }

    public function getJalurByNisn($nisn) {
        return $this->select('jalur')
                ->where('nisn', $nisn)
                ->first();
    }

    public function getSiswaWithJurusan()
    {
        $builder = $this->db->table($this->table);
        $builder->select('data_siswa.*, jurusan.jurusan');
        $builder->join('jurusan', 'jurusan.id = data_siswa.id_jurusan');
        return $builder->get()->getResultArray();
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
