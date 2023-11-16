<?php

namespace App\Controllers\User;

use App\Controllers\BaseController;
use App\Libraries\Pdfgenerator;
use App\Models\Content;
use App\Models\Data_siswa;
use App\Models\Footer;
use App\Models\Navigation;
use App\Models\Nilai_mapel;
use App\Models\Slideshow;
use App\Models\Tahun_ajaran;
use App\Models\Upload_berkas;
use App\Models\Jurusan;
use FPDF;
use Config\Paths;
use CodeIgniter\I18n\Time;

class UserController extends BaseController
{
    public function index()
    {
        $slideshow = new Slideshow();
        $footer = new Footer();
        $dataSiswa = new Data_siswa();
        $data['footer'] = $footer->findAll();
        $data['slideshow'] = $slideshow->findAll();
        $data['data_siswa'] = $dataSiswa->findAll();

        $data['tahun_ajaran'] = $this->kondisi_TA();
        $data['navigation'] = $this->menu_handle();
        $data['navbar_active'] = 'home';
        return view('users/index', $data);
    }

    // public function detail_pengumuman($id)
    // {
    //     $pengumman = new Pengumuman();
    //     $footer = new Footer();
    //     $data['footer'] = $footer->findAll();
    //     $data['pengumuman'] = $pengumman->find($id);

    //     $data['tahun_ajaran'] = $this->kondisi_TA();
    //     $data['navigation'] = $this->menu_handle();
    //     $data['navbar_active'] = 'pengumuman';
    //     return view('users/detail_pengumuman', $data);
    // }

    public function pengumuman()
    {
        // $pengumman = new Pengumuman();
        $dataSiswa = new Data_siswa();
        $footer = new Footer();


        $data['footer'] = $footer->findAll();
        // $data['data_siswa'] = $dataSiswa->findAll();
        $data['data_siswa'] = $dataSiswa->getSiswaWithJurusan();
        // $data['pengumuman'] = $pengumman->findAll();

        $data['tahun_ajaran'] = $this->kondisi_TA();
        $data['navigation'] = $this->menu_handle();
        $data['navbar_active'] = 'pengumuman';
        return view('users/pengumuman', $data);
    }

    public function ppdb()
    {
        $dataSiswa = new Data_siswa();
        $nilaiMapel = new Nilai_mapel();
        $uploadBerkas = new Upload_berkas();
        $jurusan = new Jurusan();
        $footer = new Footer();
        $siswa = $dataSiswa->findAll();
        $nilai = $nilaiMapel->findAll();
        $uBerkas = $uploadBerkas->findAll();

        $getJN = $dataSiswa->getJalurByNisn(user()->nisn);
        $JN = null;

        if (is_array($getJN)) {
            $JN = implode($getJN);
        } else {
            $JN = 'null';
        }

        foreach ($siswa as $row) {
            foreach ($nilai as $n) {
                foreach ($uBerkas as $ub) {
                    if ($ub['nisn'] == user()->nisn && $n['nisn'] == user()->nisn && $row['nisn'] == user()->nisn) {
                        $id = $row['id'];
                        $data['profile'] = $dataSiswa->find($id);
                        $data['footer'] = $footer->findAll();
                        $data['berkas'] = $uploadBerkas->where('id_siswa', $id)->findAll();
                        $data['nilai'] = $nilaiMapel->where('id_siswa', $id)->findAll();
                        $data['tahun_ajaran'] = $this->kondisi_TA();
                        $data['navigation'] = $this->menu_handle();
                        $data['navbar_active'] = 'ppdb';

                        return view('users/ppdb_done', $data);
                    }
                }
            }
        }

        switch ($JN) {
            case 'zonasi':
                return $this->zonasi();
            case 'afirmasi':
                return $this->afirmasi();
            case 'mutasi':
                return $this->mutasi();
            case 'prestasi':
                return $this->prestasi();
            default:
                $data['footer'] = $footer->findAll();
                $data['tahun_ajaran'] = $this->kondisi_TA();
                $data['navigation'] = $this->menu_handle();
                $data['navbar_active'] = 'ppdb';
                return view('users/ppdb', $data);
        }
    }

    public function edit_profile($id)
    {
        $dataSiswa = new Data_siswa();
        $data_jurusan = new Jurusan();
        $data['profile'] = $dataSiswa->find($id);
        $data['jurusan'] = $data_jurusan->findAll();

        $data['tahun_ajaran'] = $this->kondisi_TA();
        $data['navigation'] = $this->menu_handle();
        $data['navbar_active'] = 'ppdb';

        return view('users/terdaftar/edit_profile', $data);
    }

    public function update_profile($id)
    {
        $data_siswa = new Data_siswa();

        $data = [
            'tanggal_pendaftaran' => $this->request->getPost('tanggal_pendaftaran'),
            'nisn' => $this->request->getPost('nisn'),
            'nama_siswa' => $this->request->getPost('nama_siswa'),
            'nik' => $this->request->getPost('nik'),
            'id_jurusan' => $this->request->getPost('id_jurusan'),
            'jenis_kelamin' => $this->request->getPost('jenis_kelamin'),
            'tempat_lahir' => $this->request->getPost('tempat_lahir'),
            'tanggal_lahir' => $this->request->getPost('tanggal_lahir'),
            'agama' => $this->request->getPost('agama'),
            'status_dlm_kel' => $this->request->getPost('status_dlm_kel'),
            'alamat' => $this->request->getPost('alamat'),
            'rt' => $this->request->getPost('rt'),
            'rw' => $this->request->getPost('rw'),
            'kelurahan' => $this->request->getPost('kelurahan'),
            'kecamatan' => $this->request->getPost('kecamatan'),
            'kab_kota' => $this->request->getPost('kab_kota'),
            'provinsi' => $this->request->getPost('provinsi'),
            'nohp_siswa' => $this->request->getPost('nohp_siswa'),
            'nama_ayah' => $this->request->getPost('nama_ayah'),
            'nik_ayah' => $this->request->getPost('nik_ayah'),
            'nama_ibu' => $this->request->getPost('nama_ibu'),
            'nik_ibu' => $this->request->getPost('nik_ibu'),
            'nohp_ortu' => $this->request->getPost('nohp_ortu'),
            'jalur' => $this->request->getPost('jalur'),
            'status' => $this->request->getPost('status'),
            'verif' => $this->request->getPost('verif'),
        ];

        $data_siswa->update($id, $data);

        return redirect()->to(base_url('user-ppdb'))->with('status', '<div class="alert alert-success alert-dismissible mx-4" role="alert">Profile Berhasil di Update<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>');
    }

    public function edit_nilai($id)
    {
        $dataSiswa = new Data_siswa();
        $nilaiMapel = new Nilai_mapel();

        $data['profile'] = $dataSiswa->find($id);
        $data['nilai'] = $nilaiMapel->where('id_siswa', $id)->findAll();

        $data['tahun_ajaran'] = $this->kondisi_TA();
        $data['navigation'] = $this->menu_handle();
        $data['navbar_active'] = 'ppdb';

        return view('users/terdaftar/edit_nilai', $data);
    }

    public function update_nilai($id)
    {
        $nilai_mapel = new Nilai_mapel();

        $bindoHit = $this->request->getPost('bindo_1') + $this->request->getPost('bindo_2') + $this->request->getPost('bindo_3') + $this->request->getPost('bindo_4') + $this->request->getPost('bindo_5');
        $bingHit = $this->request->getPost('bing_1') + $this->request->getPost('bing_2') + $this->request->getPost('bing_3') + $this->request->getPost('bing_4') + $this->request->getPost('bing_5');
        $mtkHit = $this->request->getPost('mtk_1') + $this->request->getPost('mtk_2') + $this->request->getPost('mtk_3') + $this->request->getPost('mtk_4') + $this->request->getPost('mtk_5');
        $ipaHit = $this->request->getPost('ipa_1') + $this->request->getPost('ipa_2') + $this->request->getPost('ipa_3') + $this->request->getPost('ipa_4') + $this->request->getPost('ipa_5');
        $ipsHit = $this->request->getPost('ips_1') + $this->request->getPost('ips_2') + $this->request->getPost('ips_3') + $this->request->getPost('ips_4') + $this->request->getPost('ips_5');

        $bindoBobot = $bindoHit / 5;
        $bingBobot = $bingHit / 5;
        $mtkBobot = $mtkHit / 5;
        $ipaBobot = $ipaHit / 5;
        $ipsBobot = $ipsHit / 5;

        $hitBobotHasil = $bindoBobot + $bingBobot + $mtkBobot + $ipaBobot + $ipsBobot;
        $bobotHasil = $hitBobotHasil / 5;

        // Perhitungan Bobot End
        $data = [
            'bindo_1' => $this->request->getPost('bindo_1'),
            'bindo_2' => $this->request->getPost('bindo_2'),
            'bindo_3' => $this->request->getPost('bindo_3'),
            'bindo_4' => $this->request->getPost('bindo_4'),
            'bindo_5' => $this->request->getPost('bindo_5'),
            'bing_1' => $this->request->getPost('bing_1'),
            'bing_2' => $this->request->getPost('bing_2'),
            'bing_3' => $this->request->getPost('bing_3'),
            'bing_4' => $this->request->getPost('bing_4'),
            'bing_5' => $this->request->getPost('bing_5'),
            'mtk_1' => $this->request->getPost('mtk_1'),
            'mtk_2' => $this->request->getPost('mtk_2'),
            'mtk_3' => $this->request->getPost('mtk_3'),
            'mtk_4' => $this->request->getPost('mtk_4'),
            'mtk_5' => $this->request->getPost('mtk_5'),
            'ipa_1' => $this->request->getPost('ipa_1'),
            'ipa_2' => $this->request->getPost('ipa_2'),
            'ipa_3' => $this->request->getPost('ipa_3'),
            'ipa_4' => $this->request->getPost('ipa_4'),
            'ipa_5' => $this->request->getPost('ipa_5'),
            'ips_1' => $this->request->getPost('ips_1'),
            'ips_2' => $this->request->getPost('ips_2'),
            'ips_3' => $this->request->getPost('ips_3'),
            'ips_4' => $this->request->getPost('ips_4'),
            'ips_5' => $this->request->getPost('ips_5'),
            'bobot_bindo' => $bindoBobot,
            'bobot_bing' => $bingBobot,
            'bobot_mtk' => $mtkBobot,
            'bobot_ipa' => $ipaBobot,
            'bobot_ips' => $ipsBobot,
            'bobot_hasil' => $bobotHasil,
        ];

        $nilai_mapel->update($id, $data);

        return redirect()->to(base_url('user-ppdb'))->with('status', '<div class="alert alert-success alert-dismissible mx-4" role="alert">Nilai Berhasil di Update<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>');
    }


    private function menu_handle()
    {
        $navigation = new Navigation();
        $navData = $navigation->findAll();

        return $navData;
    }

    public function zonasi()
    {
        $dataSiswa = new Data_siswa();
        $nilaiMapel = new Nilai_mapel();
        $uploadBerkas = new Upload_berkas();
        $footer = new Footer();
        $data_jurusan = new Jurusan();
        $time = new Time('now');
        $theDate = $time->format('d/m/Y');

        $userNISN = user()->nisn;

        $isDataDiriSubmitted = $dataSiswa->where('nisn', $userNISN)->countAllResults() > 0;
        $isFormNilaiSubmitted = $nilaiMapel->where('nisn', $userNISN)->countAllResults() > 0;
        $isUploadBerkasSubmitted = $uploadBerkas->where('nisn', $userNISN)->countAllResults() > 0;

        $data['siswa'] = $isDataDiriSubmitted;
        $data['nilai'] = $isFormNilaiSubmitted;
        $data['berkas'] = $isUploadBerkasSubmitted;
        $data['date'] = $theDate;
        $data['jurusan'] = $data_jurusan->findAll();
        $data['footer'] = $footer->findAll();
        $data['semua_pendaftar'] = $dataSiswa->countAllResults();
        $data['pendaftar_laki2'] = $dataSiswa->where('jenis_kelamin', 'laki-laki')->countAllResults();
        $data['pendaftar_perempuan'] = $dataSiswa->where('jenis_kelamin', 'perempuan')->countAllResults();

        $data['tahun_ajaran'] = $this->kondisi_TA();
        $data['navigation'] = $this->menu_handle();
        $data['navbar_active'] = 'ppdb';

        if (!$isDataDiriSubmitted) {
            $current_form = 'data_diri';
        } elseif (!$isFormNilaiSubmitted) {
            $current_form = 'form_nilai';
        } elseif (!$isUploadBerkasSubmitted) {
            $current_form = 'upload_berkas';
        } else {
            $current_form = 'selesai';
        }

        $data['current_form'] = $current_form;

        return view('users/form_ppdb/zonasi', $data);
    }

    public function afirmasi()
    {
        $dataSiswa = new Data_siswa();
        $uploadBerkas = new Upload_berkas();
        $footer = new Footer();
        $data_jurusan = new Jurusan();
        $time = new Time('now');
        $theDate = $time->format('d/m/Y');
        $userNISN = user()->nisn;

        $isDataDiriSubmitted = $dataSiswa->where('nisn', $userNISN)->countAllResults() > 0;
        $isUploadBerkasSubmitted = $uploadBerkas->where('nisn', $userNISN)->countAllResults() > 0;

        $data['siswa'] = $isDataDiriSubmitted;
        $data['berkas'] = $isUploadBerkasSubmitted;
        $data['date'] = $theDate;
        $data['jurusan'] = $data_jurusan->findAll();
        $data['footer'] = $footer->findAll();
        $data['semua_pendaftar'] = $dataSiswa->countAllResults();
        $data['pendaftar_laki2'] = $dataSiswa->where('jenis_kelamin', 'laki-laki')->countAllResults();
        $data['pendaftar_perempuan'] = $dataSiswa->where('jenis_kelamin', 'perempuan')->countAllResults();

        $data['tahun_ajaran'] = $this->kondisi_TA();
        $data['navigation'] = $this->menu_handle();
        $data['navbar_active'] = 'ppdb';

        if (!$isDataDiriSubmitted) {
            $current_form = 'data_diri';
        } elseif (!$isUploadBerkasSubmitted) {
            $current_form = 'upload_berkas';
        } else {
            $current_form = 'selesai';
        }

        $data['current_form'] = $current_form;

        return view('users/form_ppdb/afirmasi', $data);
    }

    public function mutasi()
    {
        $dataSiswa = new Data_siswa();
        $nilaiMapel = new Nilai_mapel();
        $uploadBerkas = new Upload_berkas();
        $footer = new Footer();
        $data_jurusan = new Jurusan();
        $time = new Time('now');
        $theDate = $time->format('d/m/Y');

        $userNISN = user()->nisn;

        $isDataDiriSubmitted = $dataSiswa->where('nisn', $userNISN)->countAllResults() > 0;
        $isFormNilaiSubmitted = $nilaiMapel->where('nisn', $userNISN)->countAllResults() > 0;
        $isUploadBerkasSubmitted = $uploadBerkas->where('nisn', $userNISN)->countAllResults() > 0;

        $data['siswa'] = $isDataDiriSubmitted;
        $data['nilai'] = $isFormNilaiSubmitted;
        $data['berkas'] = $isUploadBerkasSubmitted;
        $data['date'] = $theDate;
        $data['jurusan'] = $data_jurusan->findAll();
        $data['footer'] = $footer->findAll();
        $data['semua_pendaftar'] = $dataSiswa->countAllResults();
        $data['pendaftar_laki2'] = $dataSiswa->where('jenis_kelamin', 'laki-laki')->countAllResults();
        $data['pendaftar_perempuan'] = $dataSiswa->where('jenis_kelamin', 'perempuan')->countAllResults();

        $data['tahun_ajaran'] = $this->kondisi_TA();
        $data['navigation'] = $this->menu_handle();
        $data['navbar_active'] = 'ppdb';

        if (!$isDataDiriSubmitted) {
            $current_form = 'data_diri';
        } elseif (!$isFormNilaiSubmitted) {
            $current_form = 'form_nilai';
        } elseif (!$isUploadBerkasSubmitted) {
            $current_form = 'upload_berkas';
        } else {
            $current_form = 'selesai';
        }

        $data['current_form'] = $current_form;

        return view('users/form_ppdb/mutasi', $data);
    }

    public function prestasi()
    {
        $dataSiswa = new Data_siswa();
        $nilaiMapel = new Nilai_mapel();
        $uploadBerkas = new Upload_berkas();
        $footer = new Footer();
        $data_jurusan = new Jurusan();
        $time = new Time('now');
        $theDate = $time->format('d/m/Y');

        $userNISN = user()->nisn;

        $isDataDiriSubmitted = $dataSiswa->where('nisn', $userNISN)->countAllResults() > 0;
        $isFormNilaiSubmitted = $nilaiMapel->where('nisn', $userNISN)->countAllResults() > 0;
        $isUploadBerkasSubmitted = $uploadBerkas->where('nisn', $userNISN)->countAllResults() > 0;

        $data['siswa'] = $isDataDiriSubmitted;
        $data['nilai'] = $isFormNilaiSubmitted;
        $data['berkas'] = $isUploadBerkasSubmitted;
        $data['date'] = $theDate;
        $data['jurusan'] = $data_jurusan->findAll();
        $data['footer'] = $footer->findAll();
        $data['semua_pendaftar'] = $dataSiswa->countAllResults();
        $data['pendaftar_laki2'] = $dataSiswa->where('jenis_kelamin', 'laki-laki')->countAllResults();
        $data['pendaftar_perempuan'] = $dataSiswa->where('jenis_kelamin', 'perempuan')->countAllResults();

        $data['tahun_ajaran'] = $this->kondisi_TA();
        $data['navigation'] = $this->menu_handle();
        $data['navbar_active'] = 'ppdb';

        if (!$isDataDiriSubmitted) {
            $current_form = 'data_diri';
        } elseif (!$isFormNilaiSubmitted) {
            $current_form = 'form_nilai';
        } elseif (!$isUploadBerkasSubmitted) {
            $current_form = 'upload_berkas';
        } else {
            $current_form = 'selesai';
        }

        $data['current_form'] = $current_form;

        return view('users/form_ppdb/prestasi', $data);
    }

    public function error_berkas()
    {
        $footer = new Footer();
        $data['footer'] = $footer->findAll();
        $data['tahun_ajaran'] = $this->kondisi_TA();
        $data['navigation'] = $this->menu_handle();
        $data['navbar_active'] = 'ppdb';
        return view('users/form_ppdb/error_berkas', $data);
    }

    private function kondisi_TA()
    {
        $tahunAjaran = new Tahun_ajaran();
        $result = $tahunAjaran->findAll();

        return $result;
    }

    public function store_bio()
    {
        helper('form');
        $rules = [
            'nisn' => 'required|numeric|min_length[10]',
            'nama_siswa' => 'required|alpha_space',
            'nik' => 'required|numeric|min_length[16]',
            'id_jurusan' => 'required',
            'jenis_kelamin' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required',
            'agama' => 'required',
            'status_dlm_kel' => 'required',
            'alamat' => 'required',
            'rt' => 'required|numeric',
            'rw' => 'required|numeric',
            'kelurahan' => 'required',
            'kecamatan' => 'required',
            'kab_kota' => 'required',
            'provinsi' => 'required',
            'nohp_siswa' => 'required|numeric',
            'nama_ayah' => 'required',
            'nik_ayah' => 'required|numeric',
            'nama_ibu' => 'required',
            'nik_ibu' => 'required|numeric',
            'nohp_ortu' => 'required|numeric',
        ];

        if ($this->validate($rules)) {
            $data_siswa = new Data_siswa();
            $nilai_mapel = new Nilai_mapel();
            $time = new Time('now');
            $theDate = $time->toDateString();

            $data = [
                'tanggal_pendaftaran' => $theDate,
                'nisn' => $this->request->getPost('nisn'),
                'nama_siswa' => $this->request->getPost('nama_siswa'),
                'nik' => $this->request->getPost('nik'),
                'id_jurusan' => $this->request->getPost('id_jurusan'),
                'jenis_kelamin' => $this->request->getPost('jenis_kelamin'),
                'tempat_lahir' => $this->request->getPost('tempat_lahir'),
                'tanggal_lahir' => $this->request->getPost('tanggal_lahir'),
                'agama' => $this->request->getPost('agama'),
                'status_dlm_kel' => $this->request->getPost('status_dlm_kel'),
                'alamat' => $this->request->getPost('alamat'),
                'rt' => $this->request->getPost('rt'),
                'rw' => $this->request->getPost('rw'),
                'kelurahan' => $this->request->getPost('kelurahan'),
                'kecamatan' => $this->request->getPost('kecamatan'),
                'kab_kota' => $this->request->getPost('kab_kota'),
                'provinsi' => $this->request->getPost('provinsi'),
                'nohp_siswa' => $this->request->getPost('nohp_siswa'),
                'nama_ayah' => $this->request->getPost('nama_ayah'),
                'nik_ayah' => $this->request->getPost('nik_ayah'),
                'nama_ibu' => $this->request->getPost('nama_ibu'),
                'nik_ibu' => $this->request->getPost('nik_ibu'),
                'nohp_ortu' => $this->request->getPost('nohp_ortu'),
                'jalur' => $this->request->getPost('jalur'),
                'status' => 0,
            ];

            $data_siswa->insertDataSiswa($data);

            $jalur = $this->request->getPost('jalur');

            if ($jalur == 'zonasi') {
                return redirect()->to(base_url('user-tambah-zonasi'))->with('status', '<div class="alert alert-success alert-dismissible mx-4" role="alert">Data Tersimpan!<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>');
            } elseif ($jalur == 'afirmasi') {

                $siswaIDget = $data_siswa->getIdByNisn(user()->nisn);
                $siswaIDconv = implode($siswaIDget);

                $ID_siswa = intval($siswaIDconv);

                $dataN = [
                    'id_siswa' => $ID_siswa,
                    'nisn' => user()->nisn,
                    'bindo_1' => 0,
                    'bindo_2' => 0,
                    'bindo_3' => 0,
                    'bindo_4' => 0,
                    'bindo_5' => 0,
                    'bing_1' => 0,
                    'bing_2' => 0,
                    'bing_3' => 0,
                    'bing_4' => 0,
                    'bing_5' => 0,
                    'mtk_1' => 0,
                    'mtk_2' => 0,
                    'mtk_3' => 0,
                    'mtk_4' => 0,
                    'mtk_5' => 0,
                    'ipa_1' => 0,
                    'ipa_2' => 0,
                    'ipa_3' => 0,
                    'ipa_4' => 0,
                    'ipa_5' => 0,
                    'ips_1' => 0,
                    'ips_2' => 0,
                    'ips_3' => 0,
                    'ips_4' => 0,
                    'ips_5' => 0,
                    'bobot_bindo' => 0,
                    'bobot_bing' => 0,
                    'bobot_mtk' => 0,
                    'bobot_ipa' => 0,
                    'bobot_ips' => 0,
                    'bobot_hasil' => 0,
                ];

                $nilai_mapel->insertNilaiMapel($dataN);

                return redirect()->to(base_url('user-tambah-afirmasi'))->with('status', '<div class="alert alert-success alert-dismissible mx-4" role="alert">Data Tersimpan!<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>');
            } elseif ($jalur == 'mutasi') {
                return redirect()->to(base_url('user-tambah-mutasi'))->with('status', '<div class="alert alert-success alert-dismissible mx-4" role="alert">Data Tersimpan!<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>');
            } elseif ($jalur == 'prestasi') {
                return redirect()->to(base_url('user-tambah-prestasi'))->with('status', '<div class="alert alert-success alert-dismissible mx-4" role="alert">Data Tersimpan!<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>');
            } else {
                return redirect()->to(base_url('user-ppdb'))->with('status', '<div class="alert alert-danger alert-dismissible mx-4" role="alert">Gagal! coba lagi<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>');
            }
        } else {
            $role_action = $this->request->getPost('jalur');

            if ($role_action == 'zonasi') {
                return $this->zonasi();
            } elseif ($role_action == 'afirmasi') {
                return $this->afirmasi();
            } elseif ($role_action == 'mutasi') {
                return $this->mutasi();
            } elseif ($role_action == 'prestasi') {
                return $this->prestasi();
            } else {
                return $this->ppdb();
            }
        }
    }

    public function store_nilai()
    {
        $data_siswa = new Data_siswa();
        $nilai_mapel = new Nilai_mapel();
        $siswa = $data_siswa->findAll();

        $siswaIDget = $data_siswa->getIdByNisn(user()->nisn);
        $siswaIDconv = implode($siswaIDget);

        $ID_siswa = intval($siswaIDconv);

        // Perhitungan Bobot

        $bindoHit = $this->request->getPost('bindo_1') + $this->request->getPost('bindo_2') + $this->request->getPost('bindo_3') + $this->request->getPost('bindo_4') + $this->request->getPost('bindo_5');
        $bingHit = $this->request->getPost('bing_1') + $this->request->getPost('bing_2') + $this->request->getPost('bing_3') + $this->request->getPost('bing_4') + $this->request->getPost('bing_5');
        $mtkHit = $this->request->getPost('mtk_1') + $this->request->getPost('mtk_2') + $this->request->getPost('mtk_3') + $this->request->getPost('mtk_4') + $this->request->getPost('mtk_5');
        $ipaHit = $this->request->getPost('ipa_1') + $this->request->getPost('ipa_2') + $this->request->getPost('ipa_3') + $this->request->getPost('ipa_4') + $this->request->getPost('ipa_5');
        $ipsHit = $this->request->getPost('ips_1') + $this->request->getPost('ips_2') + $this->request->getPost('ips_3') + $this->request->getPost('ips_4') + $this->request->getPost('ips_5');

        $bindoBobot = $bindoHit / 5;
        $bingBobot = $bingHit / 5;
        $mtkBobot = $mtkHit / 5;
        $ipaBobot = $ipaHit / 5;
        $ipsBobot = $ipsHit / 5;

        $hitBobotHasil = $bindoBobot + $bingBobot + $mtkBobot + $ipaBobot + $ipsBobot;
        $bobotHasil = $hitBobotHasil / 5;

        // Perhitungan Bobot End
        $data = [
            'id_siswa' => $ID_siswa,
            'nisn' => user()->nisn,
            'bindo_1' => $this->request->getPost('bindo_1'),
            'bindo_2' => $this->request->getPost('bindo_2'),
            'bindo_3' => $this->request->getPost('bindo_3'),
            'bindo_4' => $this->request->getPost('bindo_4'),
            'bindo_5' => $this->request->getPost('bindo_5'),
            'bing_1' => $this->request->getPost('bing_1'),
            'bing_2' => $this->request->getPost('bing_2'),
            'bing_3' => $this->request->getPost('bing_3'),
            'bing_4' => $this->request->getPost('bing_4'),
            'bing_5' => $this->request->getPost('bing_5'),
            'mtk_1' => $this->request->getPost('mtk_1'),
            'mtk_2' => $this->request->getPost('mtk_2'),
            'mtk_3' => $this->request->getPost('mtk_3'),
            'mtk_4' => $this->request->getPost('mtk_4'),
            'mtk_5' => $this->request->getPost('mtk_5'),
            'ipa_1' => $this->request->getPost('ipa_1'),
            'ipa_2' => $this->request->getPost('ipa_2'),
            'ipa_3' => $this->request->getPost('ipa_3'),
            'ipa_4' => $this->request->getPost('ipa_4'),
            'ipa_5' => $this->request->getPost('ipa_5'),
            'ips_1' => $this->request->getPost('ips_1'),
            'ips_2' => $this->request->getPost('ips_2'),
            'ips_3' => $this->request->getPost('ips_3'),
            'ips_4' => $this->request->getPost('ips_4'),
            'ips_5' => $this->request->getPost('ips_5'),
            'bobot_bindo' => $bindoBobot,
            'bobot_bing' => $bingBobot,
            'bobot_mtk' => $mtkBobot,
            'bobot_ipa' => $ipaBobot,
            'bobot_ips' => $ipsBobot,
            'bobot_hasil' => $bobotHasil,
        ];

        $nilai_mapel->insertNilaiMapel($data);

        foreach ($siswa as $row) {

            if ($row['jalur'] == 'zonasi') {
                return redirect()->to(base_url('user-tambah-zonasi'))->with('status', '<div class="alert alert-success alert-dismissible mx-4" role="alert">Data Tersimpan!<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>');
            } elseif ($row['jalur'] == 'mutasi') {
                return redirect()->to(base_url('user-tambah-mutasi'))->with('status', '<div class="alert alert-success alert-dismissible mx-4" role="alert">Data Tersimpan!<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>');
            } elseif ($row['jalur'] == 'prestasi') {
                return redirect()->to(base_url('user-tambah-prestasi'))->with('status', '<div class="alert alert-success alert-dismissible mx-4" role="alert">Data Tersimpan!<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>');
            } else {
                return redirect()->to(base_url('user-ppdb'))->with('status', '<div class="alert alert-danger alert-dismissible mx-4" role="alert">Gagal! coba lagi<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>');
            }
        }
    }

    public function store_berkas()
    {
        $data_siswa = new Data_siswa();
        $upload_berkas = new Upload_berkas();
        $siswa = $data_siswa->findAll();

        $data = array();
        $siswaIDget = $data_siswa->getIdByNisn(user()->nisn);
        $siswaIDconv = implode($siswaIDget);

        $ID_siswa = intval($siswaIDconv);

        foreach ($siswa as $row) {
            if ($row['nisn'] == user()->nisn) {
                $up_foto = $this->request->getFile('foto');
                $up_kk = $this->request->getFile('kartu_keluarga');
                $up_scnisn = $this->request->getFile('scan_nisn');
                $up_rpt1sd5 = $this->request->getFile('rpt_smstr_1sd5');
                $up_kelkurmampu = $this->request->getFile('kel_kur_mampu');
                $up_stortu = $this->request->getFile('st_ortu');
                $up_sertifpres = $this->request->getFile('sertif_prestasi');

                // Validasi jalur
                if ($row['jalur'] == 'zonasi') {
                    // Validasi tipe berkas
                    if (!$up_foto->isValid() || !in_array($up_foto->getClientMimeType(), ['image/jpeg', 'image/jpg', 'image/png']) || $up_foto->getSize() > 4 * 1024 * 1024) {
                        return redirect()->to(base_url('error-berkas'))->with('error', '<span class="text-primary fs-4 fw-bold">Berkas foto harus berupa JPG, JPEG, atau PNG dan maksimal ukuran file 4MB. Silahkan isi ulang </span>');
                    }

                    if (!$up_kk->isValid() || $up_kk->getClientMimeType() !== 'application/pdf' || $up_kk->getSize() > 10 * 1024 * 1024) {
                        return redirect()->to(base_url('error-berkas'))->with('error', '<span class="text-primary fs-4 fw-bold">Berkas kartu keluarga harus berupa PDF dan maksimal ukuran file 10MB. Silahkan isi ulang </span>');
                    }

                    if (!$up_scnisn->isValid() || $up_scnisn->getClientMimeType() !== 'application/pdf' || $up_scnisn->getSize() > 10 * 1024 * 1024) {
                        return redirect()->to(base_url('error-berkas'))->with('error', '<span class="text-primary fs-4 fw-bold">Berkas scan NISN harus berupa PDF dan maksimal ukuran file 10MB. Silahkan isi ulang </span>');
                    }

                    if (!$up_rpt1sd5->isValid() || $up_rpt1sd5->getClientMimeType() !== 'application/pdf' || $up_rpt1sd5->getSize() > 20 * 1024 * 1024) {
                        return redirect()->to(base_url('error-berkas'))->with('error', '<span class="text-primary fs-4 fw-bold">Berkas raport semester 1 sampai 5 harus berupa PDF dan maksimal ukuran file 20MB. Silahkan isi ulang </span>');
                    }

                    // Generate nama berkas dan simpan berkas
                    $name_foto = $up_foto->getRandomName();
                    $name_kk = $up_kk->getRandomName();
                    $name_scnisn = $up_scnisn->getRandomName();
                    $name_rpt1sd5 = $up_rpt1sd5->getRandomName();
                    $name_kelkurmampu = '-';
                    $name_stortu = '-';
                    $name_sertifpres = '-';
                } elseif ($row['jalur'] == 'afirmasi') {
                    // Validasi tipe berkas
                    if (!$up_foto->isValid() || !in_array($up_foto->getClientMimeType(), ['image/jpeg', 'image/jpg', 'image/png']) || $up_foto->getSize() > 4 * 1024 * 1024) {
                        return redirect()->to(base_url('error-berkas'))->with('error', '<span class="text-primary fs-4 fw-bold">Berkas foto harus berupa JPG, JPEG, atau PNG dan maksimal ukuran file 4MB. Silahkan isi ulang </span>');
                    }

                    if (!$up_kk->isValid() || $up_kk->getClientMimeType() !== 'application/pdf' || $up_kk->getSize() > 10 * 1024 * 1024) {
                        return redirect()->to(base_url('error-berkas'))->with('error', '<span class="text-primary fs-4 fw-bold">Berkas kartu keluarga harus berupa PDF dan maksimal ukuran file 10MB. Silahkan isi ulang </span>');
                    }

                    if (!$up_scnisn->isValid() || $up_scnisn->getClientMimeType() !== 'application/pdf' || $up_scnisn->getSize() > 10 * 1024 * 1024) {
                        return redirect()->to(base_url('error-berkas'))->with('error', '<span class="text-primary fs-4 fw-bold">Berkas scan NISN harus berupa PDF dan maksimal ukuran file 10MB. Silahkan isi ulang </span>');
                    }

                    if (!$up_rpt1sd5->isValid() || $up_rpt1sd5->getClientMimeType() !== 'application/pdf' || $up_rpt1sd5->getSize() > 20 * 1024 * 1024) {
                        return redirect()->to(base_url('error-berkas'))->with('error', '<span class="text-primary fs-4 fw-bold">Berkas raport semester 1 sampai 5 harus berupa PDF dan maksimal ukuran file 20MB. Silahkan isi ulang </span>');
                    }
                    if (!$up_kelkurmampu->isValid() || $up_kelkurmampu->getClientMimeType() !== 'application/pdf' || $up_kelkurmampu->getSize() > 10 * 1024 * 1024) {
                        return redirect()->to(base_url('error-berkas'))->with('error', '<span class="text-primary fs-4 fw-bold">Berkas keluarga kurang mampu harus berupa PDF dan maksimal ukuran file 10MB. Silahkan isi ulang </span>');
                    }
                    // Generate nama berkas dan simpan berkas
                    $name_foto = $up_foto->getRandomName();
                    $name_kk = $up_kk->getRandomName();
                    $name_scnisn = $up_scnisn->getRandomName();
                    $name_rpt1sd5 = $up_rpt1sd5->getRandomName();
                    $name_kelkurmampu = $up_kelkurmampu->getRandomName();
                    $name_stortu = '-';
                    $name_sertifpres = '-';
                } elseif ($row['jalur'] == 'mutasi') {
                    // Validasi tipe berkas
                    if (!$up_foto->isValid() || !in_array($up_foto->getClientMimeType(), ['image/jpeg', 'image/jpg', 'image/png']) || $up_foto->getSize() > 4 * 1024 * 1024) {
                        return redirect()->to(base_url('error-berkas'))->with('error', '<span class="text-primary fs-4 fw-bold">Berkas foto harus berupa JPG, JPEG, atau PNG dan maksimal ukuran file 4MB. Silahkan isi ulang</span>');
                    }

                    if (!$up_kk->isValid() || $up_kk->getClientMimeType() !== 'application/pdf' || $up_kk->getSize() > 10 * 1024 * 1024) {
                        return redirect()->to(base_url('error-berkas'))->with('error', '<span class="text-primary fs-4 fw-bold">Berkas kartu keluarga harus berupa PDF dan maksimal ukuran file 10MB. Silahkan isi ulang</span>');
                    }

                    if (!$up_scnisn->isValid() || $up_scnisn->getClientMimeType() !== 'application/pdf' || $up_scnisn->getSize() > 10 * 1024 * 1024) {
                        return redirect()->to(base_url('error-berkas'))->with('error', '<span class="text-primary fs-4 fw-bold">Berkas scan NISN harus berupa PDF dan maksimal ukuran file 10MB. Silahkan isi ulang </span>');
                    }

                    if (!$up_rpt1sd5->isValid() || $up_rpt1sd5->getClientMimeType() !== 'application/pdf' || $up_rpt1sd5->getSize() > 20 * 1024 * 1024) {
                        return redirect()->to(base_url('error-berkas'))->with('error', '<span class="text-primary fs-4 fw-bold">Berkas raport semester 1 sampai 5 harus berupa PDF dan maksimal ukuran file 20MB. Silahkan isi ulang </span>');
                    }
                    if (!$up_stortu->isValid() || $up_stortu->getClientMimeType() !== 'application/pdf' || $up_stortu->getSize() > 10 * 1024 * 1024) {
                        return redirect()->to(base_url('error-berkas'))->with('error', '<span class="text-primary fs-4 fw-bold">Berkas surat ortu harus berupa PDF dan maksimal ukuran file 10MB. Silahkan isi ulang </span>');
                    }
                    // Generate nama berkas dan simpan berkas
                    $name_foto = $up_foto->getRandomName();
                    $name_kk = $up_kk->getRandomName();
                    $name_scnisn = $up_scnisn->getRandomName();
                    $name_rpt1sd5 = $up_rpt1sd5->getRandomName();
                    $name_kelkurmampu = '-';
                    $name_stortu = $up_stortu->getRandomName();
                    $name_sertifpres = '-';
                } elseif ($row['jalur'] == 'prestasi') {
                    // Validasi tipe berkas
                    if (!$up_foto->isValid() || !in_array($up_foto->getClientMimeType(), ['image/jpeg', 'image/jpg', 'image/png']) || $up_foto->getSize() > 4 * 1024 * 1024) {
                        return redirect()->to(base_url('error-berkas'))->with('error', '<span class="text-primary fs-4 fw-bold">Berkas foto harus berupa JPG, JPEG, atau PNG dan maksimal ukuran file 4MB. Silahkan isi ulang </span>');
                    }

                    if (!$up_kk->isValid() || $up_kk->getClientMimeType() !== 'application/pdf' || $up_kk->getSize() > 10 * 1024 * 1024) {
                        return redirect()->to(base_url('error-berkas'))->with('error', '<span class="text-primary fs-4 fw-bold">Berkas kartu keluarga harus berupa PDF dan maksimal ukuran file 10MB. Silahkan isi ulang </span>');
                    }

                    if (!$up_scnisn->isValid() || $up_scnisn->getClientMimeType() !== 'application/pdf' || $up_scnisn->getSize() > 10 * 1024 * 1024) {
                        return redirect()->to(base_url('error-berkas'))->with('error', '<span class="text-primary fs-4 fw-bold">Berkas scan NISN harus berupa PDF dan maksimal ukuran file 10MB. Silahkan isi ulang </span>');
                    }

                    if (!$up_rpt1sd5->isValid() || $up_rpt1sd5->getClientMimeType() !== 'application/pdf' || $up_rpt1sd5->getSize() > 20 * 1024 * 1024) {
                        return redirect()->to(base_url('error-berkas'))->with('error', '<span class="text-primary fs-4 fw-bold">Berkas raport semester 1 sampai 5 harus berupa PDF dan maksimal ukuran file 20MB. Silahkan isi ulang </span>');
                    }
                    if (!$up_sertifpres->isValid() || $up_sertifpres->getClientMimeType() !== 'application/pdf' || $up_sertifpres->getSize() > 10 * 1024 * 1024) {
                        return redirect()->to(base_url('error-berkas'))->with('error', '<span class="text-primary fs-4 fw-bold">Berkas sertifikat prestasi harus berupa PDF dan maksimal ukuran file 10MB. Silahkan isi ulang </span>');
                    }
                    // Generate nama berkas dan simpan berkas
                    $name_foto = $up_foto->getRandomName();
                    $name_kk = $up_kk->getRandomName();
                    $name_scnisn = $up_scnisn->getRandomName();
                    $name_rpt1sd5 = $up_rpt1sd5->getRandomName();
                    $name_kelkurmampu = '-';
                    $name_stortu = '-';
                    $name_sertifpres = $up_sertifpres->getRandomName();
                } else {
                    return redirect()->to(base_url('error-berkas'));
                }

                $data = [
                    'id_siswa' => $ID_siswa,
                    'nisn' => user()->nisn,
                    'foto' => $name_foto,
                    'kartu_keluarga' => $name_kk,
                    'scan_nisn' => $name_scnisn,
                    'rpt_smstr_1sd5' => $name_rpt1sd5,
                    'kel_kur_mampu' => $name_kelkurmampu,
                    'st_ortu' => $name_stortu,
                    'sertif_prestasi' => $name_sertifpres,
                ];

                $up_foto->move('uploads/berkas_siswa/', $name_foto);
                $up_kk->move('uploads/berkas_siswa/', $name_kk);
                $up_scnisn->move('uploads/berkas_siswa/', $name_scnisn);
                $up_rpt1sd5->move('uploads/berkas_siswa/', $name_rpt1sd5);

                if ($row['jalur'] == 'afirmasi') {
                    $up_kelkurmampu->move('uploads/berkas_siswa/', $name_kelkurmampu);
                } elseif ($row['jalur'] == 'mutasi') {
                    $up_stortu->move('uploads/berkas_siswa/', $name_stortu);
                } elseif ($row['jalur'] == 'prestasi') {
                    $up_sertifpres->move('uploads/berkas_siswa/', $name_sertifpres);
                }

                $upload_berkas->insertUploadBerkas($data);
            }
        }

        $data['tahun_ajaran'] = $this->kondisi_TA();
        $data['navigation'] = $this->menu_handle();
        return view('users/notif_page', $data);
    }

    public function lihat_pdf($id)
    {
        $siswaModel = new Data_siswa();
        $nilaiMapelModel = new Nilai_mapel();
        $berkasModel = new Upload_berkas();

        $siswa = $siswaModel->find($id);
        $data['profile'] = $siswa;
        $data['nilai'] = $nilaiMapelModel->where('id_siswa', $id)->findAll();
        $data['title_pdf'] = 'Bukti Pendaftaran';

        $dataBerkas = $berkasModel->where('id_siswa', $id)->findAll();

        foreach ($dataBerkas as $img) {
            $foto = $img['foto'];
        }

        $fotoPatch = ROOTPATH . 'public/uploads/berkas_siswa/' . $foto;
        $fotoData = base64_encode(file_get_contents($fotoPatch));
        $data['foto_siswa'] = 'data:image/;base64,' . $fotoData;

        $imagePath = ROOTPATH . 'public/assets/img/logo-smk.png';
        $imageData = base64_encode(file_get_contents($imagePath));
        $data['logo'] = 'data:image/png;base64,' . $imageData;

        if ($siswa['jalur'] == 'afirmasi') {
            return view('users/pdf_afirmasi', $data);
        } else {
            return view('users/pdf_template', $data);
        }
    }

    public function view_pdf($id)
    {
        $Pdfgenerator = new Pdfgenerator();
        $siswaModel = new Data_siswa();
        $berkasModel = new Upload_berkas();
        $nilaiMapelModel = new Nilai_mapel();
        $jurusanModel = new Jurusan();

        $siswa = $siswaModel->find($id);
        $data['profile'] = $siswa;
        $data['nilai'] = $nilaiMapelModel->where('id_siswa', $id)->findAll();

        $dataJurusan = $jurusanModel->where('id', $siswa['id_jurusan'])->findAll();

        foreach ($dataJurusan as $dj) {
            $jurusan = $dj['jurusan'];
        }

        $data['jurusan'] = $jurusan;

        $dataBerkas = $berkasModel->where('id_siswa', $id)->findAll();

        foreach ($dataBerkas as $img) {
            $foto = $img['foto'];
        }

        $fotoPatch = ROOTPATH . 'public/uploads/berkas_siswa/' . $foto;
        $fotoData = base64_encode(file_get_contents($fotoPatch));
        $data['foto_siswa'] = 'data:image/;base64,' . $fotoData;

        $imagePath = ROOTPATH . 'public/assets/img/logo-smk.png';
        $imageData = base64_encode(file_get_contents($imagePath));
        $data['logo'] = 'data:image/png;base64,' . $imageData;

        // title dari pdf
        $data['title_pdf'] = 'Bukti Pendaftaran';

        // filename dari pdf ketika didownload
        $file_pdf = 'bukti_pendaftaran-' . $data['profile']['nama_siswa'];
        // setting paper
        $paper = 'A3';
        //orientasi paper potrait / landscape
        $orientation = "portrait";

        if ($siswa['jalur'] == 'afirmasi') {
            $html = view('users/pdf_afirmasi', $data);
            // run dompdf
            $Pdfgenerator->generate($html, $file_pdf, $paper, $orientation);
        } else {
            $html = view('users/pdf_template', $data);
            // run dompdf
            $Pdfgenerator->generate($html, $file_pdf, $paper, $orientation);
        }
    }

    public function dynamicMenu($menuName)
    {
        // Ambil data menu berdasarkan nama
        $navigation = new Navigation();
        $menu = $navigation->where('nama_menu', $menuName)->first();

        if ($menu) {
            $content = new Content();
            $konten = $content->getContentByMenuId($menu['id']);

            $data['menu'] = $menu;
            $data['content'] = $konten;

            $data['tahun_ajaran'] = $this->kondisi_TA();
            $footer = new Footer();
            $data['footer'] = $footer->findAll();
            $data['navigation'] = $this->menu_handle();
            // Tampilkan halaman dengan data yang sesuai
            return view('users/dinamis', $data);
        } else {
            $data['tahun_ajaran'] = $this->kondisi_TA();
            $data['navigation'] = $this->menu_handle();
            $footer = new Footer();
            $data['footer'] = $footer->findAll();
            // Tampilkan halaman default jika menu tidak ditemukan
            return view('users/default', $data);
        }
    }
}
