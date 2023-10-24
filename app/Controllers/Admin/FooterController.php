<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\Footer;

class FooterController extends BaseController
{
    public function index()
    {
        $slideshow = new Footer();
        $data['footer'] = $slideshow->findAll();
        $data['sidebar_active'] = 'footer';
        return view('admin/footer/index', $data);
    }

    public function tambah_form()
    {
        $data['sidebar_active'] = 'footer';
        return view('admin/footer/tambah', $data);
    }

    public function store()
    {
        helper('form');
        $rules = [
            'profile' => 'required',
            'alamat' => 'required',
            'phone' => 'required|numeric',
            'email' => 'required',
            'ig' => 'required',
            'fb' => 'required',
        ];

        if ($this->validate($rules)) {
            $footer = new Footer();
            $data = [
                'profile' => $this->request->getPost('profile'),
                'alamat' => $this->request->getPost('alamat'),
                'email' => $this->request->getPost('email'),
                'phone' => $this->request->getPost('phone'),
                'ig' => $this->request->getPost('ig'),
                'fb' => $this->request->getPost('fb'),
            ];

            $footer->save($data);
            return redirect()->to(base_url('footer'))->with('status', '<div class="alert alert-success alert-dismissible" role="alert"> Data Footer Berhasil di Tambahkan! <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>');
        } else {
            $data['validation'] = $this->validator;
            $data['sidebar_active'] = 'footer';
            return view('admin/footer/tambah', $data);
        }
    }

    public function delete($id)
    {
        $navigation = new Footer();
        $navigation->delete($id);
        return redirect()->to(base_url('footer'))->with('status', '<div class="alert alert-danger alert-dismissible" role="alert"> Footer Berhasil di Hapus! <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>');
    }
}
