<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\Penjadwalan;

class JadwalController extends BaseController
{
    public function index()
    {
        $data_jadwal = new Penjadwalan();
        $data['jadwal'] = $data_jadwal->findAll();

        $data['sidebar_active'] = 'jadwal';
        return view('admin/jadwal/index', $data);
    }

    public function tambah_form()
    {
        $dataJadwal = new Penjadwalan();
        $jadwal = $dataJadwal->findAll();

        if (!empty($jadwal)) {
            return $this->index();
        }

        $data['sidebar_active'] = 'jadwal';
        return view('admin/jadwal/tambah', $data);
    }

    public function store()
    {
        $penjadwalan = new Penjadwalan();

        $data1 = [
            'kegiatan' => $this->request->getPost('kegiatan_1'),
            'lokasi' => $this->request->getPost('lokasi_1'),
            'tanggal_mulai' => $this->request->getPost('tanggal_mulai_1'),
            'tanggal_selesai' => $this->request->getPost('tanggal_selesai_1'),
        ];

        $data2 = [
            'kegiatan' => $this->request->getPost('kegiatan_2'),
            'lokasi' => $this->request->getPost('lokasi_2'),
            'tanggal_mulai' => $this->request->getPost('tanggal_mulai_2'),
            'tanggal_selesai' => $this->request->getPost('tanggal_selesai_2'),
        ];

        $data3 = [
            'kegiatan' => $this->request->getPost('kegiatan_3'),
            'lokasi' => $this->request->getPost('lokasi_3'),
            'tanggal_mulai' => $this->request->getPost('tanggal_mulai_3'),
            'tanggal_selesai' => $this->request->getPost('tanggal_selesai_3'),
        ];

        $penjadwalan->insert($data1);
        $penjadwalan->insert($data2);
        $penjadwalan->insert($data3);

        return redirect()->to(base_url('penjadwalan'))->with('status', '<div class="alert alert-success alert-dismissible" role="alert"> Penjadwalan berhasil ditambahkan! <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>');
    }

    public function edit($id)
    {
        $penjadwalan = new Penjadwalan();
        $data['jadwal'] = $penjadwalan->find($id);

        $data['sidebar_active'] = 'jadwal';
        return view('admin/jadwal/edit', $data);
    }

    public function update($id)
    {
        $penjadwalan = new Penjadwalan();

        $data = [
            'kegiatan' => $this->request->getPost('kegiatan'),
            'lokasi' => $this->request->getPost('lokasi'),
            'tanggal_mulai' => $this->request->getPost('tanggal_mulai'),
            'tanggal_selesai' => $this->request->getPost('tanggal_selesai'),
        ];

        $penjadwalan->update($id, $data);
        return redirect()->to(base_url('penjadwalan'))->with('status', '<div class="alert alert-primary alert-dismissible" role="alert"> Penjadwalan berhasil diupdate! <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>');
    }

    public function delete()
    {
        $dataJadwal = new Penjadwalan();
        $dataJadwal->truncate();

        return redirect()->to(base_url('penjadwalan'))->with('status', '<div class="alert alert-danger alert-dismissible" role="alert"> Penjadwalan berhasil dihapus! <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>');
    }
}
