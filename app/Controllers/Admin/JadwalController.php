<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class JadwalController extends BaseController
{
    public function index()
    {
        $data['sidebar_active'] = 'jadwal';
        return view('admin/jadwal/index', $data);
    }
}
