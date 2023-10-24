<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\Slideshow;

class SlideController extends BaseController
{
    public function index()
    {
        $slideshow = new Slideshow();
        $data['slideshow'] = $slideshow->findAll();
        $data['sidebar_active'] = 'slideshow';
        return view('admin/slideshow/index', $data);
    }

    public function tambah_form() {
        $data['sidebar_active'] = 'slideshow';
        return view('admin/slideshow/tambah', $data);
    }

    public function store() {
        helper('form');
        $rules = [
            'judul' => 'required',
            'deskripsi' => 'required',
            'gambar' => 'uploaded[gambar]|mime_in[gambar,image/jpg,image/jpeg,image/gif,image/png]|max_size[gambar,4096]',
        ];

        if($this->validate($rules)) {
            $slideshow = new Slideshow();
            $gambar = $this->request->getFile('gambar');
            $gambarName = $gambar->getRandomName();

            $data = [
                'judul' => $this->request->getPost('judul'),
                'deskripsi' => $this->request->getPost('deskripsi'),
                'gambar' => $gambarName,
            ];

            $gambar->move('uploads/slideshow/', $gambarName);
            $slideshow->save($data);
            return redirect()->to(base_url('slideshow'))->with('status', '<div class="alert alert-success alert-dismissible" role="alert"> Slideshow Berhasil di Tambahkan! <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>');
        } else {
            $data['validation'] = $this->validator;
            $data['sidebar_active'] = 'slideshow';
            return view('admin/slideshow/tambah', $data);
        }
    }

    public function delete($id) {
        $slideshow = new Slideshow();
        $data = $slideshow->find($id);
        $imageFile = $data['gambar'];
        if (file_exists("uploads/slideshow/" . $imageFile)) {
            unlink("uploads/slideshow/" . $imageFile);
        }

        $slideshow->delete($id);
        return redirect()->to(base_url('slideshow'))->with('status', '<div class="alert alert-danger alert-dismissible" role="alert"> Slideshow Berhasil di Hapus! <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>');
    }
}