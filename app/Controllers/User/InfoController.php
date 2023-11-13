<?php

namespace App\Controllers\User;

use App\Controllers\BaseController;
use App\Models\Data_siswa;
use App\Models\Footer;
use App\Models\Navigation;
use App\Models\Penjadwalan;
use App\Models\Slideshow;
use App\Models\Tahun_ajaran;

class InfoController extends BaseController
{
    public function index()
    {
        $slideshow = new Slideshow();
        $footer = new Footer();
        $data['footer'] = $footer->findAll();
        $data['slideshow'] = $slideshow->findAll();

        $data['tahun_ajaran'] = $this->kondisi_TA();
        $data['navigation'] = $this->menu_handle();
        $data['navbar_active'] = 'none';
        return view('users/informasi/informasi', $data);
    }

    public function tataCara()
    {
        $slideshow = new Slideshow();
        $footer = new Footer();
        $data['footer'] = $footer->findAll();
        $data['slideshow'] = $slideshow->findAll();

        $data['tahun_ajaran'] = $this->kondisi_TA();
        $data['navigation'] = $this->menu_handle();
        $data['navbar_active'] = 'none';
        return view('users/informasi/tata_cara', $data);
    }

    public function persyaratan()
    {
        $slideshow = new Slideshow();
        $footer = new Footer();
        $data['footer'] = $footer->findAll();
        $data['slideshow'] = $slideshow->findAll();

        $data['tahun_ajaran'] = $this->kondisi_TA();
        $data['navigation'] = $this->menu_handle();
        $data['navbar_active'] = 'none';
        return view('users/informasi/persyaratan', $data);
    }

    public function jadwal()
    {
        $tahunAjaran = new Tahun_ajaran();
        $penjadwalan = new Penjadwalan();

        $data['TA'] = $tahunAjaran->findAll();
        $data['jadwal'] = $penjadwalan->findAll();

        $slideshow = new Slideshow();
        $footer = new Footer();
        $data['footer'] = $footer->findAll();
        $data['slideshow'] = $slideshow->findAll();

        $data['tahun_ajaran'] = $this->kondisi_TA();
        $data['navigation'] = $this->menu_handle();
        $data['navbar_active'] = 'none';
        return view('users/informasi/jadwal', $data);
    }

    private function menu_handle()
    {
        $navigation = new Navigation();
        $navData = $navigation->findAll();

        return $navData;
    }

    private function kondisi_TA()
    {
        $tahunAjaran = new Tahun_ajaran();
        $result = $tahunAjaran->findAll();

        return $result;
    }
}
