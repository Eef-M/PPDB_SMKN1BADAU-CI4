<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\Navigation;

class NavigationController extends BaseController
{
    public function index()
    {
        $navigation = new Navigation();
        $data['navigation'] = $navigation->findAll();
        $data['sidebar_active'] = 'navigation';
        return view('admin/navigation/index', $data);
    }

    public function store()
    {
        helper('form');
        $rules = [
            'nama_menu' => 'required',
        ];


        if ($this->validate($rules)) {

            $navigation = new Navigation();
            $nama_menu = $this->request->getPost('nama_menu');
            $URL = strtolower($nama_menu);

            $data = [
                'nama_menu' => $nama_menu,
                'url' => 'menu/' . $URL
            ];

            $navigation->save($data);
            return redirect()->to(base_url('navigation'))->with('status', '<div class="alert alert-success alert-dismissible" role="alert"> Menu Berhasil di Tambahkan! <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>');
        } else {
            $data['validation'] = $this->validator;
            $data['sidebar_active'] = 'navigation';
            return view('admin/navigation/index', $data);
        }
    }

    public function delete($id) {
        $navigation = new Navigation();
        $navigation->delete($id);
        return redirect()->to(base_url('navigation'))->with('status', '<div class="alert alert-danger alert-dismissible" role="alert"> Menu Berhasil di Hapus! <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>');
    }
}