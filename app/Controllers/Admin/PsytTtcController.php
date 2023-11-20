<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\Persyaratan;
use App\Models\Tata_cara;

class PsytTtcController extends BaseController
{
    public function index()
    {
        $persyaratanModel = new Persyaratan();
        $tataCaraModel = new Tata_cara();

        $data['persyaratan'] = $persyaratanModel->findAll();
        $data['tata_cara'] = $tataCaraModel->findAll();

        $data['sidebar_active'] = 'psyttc';
        return view('admin/psyttc/index', $data);
    }

    public function formPersyaratan()
    {
        $data['sidebar_active'] = 'psyttc';
        return view('admin/psyttc/tambah_persyaratan', $data);
    }

    public function formTataCara()
    {
        $data['sidebar_active'] = 'psyttc';
        return view('admin/psyttc/tambah_tata_cara', $data);
    }

    public function storePersyaratan()
    {
        $persyaratanModel = new Persyaratan();

        $data = [
            'deskripsi' => $this->request->getPost('deskripsi'),
        ];

        $persyaratanModel->save($data);
        return redirect()->to(base_url('psyttc'))->with('status', '<div class="alert alert-success alert-dismissible" role="alert"> Persyaratan berhasil ditambahkan! <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>');
    }

    public function storeTataCara()
    {
        $tataCaraModel = new Tata_cara();

        $data = [
            'deskripsi' => $this->request->getPost('deskripsi'),
        ];

        $tataCaraModel->save($data);
        return redirect()->to(base_url('psyttc'))->with('status', '<div class="alert alert-success alert-dismissible" role="alert"> Tata Cara berhasil ditambahkan! <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>');
    }

    public function editPersyaratan($id)
    {
        $persyaratanModel = new Persyaratan();
        $data['persyaratan'] = $persyaratanModel->find($id);

        $data['sidebar_active'] = 'psyttc';
        return view('admin/psyttc/edit_persyaratan', $data);
    }

    public function editTataCara($id)
    {
        $tataCaraModel = new Tata_cara();
        $data['tata_cara'] = $tataCaraModel->find($id);

        $data['sidebar_active'] = 'psyttc';
        return view('admin/psyttc/edit_tata_cara', $data);
    }

    public function updatePersyaratan($id)
    {
        $persyaratanModel = new Persyaratan();

        $data = [
            'deskripsi' => $this->request->getPost('deskripsi'),
        ];

        $persyaratanModel->update($id, $data);
        return redirect()->to(base_url('psyttc'))->with('status', '<div class="alert alert-primary alert-dismissible" role="alert"> Tata Cara berhasil di update! <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>');
    }

    public function updateTataCara($id)
    {
        $tataCaraModel = new Tata_cara();

        $data = [
            'deskripsi' => $this->request->getPost('deskripsi'),
        ];

        $tataCaraModel->update($id, $data);
        return redirect()->to(base_url('psyttc'))->with('status', '<div class="alert alert-primary alert-dismissible" role="alert"> Tata Cara berhasil di update! <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>');
    }

    public function HapusPersyaratan()
    {
        $persyaratanModel = new Persyaratan();
        $persyaratanModel->truncate();

        return redirect()->to(base_url('psyttc'))->with('status', '<div class="alert alert-danger alert-dismissible" role="alert"> Persyaratan berhasil dihapus! <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>');
    }

    public function HapusTataCara()
    {
        $tataCaraModel = new Tata_cara();
        $tataCaraModel->truncate();

        return redirect()->to(base_url('psyttc'))->with('status', '<div class="alert alert-danger alert-dismissible" role="alert"> Tata Cara berhasil dihapus! <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>');
    }
}
