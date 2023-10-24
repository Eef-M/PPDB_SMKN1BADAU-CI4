<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\Content;
use App\Models\Navigation;

class ContentController extends BaseController
{
    public function index()
    {
        $content = new Content();
        $navigation = new Navigation();
        
        $joinTable = $content->join('navigation_menu', 'navigation_menu.id = content.id_menu') 
                            -> select('content.*, navigation_menu.nama_menu')
                            ->findAll();

        $data['content'] = $joinTable;

        $data['sidebar_active'] = 'content';
        return view('admin/content/index', $data);
    }

    public function tambah_form() {
        $navigation = new Navigation();
        $data['navigation'] = $navigation->findAll();

        $data['sidebar_active'] = 'content';
        return view('admin/content/tambah', $data);
    }

    public function store() {
        helper('form');
        $rules = [
            'id_menu' => 'required',
            'gambar' => 'uploaded[gambar]|mime_in[gambar,image/jpg,image/jpeg,image/gif,image/png]|max_size[gambar,4096]',
            'judul' => 'required',
            'isi' => 'required',
        ];

        if($this->validate($rules)) {
            $content = new Content();
            $gambar = $this->request->getFile('gambar');
            $gambarName = $gambar->getRandomName();

            $data = [
                'id_menu' => $this->request->getPost('id_menu'),
                'gambar' => $gambarName,
                'judul' => $this->request->getPost('judul'),
                'isi' => $this->request->getPost('isi'),
            ];

            $gambar->move('uploads/content/', $gambarName);
            $content->save($data);
            return redirect()->to(base_url('content'))->with('status', '<div class="alert alert-success alert-dismissible" role="alert"> Konten Berhasil di Tambahkan! <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>');
        } else {
            $navigation = new Navigation();
            $data['navigation'] = $navigation->findAll();
            $data['validation'] = $this->validator;
            $data['sidebar_active'] = 'content';
            return view('admin/content/tambah', $data);
        }
    }

    public function edit($id)
    {
        $content = new Content();
        $navigation = new Navigation();

        $data['content'] = $content->find($id);
        $data['navigation'] = $navigation->findAll();

        $data['sidebar_active'] = 'content';
        return view('admin/content/edit', $data);
    }

    public function update($id)
    {
        helper('form');
        $rules = [
            'id_menu' => 'required',
            'gambar' => 'uploaded[gambar]|mime_in[gambar,image/jpg,image/jpeg,image/gif,image/png]|max_size[gambar,4096]',
            'judul' => 'required',
            'isi' => 'required',
        ];

        if ($this->validate($rules)) {

            $content = new Content();
            $un_gambar = $content->find($id);
            $gambarFile = $un_gambar['gambar'];

            if (file_exists("uploads/content/" . $gambarFile)) {
                unlink("uploads/content/" . $gambarFile);
            }

            $gambar = $this->request->getFile('gambar');
            $gambarName = $gambar->getRandomName();

            $data = [
                'id_menu' => $this->request->getPost('id_menu'),
                'gambar' => $gambarName,
                'judul' => $this->request->getPost('judul'),
                'isi' => $this->request->getPost('isi'),
            ];

            $gambar->move('uploads/content/', $gambarName);
            $content->update($id, $data);
            return redirect()->to(base_url('content'))->with('status', '<div class="alert alert-primary alert-dismissible" role="alert"> Konten Berhasil di Update! <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>');
        } else {
            $navigation = new Navigation();
            $content = new Content();
            $un_gambar = $content->find($id);
            $data['navigation'] = $navigation->findAll();
            $data['validation'] = $this->validator;
            $data['sidebar_active'] = 'content';
            return view('admin/content/edit', $data);
        }
    }

    public function delete($id) {
        $content = new Content();
        $data = $content->find($id);
        $imageFile = $data['gambar'];
        if (file_exists("uploads/content/" . $imageFile)) {
            unlink("uploads/content/" . $imageFile);
        }

        $content->delete($id);
        return redirect()->to(base_url('content'))->with('status', '<div class="alert alert-danger alert-dismissible" role="alert"> Konten Berhasil di Hapus! <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>');
    }
}