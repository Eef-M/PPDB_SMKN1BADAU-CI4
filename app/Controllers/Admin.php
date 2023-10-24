<?php

namespace App\Controllers;

use App\Models\Data_siswa;
use PhpParser\Node\Expr\FuncCall;

class Admin extends BaseController
{
    public function index()
    {
        $dataSiswa = new Data_siswa();
        $data['semua_pendaftar'] = $dataSiswa->countAllResults();
        $data['pendaftar_laki2'] = $dataSiswa->where('jenis_kelamin', 'laki-laki')->countAllResults();
        $data['pendaftar_perempuan'] = $dataSiswa->where('jenis_kelamin', 'perempuan')->countAllResults();
        $data['zonasi'] = $dataSiswa->where('jalur', 'zonasi')->countAllResults();
        $data['afirmasi'] = $dataSiswa->where('jalur', 'afirmasi')->countAllResults();
        $data['mutasi'] = $dataSiswa->where('jalur', 'mutasi')->countAllResults();
        $data['prestasi'] = $dataSiswa->where('jalur', 'prestasi')->countAllResults();
        $data['sidebar_active'] = 'dashboard';
        return view('admin/index', $data);
    }
}