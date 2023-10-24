<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\Tahun_ajaran;
use CodeIgniter\I18n\Time;

class TahunAjaranController extends BaseController
{
    public function index()
    {
        $time = new Time('now');
        $theDate = $time->toDateString();
        $data = [
            'date' => $theDate,
        ];

        // -------

        $tahun_ajaran = new Tahun_ajaran();
        $data['tahun_ajaran'] = $tahun_ajaran->findAll();
        $data['sidebar_active'] = 'tahun_ajaran';

        $TA = $tahun_ajaran->findAll();

        foreach ($TA as $item) {
            if ($theDate >= $item['tanggal_selesai']) {
                $this->emptyTableData();
            }
        }

        return view('admin/tahun_ajaran/index', $data);
    }

    public function tambah_form()
    {
        $data['sidebar_active'] = 'tahun_ajaran';
        return view('admin/tahun_ajaran/tambah', $data);
    }

    public function store()
    {
        helper('form');
        $rules = [
            'tahun_ajaran' => 'required',
            'keterangan' => 'required',
            'tanggal_mulai' => 'required',
            'tanggal_selesai' => 'required',
        ];

        if ($this->validate($rules)) {
            $tahun_ajaran = new Tahun_ajaran();

            $data = [
                'tahun_ajaran' => $this->request->getPost('tahun_ajaran'),
                'keterangan' => $this->request->getPost('keterangan'),
                'tanggal_mulai' => $this->request->getPost('tanggal_mulai'),
                'tanggal_selesai' => $this->request->getPost('tanggal_selesai'),
                'is_active' => 1,
            ];

            $tahun_ajaran->save($data);
            return redirect()->to(base_url('tahun_ajaran'))->with('status', '<div class="alert alert-success alert-dismissible" role="alert"> Tahun Ajaran berhasil ditambahkan! <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>');
        } else {
            $data['validation'] = $this->validator;
            $data['sidebar_active'] = 'tahun_ajaran';
            return view('admin/tahun_ajaran/tambah', $data);
        }
    }

    public function edit($id)
    {
        $tahun_ajaran = new Tahun_ajaran();
        $data['tahun_ajaran'] = $tahun_ajaran->find($id);
        $data['sidebar_active'] = 'tahun_ajaran';
        return view('admin/tahun_ajaran/edit', $data);
    }

    public function update($id)
    {
        helper('form');
        $rules = [
            'tahun_ajaran' => 'required',
            'keterangan' => 'required',
            'tanggal_mulai' => 'required',
            'tanggal_selesai' => 'required',
        ];

        if ($this->validate($rules)) {
            $tahun_ajaran = new Tahun_ajaran();
            $data = [
                'tahun_ajaran' => $this->request->getPost('tahun_ajaran'),
                'keterangan' => $this->request->getPost('keterangan'),
                'tanggal_mulai' => $this->request->getPost('tanggal_mulai'),
                'tanggal_selesai' => $this->request->getPost('tanggal_selesai'),
                'is_active' => $this->request->getPost('is_active'),
            ];

            $tahun_ajaran->update($id, $data);
            return redirect()->to(base_url('tahun_ajaran'))->with('status', '<div class="alert alert-primary alert-dismissible" role="alert">Tahun Ajaran Berhasil di Update<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>');
        } else {
            $data['validation'] = $this->validator;
            $tahun_ajaran = new Tahun_ajaran();
            $data['tahun_ajaran'] = $tahun_ajaran->find($id);
            $data['sidebar_active'] = 'tahun_ajaran';
            return view('admin/tahun_ajaran/edit', $data);
        }
    }

    public function delete($id)
    {
        $tahun_ajaran = new Tahun_ajaran();

        $tahun_ajaran->delete($id);
        return redirect()->to(base_url('tahun_ajaran'))->with('status', '<div class="alert alert-danger alert-dismissible" role="alert"> Tahun Ajaran Berhasil dihapus! <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>');
    }

    public function emptyTableData()
    {
        $model = new Tahun_ajaran();
        $model->emptyTable();

        return redirect()->to(base_url('tahun_ajaran'))->with('status', '<div class="alert alert-danger alert-dismissible" role="alert"> Tahun Ajaran Telah Selesai <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>');
    }

    // public function aktif($id)
    // {
    //     $tahun_ajaran = new Tahun_ajaran();
    //     $data = $tahun_ajaran->find($id);
    //     $data = [
    //         'is_active' => 1,
    //     ];
    //     $tahun_ajaran->update($id, $data);
    //     return redirect()->to(base_url('tahun_ajaran'))->with('status', '<div class="alert alert-success alert-dismissible" role="alert"> Tahun Ajaran Berhasil di Aktifkan <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>');
    // }

    // public function non_aktif($id)
    // {
    //     $tahun_ajaran = new Tahun_ajaran();
    //     $data = $tahun_ajaran->find($id);
    //     $data = [
    //         'is_active' => 0,
    //     ];
    //     $tahun_ajaran->update($id, $data);
    //     return redirect()->to(base_url('tahun_ajaran'))->with('status', '<div class="alert alert-danger alert-dismissible" role="alert"> Tahun Ajaran Berhasil di Non-Aktifkan <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>');
    // }
}
