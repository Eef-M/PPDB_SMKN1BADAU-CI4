<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\Jurusan;
use App\Models\Data_siswa;

class JurusanController extends BaseController
{
    public function index()
    {
        $data_siswa = new Data_siswa();
        $data_jurusan = new Jurusan();

        $jumlahSiswaPerJurusan = [];

        $jurusanSiswa = $data_siswa->distinct()->findColumn('jurusan');

        if ($jurusanSiswa !== null) {
            foreach ($jurusanSiswa as $jurusan) {
                $jumlahSiswa = $data_siswa->where('jurusan', $jurusan)->countAllResults();
                $jumlahSiswaPerJurusan[$jurusan] = $jumlahSiswa;
            }
        }

        $jurusanGuru = $data_jurusan->distinct()->findColumn('jurusan');

        if ($jurusanGuru !== null) {
            foreach ($jurusanGuru as $jurusan) {
                $jumlahSiswa = $data_siswa->where('jurusan', $jurusan)->countAllResults();
                $data_jurusan->set(['siswa' => $jumlahSiswa])->where('jurusan', $jurusan)->update();
            }
        }

        $data['jurusan'] = $data_jurusan->findAll();

        $data['sidebar_active'] = 'jurusan';
        return view('admin/jurusan/index', $data);
    }

    public function tambah_form()
    {
        $data['sidebar_active'] = 'jurusan';
        return view('admin/jurusan/tambah', $data);
    }

    public function store()
    {
        helper('form');
        $rules = [
            'gambar' => 'uploaded[gambar]|mime_in[gambar,image/jpg,image/jpeg,image/gif,image/png]|max_size[gambar,4096]',
            'guru' => 'required',
            'jurusan' => 'required',
        ];

        if ($this->validate($rules)) {
            $jurusan = new Jurusan();
            $gambar = $this->request->getFile('gambar');
            $gambarName = $gambar->getRandomName();

            $data = [
                'gambar' => $gambarName,
                'guru' => $this->request->getPost('guru'),
                'jurusan' => $this->request->getPost('jurusan'),
                'siswa' => 0,
            ];

            $gambar->move('uploads/jurusan/', $gambarName);
            $jurusan->save($data);
            return redirect()->to(base_url('jurusan'))->with('status', '<div class="alert alert-success alert-dismissible" role="alert"> Data Jurusan Berhasil di Tambahkan! <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>');
        } else {
            $data['validation'] = $this->validator;
            $data['sidebar_active'] = 'jurusan';
            return view('admin/jurusan/tambah', $data);
        }
    }

    public function edit($id)
    {
        $jurusan = new Jurusan();
        $data['jurusan'] = $jurusan->find($id);
        $data['sidebar_active'] = 'jurusan';
        return view('admin/jurusan/edit', $data);
    }

    public function update($id)
    {
        helper('form');
        $rules = [
            'gambar' => 'uploaded[gambar]|mime_in[gambar,image/jpg,image/jpeg,image/gif,image/png]|max_size[gambar,4096]',
            'guru' => 'required',
            'jurusan' => 'required',
        ];

        if ($this->validate($rules)) {

            $jurusan = new Jurusan();
            $un_gambar = $jurusan->find($id);
            $gambarFile = $un_gambar['gambar'];

            if (file_exists("uploads/jurusan/" . $gambarFile)) {
                unlink("uploads/jurusan/" . $gambarFile);
            }

            $gambar = $this->request->getFile('gambar');
            $gambarName = $gambar->getRandomName();

            $data = [
                'gambar' => $gambarName,
                'guru' => $this->request->getPost('guru'),
                'jurusan' => $this->request->getPost('jurusan'),
                'siswa' => 0,
            ];

            $gambar->move('uploads/jurusan/', $gambarName);
            $jurusan->update($id, $data);
            return redirect()->to(base_url('jurusan'))->with('status', '<div class="alert alert-primary alert-dismissible" role="alert"> Jurusan Berhasil di Update! <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>');
        } else {
            $data['validation'] = $this->validator;
            $jurusan = new Jurusan();
            $data['jurusan'] = $jurusan->find($id);
            $data['sidebar_active'] = 'jurusan';
            return view('admin/jurusan/edit', $data);
        }
    }

    public function delete($id)
    {
        $jurusan = new Jurusan();
        $data = $jurusan->find($id);
        $imageFile = $data['gambar'];
        if (file_exists("uploads/jurusan/" . $imageFile)) {
            unlink("uploads/jurusan/" . $imageFile);
        }

        $jurusan->delete($id);
        return redirect()->to(base_url('jurusan'))->with('status', '<div class="alert alert-danger alert-dismissible" role="alert"> Data Jurusan Berhasil di Hapus! <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>');
    }
}
