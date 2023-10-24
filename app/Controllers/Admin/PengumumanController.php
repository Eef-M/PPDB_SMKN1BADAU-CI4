<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\Pengumuman;

class PengumumanController extends BaseController
{
    public function index()
    {
        $pengumuman = new Pengumuman();
        $data['pengumuman'] = $pengumuman->findAll();
        $data['sidebar_active'] = 'pengumuman';
        return view('admin/pengumuman/index', $data);
    }

    public function tambah_form()
    {
        $data['sidebar_active'] = 'pengumuman';
        return view('admin/pengumuman/tambah', $data);
    }

    public function store()
    {
        helper('form');
        $rules = [
            'foto' => 'uploaded[foto]|mime_in[foto,image/jpg,image/jpeg,image/gif,image/png]|max_size[foto,4096]',
            'judul' => 'required',
            'isi' => 'required',
        ];

        if ($this->validate($rules)) {
            $pengumuman = new Pengumuman();
            $foto = $this->request->getFile('foto');
            $fotoName = $foto->getRandomName();

            $data = [
                'foto' => $fotoName,
                'judul' => $this->request->getPost('judul'),
                'isi' => $this->request->getPost('isi'),
            ];

            $foto->move('uploads/pengumuman/', $fotoName);
            $pengumuman->save($data);
            return redirect()->to(base_url('admin-pengumuman'))->with('status', '<div class="alert alert-success alert-dismissible" role="alert"> Pengumuman berhasil ditambahkan! <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>');
        } else {
            $data['validation'] = $this->validator;
            $data['sidebar_active'] = 'pengumuman';
            return view('admin/pengumuman/tambah', $data);
        }
    }

    public function edit($id)
    {
        $pengumuman = new Pengumuman();
        $data['pengumuman'] = $pengumuman->find($id);
        $data['sidebar_active'] = 'pengumuman';
        return view('admin/pengumuman/edit', $data);
    }

    public function update($id)
    {
        helper('form');
        $rules = [
            'foto' => 'uploaded[foto]|mime_in[foto,image/jpg,image/jpeg,image/gif,image/png]|max_size[foto,4096]',
            'judul' => 'required',
            'isi' => 'required',
        ];

        if ($this->validate($rules)) {

            $pengumuman = new Pengumuman();
            $un_gambar = $pengumuman->find($id);
            $gambarFile = $un_gambar['foto'];

            if (file_exists("uploads/pengumuman/" . $gambarFile)) {
                unlink("uploads/pengumuman/" . $gambarFile);
            }

            $foto = $this->request->getFile('foto');
            $fotoName = $foto->getRandomName();

            $data = [
                'foto' => $fotoName,
                'judul' => $this->request->getPost('judul'),
                'isi' => $this->request->getPost('isi'),
            ];

            $foto->move('uploads/pengumuman/', $fotoName);
            $pengumuman->update($id, $data);
            return redirect()->to(base_url('admin-pengumuman'))->with('status', '<div class="alert alert-primary alert-dismissible" role="alert"> Pengumuman Berhasil di Update! <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>');
        } else {
            $data['validation'] = $this->validator;
            $pengumuman = new Pengumuman();
            $data['pengumuman'] = $pengumuman->find($id);
            $data['sidebar_active'] = 'pengumuman';
            return view('admin/pengumuman/edit', $data);
        }
    }


    public function delete($id)
    {
        $pengumuman = new Pengumuman();
        $data = $pengumuman->find($id);
        $imageFile = $data['foto'];
        if (file_exists("uploads/pengumuman/" . $imageFile)) {
            unlink("uploads/pengumuman/" . $imageFile);
        }

        $pengumuman->delete($id);
        return redirect()->to(base_url('admin-pengumuman'))->with('status', '<div class="alert alert-danger alert-dismissible" role="alert"> Pengumuman berhasil di hapus! <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>');
    }
}
