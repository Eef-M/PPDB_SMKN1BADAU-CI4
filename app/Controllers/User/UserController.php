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

    public function detail_pengumuman($id)
    {
        $pengumman = new Pengumuman();
        $footer = new Footer();
        $data['footer'] = $footer->findAll();
        $data['pengumuman'] = $pengumman->find($id);

        $data['tahun_ajaran'] = $this->kondisi_TA();
        $data['navigation'] = $this->menu_handle();
        $data['navbar_active'] = 'pengumuman';
        return view('users/detail_pengumuman', $data);
    }

    public function pengumuman()
    {
        // $pengumman = new Pengumuman();
        $dataSiswa = new Data_siswa();
        $footer = new Footer();
        $data['footer'] = $footer->findAll();
        $data['data_siswa'] = $dataSiswa->findAll();
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
        $siswa = $dataSiswa->findAll();

        foreach ($siswa as $row) {
            if ($row['nisn'] == user()->nisn) {
                $id = $row['id'];
                $data['profile'] = $dataSiswa->find($id);
                $data['berkas'] = $uploadBerkas->where('id_siswa', $id)->findAll();
                $data['nilai'] = $nilaiMapel->where('id_siswa', $id)->findAll();
                $data['tahun_ajaran'] = $this->kondisi_TA();
                $data['navigation'] = $this->menu_handle();
                $data['navbar_active'] = 'ppdb';
                return view('users/ppdb_done', $data);
            }
        }

        $footer = new Footer();
        $data['footer'] = $footer->findAll();
        $data['tahun_ajaran'] = $this->kondisi_TA();
        $data['navigation'] = $this->menu_handle();
        $data['navbar_active'] = 'ppdb';
        return view('users/ppdb', $data);
    }

    public function edit_nilai($id) {
        $dataSiswa = new Data_siswa();
        $nilaiMapel = new Nilai_mapel();

        $data['profile'] = $dataSiswa->find($id);
        $data['nilai'] = $nilaiMapel->where('id_siswa', $id)->findAll();

        $data['tahun_ajaran'] = $this->kondisi_TA();
        $data['navigation'] = $this->menu_handle();
        $data['navbar_active'] = 'ppdb';

        return view('users/terdaftar/edit_nilai', $data);
    }

    public function update_nilai($id) {
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
        $footer = new Footer();
        $data_jurusan = new Jurusan();

        $data['jurusan'] = $data_jurusan->findAll();
        $data['footer'] = $footer->findAll();
        $data['semua_pendaftar'] = $dataSiswa->countAllResults();
        $data['pendaftar_laki2'] = $dataSiswa->where('jenis_kelamin', 'laki-laki')->countAllResults();
        $data['pendaftar_perempuan'] = $dataSiswa->where('jenis_kelamin', 'perempuan')->countAllResults();

        $data['tahun_ajaran'] = $this->kondisi_TA();
        $data['navigation'] = $this->menu_handle();
        $data['navbar_active'] = 'ppdb';
        return view('users/form_ppdb/zonasi', $data);
    }
    public function afirmasi()
    {
        $dataSiswa = new Data_siswa();
        $footer = new Footer();
        $data_jurusan = new Jurusan();

        $data['jurusan'] = $data_jurusan->findAll();
        $data['footer'] = $footer->findAll();
        $data['semua_pendaftar'] = $dataSiswa->countAllResults();
        $data['pendaftar_laki2'] = $dataSiswa->where('jenis_kelamin', 'laki-laki')->countAllResults();
        $data['pendaftar_perempuan'] = $dataSiswa->where('jenis_kelamin', 'perempuan')->countAllResults();

        $data['tahun_ajaran'] = $this->kondisi_TA();
        $data['navigation'] = $this->menu_handle();
        $data['navbar_active'] = 'ppdb';
        return view('users/form_ppdb/afirmasi', $data);
    }
    public function mutasi()
    {
        $dataSiswa = new Data_siswa();
        $footer = new Footer();
        $data_jurusan = new Jurusan();

        $data['jurusan'] = $data_jurusan->findAll();
        $data['footer'] = $footer->findAll();
        $data['semua_pendaftar'] = $dataSiswa->countAllResults();
        $data['pendaftar_laki2'] = $dataSiswa->where('jenis_kelamin', 'laki-laki')->countAllResults();
        $data['pendaftar_perempuan'] = $dataSiswa->where('jenis_kelamin', 'perempuan')->countAllResults();

        $data['tahun_ajaran'] = $this->kondisi_TA();
        $data['navigation'] = $this->menu_handle();
        $data['navbar_active'] = 'ppdb';
        return view('users/form_ppdb/mutasi', $data);
    }
    public function prestasi()
    {
        $dataSiswa = new Data_siswa();
        $footer = new Footer();
        $data_jurusan = new Jurusan();

        $data['jurusan'] = $data_jurusan->findAll();
        $data['footer'] = $footer->findAll();
        $data['semua_pendaftar'] = $dataSiswa->countAllResults();
        $data['pendaftar_laki2'] = $dataSiswa->where('jenis_kelamin', 'laki-laki')->countAllResults();
        $data['pendaftar_perempuan'] = $dataSiswa->where('jenis_kelamin', 'perempuan')->countAllResults();

        $data['tahun_ajaran'] = $this->kondisi_TA();
        $data['navigation'] = $this->menu_handle();
        $data['navbar_active'] = 'ppdb';
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

    public function store()
    {
        $data_siswa = new Data_siswa();
        $nilai_mapel = new Nilai_mapel();
        $upload_berkas = new Upload_berkas();

        $data1 = [
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
            'status' => 0,
        ];

        $data_siswa->insertDataSiswa($data1);

        $jalur = $this->request->getPost('jalur');

        $data2 = array();

        if ($jalur == 'afirmasi') {
            $data2 = [
                'id_siswa' => $data_siswa->insertID,
                'bindo_1' => '-',
                'bindo_2' => '-',
                'bindo_3' => '-',
                'bindo_4' => '-',
                'bindo_5' => '-',
                'bing_1' => '-',
                'bing_2' => '-',
                'bing_3' => '-',
                'bing_4' => '-',
                'bing_5' => '-',
                'mtk_1' => '-',
                'mtk_2' => '-',
                'mtk_3' => '-',
                'mtk_4' => '-',
                'mtk_5' => '-',
                'ipa_1' => '-',
                'ipa_2' => '-',
                'ipa_3' => '-',
                'ipa_4' => '-',
                'ipa_5' => '-',
                'ips_1' => '-',
                'ips_2' => '-',
                'ips_3' => '-',
                'ips_4' => '-',
                'ips_5' => '-',
                'bobot_bindo' => '-',
                'bobot_bing' => '-',
                'bobot_mtk' => '-',
                'bobot_ipa' => '-',
                'bobot_ips' => '-',
                'bobot_hasil' => '-',
            ];
        } else {
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
            $data2 = [
                'id_siswa' => $data_siswa->insertID,
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
        }

        $nilai_mapel->insertNilaiMapel($data2);

        $data3 = array();

        if ($jalur == 'zonasi') {

            $up_foto = $this->request->getFile('foto');
            $up_kk = $this->request->getFile('kartu_keluarga');
            $up_scnisn = $this->request->getFile('scan_nisn');
            $up_rpts1 = $this->request->getFile('rpt_smstr_1');
            $up_rpts2 = $this->request->getFile('rpt_smstr_2');
            $up_rpts3 = $this->request->getFile('rpt_smstr_3');
            $up_rpts4 = $this->request->getFile('rpt_smstr_4');
            $up_rpts5 = $this->request->getFile('rpt_smstr_5');

            $name_foto = $up_foto->getRandomName();
            $name_kk = $up_kk->getRandomName();
            $name_scnisn = $up_scnisn->getRandomName();
            $name_rpts1 = $up_rpts1->getRandomName();
            $name_rpts2 = $up_rpts2->getRandomName();
            $name_rpts3 = $up_rpts3->getRandomName();
            $name_rpts4 = $up_rpts4->getRandomName();
            $name_rpts5 = $up_rpts5->getRandomName();

            $data3 = [
                'id_siswa' => $data_siswa->insertID,
                'foto' => $name_foto,
                'kartu_keluarga' => $name_kk,
                'scan_nisn' => $name_scnisn,
                'rpt_smstr_1' => $name_rpts1,
                'rpt_smstr_2' => $name_rpts2,
                'rpt_smstr_3' => $name_rpts3,
                'rpt_smstr_4' => $name_rpts4,
                'rpt_smstr_5' => $name_rpts5,
                'kel_kur_mampu' => '-',
                'st_ortu' => '-',
                'sertif_prestasi' => '-',
            ];

            $up_foto->move('uploads/berkas_siswa/', $name_foto);
            $up_kk->move('uploads/berkas_siswa/', $name_kk);
            $up_scnisn->move('uploads/berkas_siswa/', $name_scnisn);
            $up_rpts1->move('uploads/berkas_siswa/', $name_rpts1);
            $up_rpts2->move('uploads/berkas_siswa/', $name_rpts2);
            $up_rpts3->move('uploads/berkas_siswa/', $name_rpts3);
            $up_rpts4->move('uploads/berkas_siswa/', $name_rpts4);
            $up_rpts5->move('uploads/berkas_siswa/', $name_rpts5);
        } elseif ($jalur == 'afirmasi') {

            $up_foto = $this->request->getFile('foto');
            $up_kk = $this->request->getFile('kartu_keluarga');
            $up_scnisn = $this->request->getFile('scan_nisn');
            $up_rpts1 = $this->request->getFile('rpt_smstr_1');
            $up_rpts2 = $this->request->getFile('rpt_smstr_2');
            $up_rpts3 = $this->request->getFile('rpt_smstr_3');
            $up_rpts4 = $this->request->getFile('rpt_smstr_4');
            $up_rpts5 = $this->request->getFile('rpt_smstr_5');
            $up_kelkurmampu = $this->request->getFile('kel_kur_mampu');

            $name_foto = $up_foto->getRandomName();
            $name_kk = $up_kk->getRandomName();
            $name_scnisn = $up_scnisn->getRandomName();
            $name_rpts1 = $up_rpts1->getRandomName();
            $name_rpts2 = $up_rpts2->getRandomName();
            $name_rpts3 = $up_rpts3->getRandomName();
            $name_rpts4 = $up_rpts4->getRandomName();
            $name_rpts5 = $up_rpts5->getRandomName();
            $name_kelkurmampu = $up_kelkurmampu->getRandomName();

            $data3 = [
                'id_siswa' => $data_siswa->insertID,
                'foto' => $name_foto,
                'kartu_keluarga' => $name_kk,
                'scan_nisn' => $name_scnisn,
                'rpt_smstr_1' => $name_rpts1,
                'rpt_smstr_2' => $name_rpts2,
                'rpt_smstr_3' => $name_rpts3,
                'rpt_smstr_4' => $name_rpts4,
                'rpt_smstr_5' => $name_rpts5,
                'kel_kur_mampu' => $name_kelkurmampu,
                'st_ortu' => '-',
                'sertif_prestasi' => '-',
            ];

            $up_foto->move('uploads/berkas_siswa/', $name_foto);
            $up_kk->move('uploads/berkas_siswa/', $name_kk);
            $up_scnisn->move('uploads/berkas_siswa/', $name_scnisn);
            $up_rpts1->move('uploads/berkas_siswa/', $name_rpts1);
            $up_rpts2->move('uploads/berkas_siswa/', $name_rpts2);
            $up_rpts3->move('uploads/berkas_siswa/', $name_rpts3);
            $up_rpts4->move('uploads/berkas_siswa/', $name_rpts4);
            $up_rpts5->move('uploads/berkas_siswa/', $name_rpts5);
            $up_kelkurmampu->move('uploads/berkas_siswa/', $name_kelkurmampu);
        } elseif ($jalur == 'mutasi') {

            $up_foto = $this->request->getFile('foto');
            $up_kk = $this->request->getFile('kartu_keluarga');
            $up_scnisn = $this->request->getFile('scan_nisn');
            $up_rpts1 = $this->request->getFile('rpt_smstr_1');
            $up_rpts2 = $this->request->getFile('rpt_smstr_2');
            $up_rpts3 = $this->request->getFile('rpt_smstr_3');
            $up_rpts4 = $this->request->getFile('rpt_smstr_4');
            $up_rpts5 = $this->request->getFile('rpt_smstr_5');
            $up_stortu = $this->request->getFile('st_ortu');

            $name_foto = $up_foto->getRandomName();
            $name_kk = $up_kk->getRandomName();
            $name_scnisn = $up_scnisn->getRandomName();
            $name_rpts1 = $up_rpts1->getRandomName();
            $name_rpts2 = $up_rpts2->getRandomName();
            $name_rpts3 = $up_rpts3->getRandomName();
            $name_rpts4 = $up_rpts4->getRandomName();
            $name_rpts5 = $up_rpts5->getRandomName();
            $name_stortu = $up_stortu->getRandomName();

            $data3 = [
                'id_siswa' => $data_siswa->insertID,
                'foto' => $name_foto,
                'kartu_keluarga' => $name_kk,
                'scan_nisn' => $name_scnisn,
                'rpt_smstr_1' => $name_rpts1,
                'rpt_smstr_2' => $name_rpts2,
                'rpt_smstr_3' => $name_rpts3,
                'rpt_smstr_4' => $name_rpts4,
                'rpt_smstr_5' => $name_rpts5,
                'kel_kur_mampu' => '-',
                'st_ortu' => $name_stortu,
                'sertif_prestasi' => '-',
            ];

            $up_foto->move('uploads/berkas_siswa/', $name_foto);
            $up_kk->move('uploads/berkas_siswa/', $name_kk);
            $up_scnisn->move('uploads/berkas_siswa/', $name_scnisn);
            $up_rpts1->move('uploads/berkas_siswa/', $name_rpts1);
            $up_rpts2->move('uploads/berkas_siswa/', $name_rpts2);
            $up_rpts3->move('uploads/berkas_siswa/', $name_rpts3);
            $up_rpts4->move('uploads/berkas_siswa/', $name_rpts4);
            $up_rpts5->move('uploads/berkas_siswa/', $name_rpts5);
            $up_stortu->move('uploads/berkas_siswa/', $name_stortu);
        } elseif ($jalur == 'prestasi') {

            $up_foto = $this->request->getFile('foto');
            $up_kk = $this->request->getFile('kartu_keluarga');
            $up_scnisn = $this->request->getFile('scan_nisn');
            $up_rpts1 = $this->request->getFile('rpt_smstr_1');
            $up_rpts2 = $this->request->getFile('rpt_smstr_2');
            $up_rpts3 = $this->request->getFile('rpt_smstr_3');
            $up_rpts4 = $this->request->getFile('rpt_smstr_4');
            $up_rpts5 = $this->request->getFile('rpt_smstr_5');
            $up_sertifpres = $this->request->getFile('sertif_prestasi');

            $name_foto = $up_foto->getRandomName();
            $name_kk = $up_kk->getRandomName();
            $name_scnisn = $up_scnisn->getRandomName();
            $name_rpts1 = $up_rpts1->getRandomName();
            $name_rpts2 = $up_rpts2->getRandomName();
            $name_rpts3 = $up_rpts3->getRandomName();
            $name_rpts4 = $up_rpts4->getRandomName();
            $name_rpts5 = $up_rpts5->getRandomName();
            $name_sertifpres = $up_sertifpres->getRandomName();

            $data3 = [
                'id_siswa' => $data_siswa->insertID,
                'foto' => $name_foto,
                'kartu_keluarga' => $name_kk,
                'scan_nisn' => $name_scnisn,
                'rpt_smstr_1' => $name_rpts1,
                'rpt_smstr_2' => $name_rpts2,
                'rpt_smstr_3' => $name_rpts3,
                'rpt_smstr_4' => $name_rpts4,
                'rpt_smstr_5' => $name_rpts5,
                'kel_kur_mampu' => '-',
                'st_ortu' => '-',
                'sertif_prestasi' => $name_sertifpres,
            ];

            $up_foto->move('uploads/berkas_siswa/', $name_foto);
            $up_kk->move('uploads/berkas_siswa/', $name_kk);
            $up_scnisn->move('uploads/berkas_siswa/', $name_scnisn);
            $up_rpts1->move('uploads/berkas_siswa/', $name_rpts1);
            $up_rpts2->move('uploads/berkas_siswa/', $name_rpts2);
            $up_rpts3->move('uploads/berkas_siswa/', $name_rpts3);
            $up_rpts4->move('uploads/berkas_siswa/', $name_rpts4);
            $up_rpts5->move('uploads/berkas_siswa/', $name_rpts5);
            $up_sertifpres->move('uploads/berkas_siswa/', $name_sertifpres);
        } else {
            return redirect()->to(base_url('error-berkas'));
        }

        $upload_berkas->insertUploadBerkas($data3);

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
