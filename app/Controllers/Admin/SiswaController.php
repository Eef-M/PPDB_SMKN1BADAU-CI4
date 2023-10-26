<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\Data_siswa;
use App\Models\Nilai_mapel;
use App\Models\NilaiSertif;
use App\Models\Upload_berkas;
use App\Models\Jurusan;
use CodeIgniter\HTTP\ResponseInterface;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use PhpOffice\PhpSpreadsheet\Style\Border;
use PhpOffice\PhpSpreadsheet\Style\Font;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class SiswaController extends BaseController
{
    public function index()
    {
        $data_siswa = new Data_siswa();
        $data['data_siswa'] = $data_siswa->getSiswaWithJurusan();
        $data['sidebar_active'] = 'data_siswa';
        return view('admin/siswa/index', $data);
    }

    public function zonasi_form()
    {
        $data_jurusan = new Jurusan();

        $data['jurusan'] = $data_jurusan->findAll();
        $data['sidebar_active'] = 'data_siswa';
        return view('admin/siswa/tambah_siswa/zonasi', $data);
    }

    public function afirmasi_form()
    {
        $data_jurusan = new jurusan();

        $data['jurusan'] = $data_jurusan->findAll();
        $data['sidebar_active'] = 'data_siswa';
        return view('admin/siswa/tambah_siswa/afirmasi', $data);
    }

    public function mutasi_form()
    {
        $data_jurusan = new Jurusan();

        $data['jurusan'] = $data_jurusan->findAll();
        $data['sidebar_active'] = 'data_siswa';
        return view('admin/siswa/tambah_siswa/mutasi', $data);
    }

    public function prestasi_form()
    {
        $data_jurusan = new Jurusan();

        $data['jurusan'] = $data_jurusan->findAll();
        $data['sidebar_active'] = 'data_siswa';
        return view('admin/siswa/tambah_siswa/prestasi', $data);
    }

    public function store()
    {
        helper('form');
        $rules = [
            'tanggal_pendaftaran' => 'required',
            'nisn' => 'required|numeric',
            'nama_siswa' => 'required',
            'nik' => 'required|numeric',
            'id_jurusan' => 'required',
            'jenis_kelamin' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required',
            'agama' => 'required',
            'status_dlm_kel' => 'required',
            'alamat' => 'required',
            'rt' => 'required',
            'rw' => 'required',
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
            // Nilai Mapel
            // ipload berkas
            'foto' => 'uploaded[foto]|mime_in[foto,image/jpg,image/jpeg,image/gif,image/png]|max_size[foto,4096]',
            'kartu_keluarga' => 'uploaded[kartu_keluarga]|mime_in[kartu_keluarga,image/jpg,image/jpeg,image/gif,image/png]|max_size[kartu_keluarga,4096]',
            'scan_nisn' => 'uploaded[scan_nisn]|mime_in[scan_nisn,image/jpg,image/jpeg,image/gif,image/png]|max_size[scan_nisn,4096]',
            'rpt_smstr_1' => 'uploaded[rpt_smstr_1]|mime_in[rpt_smstr_1,image/jpg,image/jpeg,image/gif,image/png]|max_size[rpt_smstr_1,4096]',
            'rpt_smstr_2' => 'uploaded[rpt_smstr_2]|mime_in[rpt_smstr_2,image/jpg,image/jpeg,image/gif,image/png]|max_size[rpt_smstr_2,4096]',
            'rpt_smstr_3' => 'uploaded[rpt_smstr_3]|mime_in[rpt_smstr_3,image/jpg,image/jpeg,image/gif,image/png]|max_size[rpt_smstr_3,4096]',
            'rpt_smstr_4' => 'uploaded[rpt_smstr_4]|mime_in[rpt_smstr_4,image/jpg,image/jpeg,image/gif,image/png]|max_size[rpt_smstr_4,4096]',
            'rpt_smstr_5' => 'uploaded[rpt_smstr_5]|mime_in[rpt_smstr_5,image/jpg,image/jpeg,image/gif,image/png]|max_size[rpt_smstr_5,4096]',
        ];

        $rules2 = [
            'bindo_1' => 'required|numeric',
            'bindo_2' => 'required|numeric',
            'bindo_3' => 'required|numeric',
            'bindo_4' => 'required|numeric',
            'bindo_5' => 'required|numeric',
            'bing_1' => 'required|numeric',
            'bing_2' => 'required|numeric',
            'bing_3' => 'required|numeric',
            'bing_4' => 'required|numeric',
            'bing_5' => 'required|numeric',
            'mtk_1' => 'required|numeric',
            'mtk_2' => 'required|numeric',
            'mtk_3' => 'required|numeric',
            'mtk_4' => 'required|numeric',
            'mtk_5' => 'required|numeric',
            'ipa_1' => 'required|numeric',
            'ipa_2' => 'required|numeric',
            'ipa_3' => 'required|numeric',
            'ipa_4' => 'required|numeric',
            'ipa_5' => 'required|numeric',
            'ips_1' => 'required|numeric',
            'ips_2' => 'required|numeric',
            'ips_3' => 'required|numeric',
            'ips_4' => 'required|numeric',
            'ips_5' => 'required|numeric',
        ];

        if ($this->validate($rules) || $this->validate($rules2)) {

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

            // Nilai Process

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

            // End Nilai Process

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
                return redirect()->to(base_url('siswa'))->with('status', '<div class="alert alert-danger alert-dismissible" role="alert"> Terjadi Error. Silahkan Coba lagi <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>');
            }

            $upload_berkas->insertUploadBerkas($data3);

            return redirect()->to(base_url('siswa'))->with('status', '<div class="alert alert-success alert-dismissible" role="alert"> Data Siswa berhasil ditambahkan! <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>');
        } else {
            $data['validation'] = $this->validator;
            $data['sidebar_active'] = 'data_siswa';
            $role_action = $this->request->getPost('jalur');

            if ($role_action == 'zonasi') {
                return view('admin/siswa/tambah_siswa/zonasi', $data);
            } elseif ($role_action == 'mutasi') {
                return view('admin/siswa/tambah_siswa/mutasi', $data);
            } elseif ($role_action == 'afirmasi') {
                return view('admin/siswa/tambah_siswa/afirmasi', $data);
            } elseif ($role_action == 'prestasi') {
                return view('admin/siswa/tambah_siswa/prestasi', $data);
            } else {
                return view('admin/siswa/index');
            }
        }
    }

    // detail
    public function detail($id)
    {
        $data_siswa = new Data_siswa();
        $nilai_mapel = new Nilai_mapel();
        $upload_berkas = new Upload_berkas();
        $data['siswa_detail'] = $data_siswa->find($id);
        $data['berkas_detail'] = $upload_berkas->where('id_siswa', $id)->findAll();
        $data['nilai_detail'] = $nilai_mapel->where('id_siswa', $id)->findAll();
        $data['sidebar_active'] = 'data_siswa';

        return view('admin/siswa/detail_siswa', $data);
    }

    public function delete($id, $jalur)
    {
        $data_siswa = new Data_siswa();
        $upload_berkas = new Upload_berkas();
        $data = $upload_berkas->where('id_siswa', $id)->find();

        if ($jalur == 'zonasi') {
            if (!empty($data)) {
                $foto = $data[0]['foto'];
                if (file_exists("uploads/berkas_siswa/" . $foto)) {
                    unlink("uploads/berkas_siswa/" . $foto);
                }

                $kartu_keluarga = $data[0]['kartu_keluarga'];
                if (file_exists("uploads/berkas_siswa/" . $kartu_keluarga)) {
                    unlink("uploads/berkas_siswa/" . $kartu_keluarga);
                }

                $scan_nisn = $data[0]['scan_nisn'];
                if (file_exists("uploads/berkas_siswa/" . $scan_nisn)) {
                    unlink("uploads/berkas_siswa/" . $scan_nisn);
                }

                $rpt_smstr_1 = $data[0]['rpt_smstr_1'];
                if (file_exists("uploads/berkas_siswa/" . $rpt_smstr_1)) {
                    unlink("uploads/berkas_siswa/" . $rpt_smstr_1);
                }

                $rpt_smstr_2 = $data[0]['rpt_smstr_2'];
                if (file_exists("uploads/berkas_siswa/" . $rpt_smstr_2)) {
                    unlink("uploads/berkas_siswa/" . $rpt_smstr_2);
                }

                $rpt_smstr_3 = $data[0]['rpt_smstr_3'];
                if (file_exists("uploads/berkas_siswa/" . $rpt_smstr_3)) {
                    unlink("uploads/berkas_siswa/" . $rpt_smstr_3);
                }

                $rpt_smstr_4 = $data[0]['rpt_smstr_4'];
                if (file_exists("uploads/berkas_siswa/" . $rpt_smstr_4)) {
                    unlink("uploads/berkas_siswa/" . $rpt_smstr_4);
                }

                $rpt_smstr_5 = $data[0]['rpt_smstr_5'];
                if (file_exists("uploads/berkas_siswa/" . $rpt_smstr_5)) {
                    unlink("uploads/berkas_siswa/" . $rpt_smstr_5);
                }
            }
        } elseif ($jalur == 'afirmasi') {
            if (!empty($data)) {
                $foto = $data[0]['foto'];
                if (file_exists("uploads/berkas_siswa/" . $foto)) {
                    unlink("uploads/berkas_siswa/" . $foto);
                }

                $kartu_keluarga = $data[0]['kartu_keluarga'];
                if (file_exists("uploads/berkas_siswa/" . $kartu_keluarga)) {
                    unlink("uploads/berkas_siswa/" . $kartu_keluarga);
                }

                $scan_nisn = $data[0]['scan_nisn'];
                if (file_exists("uploads/berkas_siswa/" . $scan_nisn)) {
                    unlink("uploads/berkas_siswa/" . $scan_nisn);
                }

                $rpt_smstr_1 = $data[0]['rpt_smstr_1'];
                if (file_exists("uploads/berkas_siswa/" . $rpt_smstr_1)) {
                    unlink("uploads/berkas_siswa/" . $rpt_smstr_1);
                }

                $rpt_smstr_2 = $data[0]['rpt_smstr_2'];
                if (file_exists("uploads/berkas_siswa/" . $rpt_smstr_2)) {
                    unlink("uploads/berkas_siswa/" . $rpt_smstr_2);
                }

                $rpt_smstr_3 = $data[0]['rpt_smstr_3'];
                if (file_exists("uploads/berkas_siswa/" . $rpt_smstr_3)) {
                    unlink("uploads/berkas_siswa/" . $rpt_smstr_3);
                }

                $rpt_smstr_4 = $data[0]['rpt_smstr_4'];
                if (file_exists("uploads/berkas_siswa/" . $rpt_smstr_4)) {
                    unlink("uploads/berkas_siswa/" . $rpt_smstr_4);
                }

                $rpt_smstr_5 = $data[0]['rpt_smstr_5'];
                if (file_exists("uploads/berkas_siswa/" . $rpt_smstr_5)) {
                    unlink("uploads/berkas_siswa/" . $rpt_smstr_5);
                }

                $kel_kur_mampu = $data[0]['kel_kur_mampu'];
                if (file_exists("uploads/berkas_siswa/" . $kel_kur_mampu)) {
                    unlink("uploads/berkas_siswa/" . $kel_kur_mampu);
                }
            }
        } elseif ($jalur == 'mutasi') {
            if (!empty($data)) {
                $foto = $data[0]['foto'];
                if (file_exists("uploads/berkas_siswa/" . $foto)) {
                    unlink("uploads/berkas_siswa/" . $foto);
                }

                $kartu_keluarga = $data[0]['kartu_keluarga'];
                if (file_exists("uploads/berkas_siswa/" . $kartu_keluarga)) {
                    unlink("uploads/berkas_siswa/" . $kartu_keluarga);
                }

                $scan_nisn = $data[0]['scan_nisn'];
                if (file_exists("uploads/berkas_siswa/" . $scan_nisn)) {
                    unlink("uploads/berkas_siswa/" . $scan_nisn);
                }

                $rpt_smstr_1 = $data[0]['rpt_smstr_1'];
                if (file_exists("uploads/berkas_siswa/" . $rpt_smstr_1)) {
                    unlink("uploads/berkas_siswa/" . $rpt_smstr_1);
                }

                $rpt_smstr_2 = $data[0]['rpt_smstr_2'];
                if (file_exists("uploads/berkas_siswa/" . $rpt_smstr_2)) {
                    unlink("uploads/berkas_siswa/" . $rpt_smstr_2);
                }

                $rpt_smstr_3 = $data[0]['rpt_smstr_3'];
                if (file_exists("uploads/berkas_siswa/" . $rpt_smstr_3)) {
                    unlink("uploads/berkas_siswa/" . $rpt_smstr_3);
                }

                $rpt_smstr_4 = $data[0]['rpt_smstr_4'];
                if (file_exists("uploads/berkas_siswa/" . $rpt_smstr_4)) {
                    unlink("uploads/berkas_siswa/" . $rpt_smstr_4);
                }

                $rpt_smstr_5 = $data[0]['rpt_smstr_5'];
                if (file_exists("uploads/berkas_siswa/" . $rpt_smstr_5)) {
                    unlink("uploads/berkas_siswa/" . $rpt_smstr_5);
                }

                $st_ortu = $data[0]['st_ortu'];
                if (file_exists("uploads/berkas_siswa/" . $st_ortu)) {
                    unlink("uploads/berkas_siswa/" . $st_ortu);
                }
            }
        } elseif ($jalur == 'prestasi') {
            if (!empty($data)) {
                $foto = $data[0]['foto'];
                if (file_exists("uploads/berkas_siswa/" . $foto)) {
                    unlink("uploads/berkas_siswa/" . $foto);
                }

                $kartu_keluarga = $data[0]['kartu_keluarga'];
                if (file_exists("uploads/berkas_siswa/" . $kartu_keluarga)) {
                    unlink("uploads/berkas_siswa/" . $kartu_keluarga);
                }

                $scan_nisn = $data[0]['scan_nisn'];
                if (file_exists("uploads/berkas_siswa/" . $scan_nisn)) {
                    unlink("uploads/berkas_siswa/" . $scan_nisn);
                }

                $rpt_smstr_1 = $data[0]['rpt_smstr_1'];
                if (file_exists("uploads/berkas_siswa/" . $rpt_smstr_1)) {
                    unlink("uploads/berkas_siswa/" . $rpt_smstr_1);
                }

                $rpt_smstr_2 = $data[0]['rpt_smstr_2'];
                if (file_exists("uploads/berkas_siswa/" . $rpt_smstr_2)) {
                    unlink("uploads/berkas_siswa/" . $rpt_smstr_2);
                }

                $rpt_smstr_3 = $data[0]['rpt_smstr_3'];
                if (file_exists("uploads/berkas_siswa/" . $rpt_smstr_3)) {
                    unlink("uploads/berkas_siswa/" . $rpt_smstr_3);
                }

                $rpt_smstr_4 = $data[0]['rpt_smstr_4'];
                if (file_exists("uploads/berkas_siswa/" . $rpt_smstr_4)) {
                    unlink("uploads/berkas_siswa/" . $rpt_smstr_4);
                }

                $rpt_smstr_5 = $data[0]['rpt_smstr_5'];
                if (file_exists("uploads/berkas_siswa/" . $rpt_smstr_5)) {
                    unlink("uploads/berkas_siswa/" . $rpt_smstr_5);
                }

                $sertif_prestasi = $data[0]['sertif_prestasi'];
                if (file_exists("uploads/berkas_siswa/" . $sertif_prestasi)) {
                    unlink("uploads/berkas_siswa/" . $sertif_prestasi);
                }
            }
        }

        $data_siswa->delete($id);
        return redirect()->to(base_url('siswa'))->with('status', '<div class="alert alert-danger alert-dismissible" role="alert"> Data Siswa Berhasil dihapus! <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>');
    }

    public function verif($id)
    {
        $data_siswa = new Data_siswa();
        $data = $data_siswa->find($id);
        $data = [
            'verif' => 1,
        ];
        $data_siswa->update($id, $data);
        return redirect()->to(base_url('siswa'))->with('status', '<div class="alert alert-success alert-dismissible" role="alert"> Berhasil Verifikasi <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>');
    }

    public function unverif($id)
    {
        $data_siswa = new Data_siswa();
        $data = $data_siswa->find($id);
        $data = [
            'verif' => 0,
        ];
        $data_siswa->update($id, $data);
        return redirect()->to(base_url('siswa'))->with('status', '<div class="alert alert-danger alert-dismissible" role="alert"> Verifikasi dibatalkan <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>');
    }

    public function lulus($id)
    {
        $data_siswa = new Data_siswa();
        $data = $data_siswa->find($id);
        $data = [
            'status' => 1,
        ];
        $data_siswa->update($id, $data);
        return redirect()->to(base_url('siswa'))->with('status', '<div class="alert alert-primary alert-dismissible" role="alert"> Status berhasil diubah <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>');
    }

    public function tidakLulus($id)
    {
        $data_siswa = new Data_siswa();
        $data = $data_siswa->find($id);
        $data = [
            'status' => 2,
        ];
        $data_siswa->update($id, $data);
        return redirect()->to(base_url('siswa'))->with('status', '<div class="alert alert-primary alert-dismissible" role="alert"> Status berhasil diubah <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>');
    }

    public function prosesLulus($id)
    {
        $data_siswa = new Data_siswa();
        $data = $data_siswa->find($id);
        $data = [
            'status' => 0,
        ];
        $data_siswa->update($id, $data);
        return redirect()->to(base_url('siswa'))->with('status', '<div class="alert alert-primary alert-dismissible" role="alert"> Status berhasil diubah <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>');
    }

    public function cari_page()
    {
        $data['sidebar_active'] = 'cari_siswa';
        return view('admin/siswa/cari_siswa', $data);
    }

    public function cari_siswa()
    {
        helper('form');
        $rules = [
            'keyword' => 'required'
        ];

        if ($this->validate($rules)) {
            $data['sidebar_active'] = 'cari_siswa';
            $keyword = $this->request->getPost('keyword');

            $data_siswa = new Data_siswa();
            $data['hasil_cari'] = $data_siswa->cariSiswa($keyword);

            return view('admin/siswa/cari_siswa', $data);
        } else {
            $data['validation'] = $this->validator;
            $data['sidebar_active'] = 'cari_siswa';
            return view('admin/siswa/cari_siswa', $data);
        }
    }

    public function bobot_siswa()
    {

        $data['sidebar_active'] = 'bobot_siswa';
        return view('admin/siswa/bobot_siswa/index', $data);
    }

    //
    public function bobot_zonasi()
    {

        $data_siswa = new Data_siswa();
        $nilai_mapel = new Nilai_mapel();

        $siswa = $data_siswa->where('jalur', 'zonasi')->findAll();
        $theData['zonasi'] = $data_siswa->where('jalur', 'zonasi')->findAll();

        $jumlahSiswaZonasi = $data_siswa->where('jalur', 'zonasi')->countAllResults();
        $totalSemuaSiswa = $data_siswa->countAllResults();
        $persentaseZonasi = 0;

        if ($jumlahSiswaZonasi == 0 && $totalSemuaSiswa == 0) {
            $persentaseZonasi = 0;
        } else {
            $persentaseZonasi = ($jumlahSiswaZonasi / $totalSemuaSiswa) * 100;
        }

        $data = [];

        foreach ($siswa as $row) {
            $nilai = $nilai_mapel->getNilaiBySiswaId($row['id']);

            $bindo = 0;
            $bing = 0;
            $mtk = 0;
            $ipa = 0;
            $ips = 0;
            $bobot_hasil = 0;

            foreach ($nilai as $item) {
                $bindo = $item['bobot_bindo'];
                $bing = $item['bobot_bing'];
                $mtk = $item['bobot_mtk'];
                $ipa = $item['bobot_ipa'];
                $ips = $item['bobot_ips'];
                $bobot_hasil = $item['bobot_hasil'];
            }

            $data[] = [
                'id' => $row['id'],
                'nisn' => $row['nisn'],
                'nama_siswa' => $row['nama_siswa'],
                'bindo' => $bindo,
                'bing' => $bing,
                'mtk' => $mtk,
                'ipa' => $ipa,
                'ips' => $ips,
                'bobot_hasil' => $bobot_hasil,
                'persentase' => $persentaseZonasi,
            ];
        }

        $sidebar['sidebar_active'] = 'bobot_siswa';
        return view('admin/siswa/bobot_siswa/bobot_zonasi', array_merge($theData, $sidebar, ['data' => $data]));
    }

    public function bobot_afirmasi()
    {
        $data_siswa = new Data_siswa();
        $nilai_mapel = new Nilai_mapel();
        $upload_berkas = new Upload_berkas();

        $siswa = $data_siswa->where('jalur', 'afirmasi')->findAll();
        $theData['afirmasi'] = $data_siswa->where('jalur', 'afirmasi')->findAll();

        $jumlahSiswaAfirmasi = $data_siswa->where('jalur', 'afirmasi')->countAllResults();
        $totalSemuaSiswa = $data_siswa->countAllResults();
        $persentaseAfirmasi = 0;

        if ($jumlahSiswaAfirmasi == 0 && $totalSemuaSiswa == 0) {
            $persentaseAfirmasi = 0;
        } else {
            $persentaseAfirmasi = ($jumlahSiswaAfirmasi / $totalSemuaSiswa) * 100;
        }

        $data = [];

        foreach ($siswa as $row) {
            $nilai = $nilai_mapel->getNilaiBySiswaId($row['id']);
            $berkas = $upload_berkas->getBerkasById($row['id']);

            $bobot_hasil = 0;
            $nama_berkas = '';

            foreach ($nilai as $item) {
                $bobot_hasil = $item['bobot_hasil'];
            }

            foreach ($berkas as $p) {
                $nama_berkas = $p['kel_kur_mampu'];
            }

            $data[] = [
                'id' => $row['id'],
                'nisn' => $row['nisn'],
                'nama_siswa' => $row['nama_siswa'],
                'bobot_hasil' => $bobot_hasil,
                'berkas' => $nama_berkas,
                'persentase' => $persentaseAfirmasi
            ];
        }

        $sidebar['sidebar_active'] = 'bobot_siswa';
        return view('admin/siswa/bobot_siswa/bobot_afirmasi', array_merge($theData, $sidebar, ['data' => $data]));
    }

    public function bobot_mutasi()
    {
        $data_siswa = new Data_siswa();
        $nilai_mapel = new Nilai_mapel();
        $upload_berkas = new Upload_berkas();

        $siswa = $data_siswa->where('jalur', 'mutasi')->findAll();
        $theData['mutasi'] = $data_siswa->where('jalur', 'mutasi')->findAll();

        $jumlahSiswaMutasi = $data_siswa->where('jalur', 'mutasi')->countAllResults();
        $totalSemuaSiswa = $data_siswa->countAllResults();
        $persentaseMutasi = 0;

        if ($jumlahSiswaMutasi == 0 && $totalSemuaSiswa == 0) {
            $persentaseMutasi = 0;
        } else {
            $persentaseMutasi = ($jumlahSiswaMutasi / $totalSemuaSiswa) * 100;
        }

        $data = [];

        foreach ($siswa as $row) {
            $nilai = $nilai_mapel->getNilaiBySiswaId($row['id']);
            $berkas = $upload_berkas->getBerkasById($row['id']);

            $bindo = 0;
            $bing = 0;
            $mtk = 0;
            $ipa = 0;
            $ips = 0;
            $bobot_hasil = 0;
            $nama_berkas = '';

            foreach ($nilai as $item) {
                $bindo = $item['bobot_bindo'];
                $bing = $item['bobot_bing'];
                $mtk = $item['bobot_mtk'];
                $ipa = $item['bobot_ipa'];
                $ips = $item['bobot_ips'];
                $bobot_hasil = $item['bobot_hasil'];
            }

            foreach ($berkas as $p) {
                $nama_berkas = $p['st_ortu'];
            }

            $data[] = [
                'id' => $row['id'],
                'nisn' => $row['nisn'],
                'nama_siswa' => $row['nama_siswa'],
                'bindo' => $bindo,
                'bing' => $bing,
                'mtk' => $mtk,
                'ipa' => $ipa,
                'ips' => $ips,
                'bobot_hasil' => $bobot_hasil,
                'berkas' => $nama_berkas,
                'persentase' => $persentaseMutasi
            ];
        }

        $sidebar['sidebar_active'] = 'bobot_siswa';
        return view('admin/siswa/bobot_siswa/bobot_mutasi', array_merge($theData, $sidebar, ['data' => $data]));
    }

    public function bobot_prestasi()
    {
        $data_siswa = new Data_siswa();
        $nilai_mapel = new Nilai_mapel();
        $upload_berkas = new Upload_berkas();
        $nilaiSertif = new NilaiSertif();

        $siswa = $data_siswa->where('jalur', 'prestasi')->findAll();
        $theData['prestasi'] = $data_siswa->where('jalur', 'prestasi')->findAll();

        $jumlahSiswaPrestasi = $data_siswa->where('jalur', 'prestasi')->countAllResults();
        $totalSemuaSiswa = $data_siswa->countAllResults();
        $persentasePrestasi = 0;

        if ($jumlahSiswaPrestasi == 0 && $totalSemuaSiswa == 0) {
            $persentasePrestasi = 0;
        } else {
            $persentasePrestasi = ($jumlahSiswaPrestasi / $totalSemuaSiswa) * 100;
        }

        $data = [];

        foreach ($siswa as $row) {
            $nilai = $nilai_mapel->getNilaiBySiswaId($row['id']);
            $nsertif = $nilaiSertif->getNSertifBySiswaId($row['id']);
            $berkas = $upload_berkas->where('id_siswa', $row['id'])->find();

            $bindo = 0;
            $bing = 0;
            $mtk = 0;
            $ipa = 0;
            $ips = 0;
            $bobot_hasil = 0;
            $nilai_sertif = 0;
            $BTHSL = 0;
            $berkas_sertif = '';

            foreach ($nilai as $item) {
                $bindo = $item['bobot_bindo'];
                $bing = $item['bobot_bing'];
                $mtk = $item['bobot_mtk'];
                $ipa = $item['bobot_ipa'];
                $ips = $item['bobot_ips'];
                $bobot_hasil = $item['bobot_hasil'];
            }

            foreach ($berkas as $b) {
                $berkas_sertif = $b['sertif_prestasi'];
            }

            foreach ($nsertif as $ns) {
                $nilai_sertif = $ns['nilai'];
            }

            if ($nilai_sertif == 0) {
                $BTHSL = $bobot_hasil;
            } else {
                $hitBobotHasil = $bindo + $bing + $mtk + $ipa + $ips + $nilai_sertif;
                $BTHSL = $hitBobotHasil / 6;
            }

            $data[] = [
                'id' => $row['id'],
                'nisn' => $row['nisn'],
                'nama_siswa' => $row['nama_siswa'],
                'bindo' => $bindo,
                'bing' => $bing,
                'mtk' => $mtk,
                'ipa' => $ipa,
                'ips' => $ips,
                'bobot_hasil' => number_format($BTHSL, 2),
                'nilai_sertif' => $nilai_sertif,
                'berkas_sertif' => $berkas_sertif,
                'persentase' => $persentasePrestasi
            ];
        }

        $sidebar['sidebar_active'] = 'bobot_siswa';
        return view('admin/siswa/bobot_siswa/bobot_prestasi', array_merge($theData, $sidebar, ['data' => $data]));
    }

    public function store_nilai_sertif($idSiswa)
    {
        $nilaiSertif = new NilaiSertif();

        $data = [
            'id_siswa' => $idSiswa,
            'nilai' => $this->request->getPost('nilai'),
        ];

        $nilaiSertif->save($data);
        return redirect()->to(base_url('siswa-bobot-prestasi'))->with('status', '<div class="alert alert-success alert-dismissible" role="alert"> Nilai berhasil ditambahkan! <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>');
    }

    public function hapus_nilai_sertif($idSiswa)
    {
        $nilaiSertif = new NilaiSertif();
        $nilaiSertif->where('id_siswa', $idSiswa)->delete();
        return redirect()->to(base_url('siswa-bobot-prestasi'))->with('status', '<div class="alert alert-danger alert-dismissible" role="alert"> Nilai berhasil dihapus! <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>');
    }

    public function detail_bobot($id)
    {
        $data_siswa = new Data_siswa();
        $nilai_mapel = new Nilai_mapel();
        $upload_berkas = new Upload_berkas();
        $nilaiSertif = new NilaiSertif();
        $data['siswa_detail'] = $data_siswa->find($id);
        $data['berkas_detail'] = $upload_berkas->where('id_siswa', $id)->findAll();
        $data['nilai_detail'] = $nilai_mapel->where('id_siswa', $id)->findAll();
        $data['sidebar_active'] = 'bobot_siswa';

        $bindoBBT = 0;
        $bingBBT = 0;
        $mtkBBT = 0;
        $ipaBBT = 0;
        $ipsBBT = 0;
        $hasilBBT = 0;
        $nilai_sertif = 0;
        $BTHSL = 0;

        $nsertif = $nilaiSertif->getNSertifBySiswaId($id);

        foreach ($data['nilai_detail'] as $ns) {
            $bindoBBT = $ns['bobot_bindo'];
            $bingBBT = $ns['bobot_bing'];
            $mtkBBT = $ns['bobot_mtk'];
            $ipaBBT = $ns['bobot_ipa'];
            $ipsBBT = $ns['bobot_ips'];
            $hasilBBT = $ns['bobot_hasil'];
        }

        foreach ($nsertif as $ns) {
            $nilai_sertif = $ns['nilai'];
        }

        if ($nilai_sertif == 0) {
            if ($hasilBBT == '-') {
                $BTHSL = 0;
            } else {
                $BTHSL = $hasilBBT;
            }
        } else {
            $hitBobotHasil = $bindoBBT + $bingBBT + $mtkBBT + $ipaBBT + $ipsBBT + $nilai_sertif;
            $BTHSL = $hitBobotHasil / 6;
        }

        $data['final_bobot'] = number_format($BTHSL, 2);

        return view('admin/siswa/bobot_siswa/detail_bobot', $data);
    }

    public function download_berkas($id, $field)
    {
        $upload_berkas = new Upload_berkas();
        $gambar = $upload_berkas->find($id);

        $filename = $gambar[$field];

        return $this->response->download('uploads/berkas_siswa/' . $filename, null);
    }

    public function view_berkas($id, $field)
    {
        $upload_berkas = new Upload_berkas();
        $gambar = $upload_berkas->find($id);

        $filename = $gambar[$field];

        $file = 'uploads/berkas_siswa/' . $filename;

        $mime = mime_content_type($file);

        $image = file_get_contents($file);

        $dataUri = 'data:' . $mime . ';base64,' . base64_encode($image);

        return view('admin/siswa/view_berkas', ['dataUri' => $dataUri]);
    }

    public function exportExcel()
    {
        $data_siswa = new Data_siswa();
        $siswa = $data_siswa->getSiswaWithJurusan();

        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        $sheet->setCellValue('A1', 'No')->getStyle('A1')->getFont()->setBold(true);
        $sheet->setCellValue('B1', 'Nama')->getStyle('B1')->getFont()->setBold(true);
        $sheet->setCellValue('C1', 'NISN')->getStyle('C1')->getFont()->setBold(true);
        $sheet->setCellValue('D1', 'NIK')->getStyle('D1')->getFont()->setBold(true);
        $sheet->setCellValue('E1', 'Tanggal Pendaftaran')->getStyle('E1')->getFont()->setBold(true);
        $sheet->setCellValue('F1', 'Jenis Kelamin')->getStyle('F1')->getFont()->setBold(true);
        $sheet->setCellValue('G1', 'Jurusan')->getStyle('G1')->getFont()->setBold(true);
        $sheet->setCellValue('H1', 'Tempat Lahir')->getStyle('H1')->getFont()->setBold(true);
        $sheet->setCellValue('I1', 'Tanggal Lahir')->getStyle('I1')->getFont()->setBold(true);
        $sheet->setCellValue('J1', 'Agama')->getStyle('J1')->getFont()->setBold(true);
        $sheet->setCellValue('K1', 'Status Dalam Keluarga')->getStyle('K1')->getFont()->setBold(true);
        $sheet->setCellValue('L1', 'Alamat')->getStyle('L1')->getFont()->setBold(true);
        $sheet->setCellValue('M1', 'RT')->getStyle('M1')->getFont()->setBold(true);
        $sheet->setCellValue('N1', 'RW')->getStyle('N1')->getFont()->setBold(true);
        $sheet->setCellValue('O1', 'Kelurahan')->getStyle('O1')->getFont()->setBold(true);
        $sheet->setCellValue('P1', 'Kecamatan')->getStyle('P1')->getFont()->setBold(true);
        $sheet->setCellValue('Q1', 'Kabupaten/Kota')->getStyle('Q1')->getFont()->setBold(true);
        $sheet->setCellValue('R1', 'Provinsi')->getStyle('R1')->getFont()->setBold(true);
        $sheet->setCellValue('S1', 'No HP')->getStyle('S1')->getFont()->setBold(true);
        $sheet->setCellValue('T1', 'Nama Ayah')->getStyle('T1')->getFont()->setBold(true);
        $sheet->setCellValue('U1', 'NIK Ayah')->getStyle('U1')->getFont()->setBold(true);
        $sheet->setCellValue('V1', 'Nama Ibu')->getStyle('V1')->getFont()->setBold(true);
        $sheet->setCellValue('W1', 'NIK Ibu')->getStyle('W1')->getFont()->setBold(true);
        $sheet->setCellValue('X1', 'No Hp Ayah/Ibu')->getStyle('X1')->getFont()->setBold(true);
        $sheet->setCellValue('Y1', 'Jalur')->getStyle('Y1')->getFont()->setBold(true);

        // Set format teks menjadi center pada header
        $headerStyle = $sheet->getStyle('A1:Y1');
        $headerStyle->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
        $headerStyle->getAlignment()->setVertical(Alignment::VERTICAL_CENTER);
        $headerStyle->getFont()->setBold(true);



        // Set garis pada header
        $headerStyle->getBorders()->getAllBorders()->setBorderStyle(Border::BORDER_THIN);

        $row = 2;
        $n = 1;
        foreach ($siswa as $data) {
            $sheet->setCellValue('A' . $row, $n);
            $sheet->setCellValue('B' . $row, $data['nama_siswa']);
            $sheet->setCellValue('C' . $row, $data['nisn']);
            $sheet->setCellValue('D' . $row, $data['nik']);
            $sheet->setCellValue('E' . $row, $data['tanggal_pendaftaran']);
            $sheet->setCellValue('F' . $row, $data['jenis_kelamin']);
            $sheet->setCellValue('G' . $row, $data['jurusan']);
            $sheet->setCellValue('H' . $row, $data['tempat_lahir']);
            $sheet->setCellValue('I' . $row, $data['tanggal_lahir']);
            $sheet->setCellValue('J' . $row, $data['agama']);
            $sheet->setCellValue('K' . $row, $data['status_dlm_kel']);
            $sheet->setCellValue('L' . $row, $data['alamat']);
            $sheet->setCellValue('M' . $row, $data['rt']);
            $sheet->setCellValue('N' . $row, $data['rw']);
            $sheet->setCellValue('O' . $row, $data['kelurahan']);
            $sheet->setCellValue('P' . $row, $data['kecamatan']);
            $sheet->setCellValue('Q' . $row, $data['kab_kota']);
            $sheet->setCellValue('R' . $row, $data['provinsi']);
            $sheet->setCellValue('S' . $row, $data['nohp_siswa']);
            $sheet->setCellValue('T' . $row, $data['nama_ayah']);
            $sheet->setCellValue('U' . $row, $data['nik_ayah']);
            $sheet->setCellValue('V' . $row, $data['nama_ibu']);
            $sheet->setCellValue('W' . $row, $data['nik_ibu']);
            $sheet->setCellValue('X' . $row, $data['nohp_ortu']);
            $sheet->setCellValue('Y' . $row, $data['jalur']);

            // Atur wrap text pada kolom L (Alamat)
            $sheet->getStyle('A' . $row)->getAlignment()->setWrapText(true);
            $sheet->getStyle('B' . $row)->getAlignment()->setWrapText(true);
            $sheet->getStyle('C' . $row)->getAlignment()->setWrapText(true);
            $sheet->getStyle('D' . $row)->getAlignment()->setWrapText(true);
            $sheet->getStyle('E' . $row)->getAlignment()->setWrapText(true);
            $sheet->getStyle('F' . $row)->getAlignment()->setWrapText(true);
            $sheet->getStyle('G' . $row)->getAlignment()->setWrapText(true);
            $sheet->getStyle('H' . $row)->getAlignment()->setWrapText(true);
            $sheet->getStyle('I' . $row)->getAlignment()->setWrapText(true);
            $sheet->getStyle('J' . $row)->getAlignment()->setWrapText(true);
            $sheet->getStyle('K' . $row)->getAlignment()->setWrapText(true);
            $sheet->getStyle('L' . $row)->getAlignment()->setWrapText(true);
            $sheet->getStyle('M' . $row)->getAlignment()->setWrapText(true);
            $sheet->getStyle('N' . $row)->getAlignment()->setWrapText(true);
            $sheet->getStyle('O' . $row)->getAlignment()->setWrapText(true);
            $sheet->getStyle('P' . $row)->getAlignment()->setWrapText(true);
            $sheet->getStyle('Q' . $row)->getAlignment()->setWrapText(true);
            $sheet->getStyle('R' . $row)->getAlignment()->setWrapText(true);
            $sheet->getStyle('S' . $row)->getAlignment()->setWrapText(true);
            $sheet->getStyle('T' . $row)->getAlignment()->setWrapText(true);
            $sheet->getStyle('U' . $row)->getAlignment()->setWrapText(true);
            $sheet->getStyle('V' . $row)->getAlignment()->setWrapText(true);
            $sheet->getStyle('W' . $row)->getAlignment()->setWrapText(true);
            $sheet->getStyle('X' . $row)->getAlignment()->setWrapText(true);
            $sheet->getStyle('Y' . $row)->getAlignment()->setWrapText(true);

            // Atur tinggi baris sesuai dengan isi sel
            $sheet->getRowDimension($row)->setRowHeight(-1);
            $sheet->getColumnDimension('A')->setWidth(18);
            $sheet->getColumnDimension('B')->setWidth(18);
            $sheet->getColumnDimension('C')->setWidth(18);
            $sheet->getColumnDimension('D')->setWidth(18);
            $sheet->getColumnDimension('E')->setWidth(25);
            $sheet->getColumnDimension('F')->setWidth(18);
            $sheet->getColumnDimension('G')->setWidth(18);
            $sheet->getColumnDimension('H')->setWidth(18);
            $sheet->getColumnDimension('I')->setWidth(18);
            $sheet->getColumnDimension('J')->setWidth(18);
            $sheet->getColumnDimension('K')->setWidth(25);
            $sheet->getColumnDimension('L')->setWidth(40);
            $sheet->getColumnDimension('M')->setWidth(18);
            $sheet->getColumnDimension('N')->setWidth(18);
            $sheet->getColumnDimension('O')->setWidth(18);
            $sheet->getColumnDimension('P')->setWidth(18);
            $sheet->getColumnDimension('Q')->setWidth(18);
            $sheet->getColumnDimension('R')->setWidth(18);
            $sheet->getColumnDimension('S')->setWidth(18);
            $sheet->getColumnDimension('T')->setWidth(18);
            $sheet->getColumnDimension('U')->setWidth(18);
            $sheet->getColumnDimension('V')->setWidth(18);
            $sheet->getColumnDimension('W')->setWidth(18);
            $sheet->getColumnDimension('X')->setWidth(18);
            $sheet->getColumnDimension('Y')->setWidth(18);

            $row++;
            $n++;
        }

        // Set format teks menjadi center pada data
        $dataStyle = $sheet->getStyle('A2:Y' . ($row - 1));
        $dataStyle->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
        $dataStyle->getAlignment()->setVertical(Alignment::VERTICAL_CENTER);

        // Set garis pada seluruh data
        $dataStyle->getBorders()->getAllBorders()->setBorderStyle(Border::BORDER_THIN);

        // Tambahkan border vertical
        for ($col = 'A'; $col != 'Y'; ++$col) {
            $sheet->getStyle($col . '1:' . $col . ($row - 1))->getBorders()->getVertical()->setBorderStyle(Border::BORDER_THIN);
        }

        $writer = new Xlsx($spreadsheet);

        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="data_siswa.xlsx"');
        header('Cache-Control: max-age=0');

        $writer->save('php://output');
    }

    public function export_zonasi()
    {
        $data_siswa = new Data_siswa();
        $nilai_mapel = new Nilai_mapel();

        $siswa = $data_siswa->where('jalur', 'zonasi')->findAll();

        $jumlahSiswaZonasi = $data_siswa->where('jalur', 'zonasi')->countAllResults();
        $totalSemuaSiswa = $data_siswa->countAllResults();
        $persentaseZonasi = 0;

        if ($jumlahSiswaZonasi == 0 && $totalSemuaSiswa == 0) {
            $persentaseZonasi = 0;
        } else {
            $persentaseZonasi = ($jumlahSiswaZonasi / $totalSemuaSiswa) * 100;
        }

        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        $sheet->setCellValue('A1', 'No')->getStyle('A1')->getFont()->setBold(true);
        $sheet->setCellValue('B1', 'NISN')->getStyle('B1')->getFont()->setBold(true);
        $sheet->setCellValue('C1', 'Nama Siswa')->getStyle('C1')->getFont()->setBold(true);
        $sheet->setCellValue('D1', 'Bahasa Indonesia')->getStyle('D1')->getFont()->setBold(true);
        $sheet->setCellValue('E1', 'Bahasa Inggris')->getStyle('E1')->getFont()->setBold(true);
        $sheet->setCellValue('F1', 'Matematika')->getStyle('F1')->getFont()->setBold(true);
        $sheet->setCellValue('G1', 'IPA')->getStyle('G1')->getFont()->setBold(true);
        $sheet->setCellValue('H1', 'IPS')->getStyle('H1')->getFont()->setBold(true);
        $sheet->setCellValue('I1', 'Bobot Hasil')->getStyle('I1')->getFont()->setBold(true);
        $sheet->setCellValue('J1', 'Persentase Zonasi')->getStyle('J1')->getFont()->setBold(true);

        // Set format teks menjadi center pada header
        $headerStyle = $sheet->getStyle('A1:J1');
        $headerStyle->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
        $headerStyle->getAlignment()->setVertical(Alignment::VERTICAL_CENTER);
        $headerStyle->getFont()->setBold(true);

        // Set garis pada header
        $headerStyle->getBorders()->getAllBorders()->setBorderStyle(Border::BORDER_THIN);

        $row = 2;
        $n = 1;

        foreach ($siswa as $rowIndex => $rowData) {
            $nilai = $nilai_mapel->getNilaiBySiswaId($rowData['id']);

            $bindo = 0;
            $bing = 0;
            $mtk = 0;
            $ipa = 0;
            $ips = 0;
            $bobot_hasil = 0;

            foreach ($nilai as $item) {
                $bindo = $item['bobot_bindo'];
                $bing = $item['bobot_bing'];
                $mtk = $item['bobot_mtk'];
                $ipa = $item['bobot_ipa'];
                $ips = $item['bobot_ips'];
                $bobot_hasil = $item['bobot_hasil'];
            }

            $sheet->setCellValue('A' . $row, $n);
            $sheet->setCellValue('B' . $row, $rowData['nisn']);
            $sheet->setCellValue('C' . $row, $rowData['nama_siswa']);
            $sheet->setCellValue('D' . $row, $bindo);
            $sheet->setCellValue('E' . $row, $bing);
            $sheet->setCellValue('F' . $row, $mtk);
            $sheet->setCellValue('G' . $row, $ipa);
            $sheet->setCellValue('H' . $row, $ips);
            $sheet->setCellValue('I' . $row, $bobot_hasil);
            $sheet->setCellValue('J' . $row, $persentaseZonasi . '%');

            $sheet->getRowDimension($row)->setRowHeight(-1);
            $sheet->getColumnDimension('A')->setWidth(18);
            $sheet->getColumnDimension('B')->setWidth(18);
            $sheet->getColumnDimension('C')->setWidth(18);
            $sheet->getColumnDimension('D')->setWidth(18);
            $sheet->getColumnDimension('E')->setWidth(18);
            $sheet->getColumnDimension('F')->setWidth(18);
            $sheet->getColumnDimension('G')->setWidth(18);
            $sheet->getColumnDimension('H')->setWidth(18);
            $sheet->getColumnDimension('I')->setWidth(18);
            $sheet->getColumnDimension('J')->setWidth(18);

            $row++;
            $n++;
        }

        // Set format teks menjadi center pada data
        $dataStyle = $sheet->getStyle('A2:J' . ($row - 1));
        $dataStyle->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
        $dataStyle->getAlignment()->setVertical(Alignment::VERTICAL_CENTER);

        // Set garis pada seluruh data
        $dataStyle->getBorders()->getAllBorders()->setBorderStyle(Border::BORDER_THIN);

        // Tambahkan border vertical
        for ($col = 'A'; $col != 'K'; ++$col) {
            $sheet->getStyle($col . '1:' . $col . ($row - 1))->getBorders()->getVertical()->setBorderStyle(Border::BORDER_THIN);
        }

        $writer = new Xlsx($spreadsheet);

        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="bobot_zonasi.xlsx"');
        header('Cache-Control: max-age=0');

        $writer->save('php://output');
    }

    public function export_afirmasi()
    {
        $data_siswa = new Data_siswa();
        $nilai_mapel = new Nilai_mapel();
        $upload_berkas = new Upload_berkas();

        $siswa = $data_siswa->where('jalur', 'afirmasi')->findAll();

        $jumlahSiswaAfirmasi = $data_siswa->where('jalur', 'afirmasi')->countAllResults();
        $totalSemuaSiswa = $data_siswa->countAllResults();
        $persentaseAfirmasi = 0;

        if ($jumlahSiswaAfirmasi == 0 && $totalSemuaSiswa == 0) {
            $persentaseAfirmasi = 0;
        } else {
            $persentaseAfirmasi = ($jumlahSiswaAfirmasi / $totalSemuaSiswa) * 100;
        }

        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        $sheet->setCellValue('A1', 'No')->getStyle('A1')->getFont()->setBold(true);
        $sheet->setCellValue('B1', 'NISN')->getStyle('B1')->getFont()->setBold(true);
        $sheet->setCellValue('C1', 'Nama Siswa')->getStyle('C1')->getFont()->setBold(true);
        $sheet->setCellValue('D1', 'Bobot Hasil')->getStyle('D1')->getFont()->setBold(true);
        $sheet->setCellValue('E1', 'Persentase Afirmasi')->getStyle('F1')->getFont()->setBold(true);

        $row = 2;
        $n = 0; // Inisialisasi variabel $n dengan nilai 0
        foreach ($siswa as $siswaRow) {
            $n++; // Tingkatkan nilai variabel $n setiap perulangan
            $nilai = $nilai_mapel->getNilaiBySiswaId($siswaRow['id']);
            $berkas = $upload_berkas->getBerkasById($siswaRow['id']);

            $bobot_hasil = 0;
            $nama_berkas = '';

            foreach ($nilai as $item) {
                $bobot_hasil = $item['bobot_hasil'];
            }

            foreach ($berkas as $p) {
                $nama_berkas = $p['kel_kur_mampu'];
            }

            $sheet->setCellValue('A' . $row, $n);
            $sheet->setCellValue('B' . $row, $siswaRow['nisn']);
            $sheet->setCellValue('C' . $row, $siswaRow['nama_siswa']);
            $sheet->setCellValue('D' . $row, $bobot_hasil);
            $sheet->setCellValue('E' . $row, $persentaseAfirmasi . '%');

            $row++;

            // Set tinggi baris menjadi auto
            $sheet->getRowDimension($row - 1)->setRowHeight(-1);
        }

        // Set format teks menjadi center pada header
        $headerStyle = $sheet->getStyle('A1:E1');
        $headerStyle->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
        $headerStyle->getAlignment()->setVertical(Alignment::VERTICAL_CENTER);
        $headerStyle->getFont()->setBold(true);

        // Set garis pada header
        $headerStyle->getBorders()->getAllBorders()->setBorderStyle(Border::BORDER_THIN);

        // Set format teks menjadi center pada data
        $dataStyle = $sheet->getStyle('A2:E' . ($row - 1));
        $dataStyle->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
        $dataStyle->getAlignment()->setVertical(Alignment::VERTICAL_CENTER);

        // Set garis pada seluruh data
        $dataStyle->getBorders()->getAllBorders()->setBorderStyle(Border::BORDER_THIN);

        // Set lebar kolom
        for ($col = 'A'; $col != 'G'; ++$col) {
            $sheet->getColumnDimension($col)->setWidth(18);
        }

        $writer = new Xlsx($spreadsheet);

        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="bobot_afirmasi.xlsx"');
        header('Cache-Control: max-age=0');

        $writer->save('php://output');
    }

    public function export_mutasi()
    {
        $data_siswa = new Data_siswa();
        $nilai_mapel = new Nilai_mapel();
        $upload_berkas = new Upload_berkas();

        $siswa = $data_siswa->where('jalur', 'mutasi')->findAll();

        $jumlahSiswaMutasi = $data_siswa->where('jalur', 'mutasi')->countAllResults();
        $totalSemuaSiswa = $data_siswa->countAllResults();
        $persentaseMutasi = 0;

        if ($jumlahSiswaMutasi == 0 && $totalSemuaSiswa == 0) {
            $persentaseMutasi = 0;
        } else {
            $persentaseMutasi = ($jumlahSiswaMutasi / $totalSemuaSiswa) * 100;
        }

        $data = [];

        foreach ($siswa as $row) {
            $nilai = $nilai_mapel->getNilaiBySiswaId($row['id']);
            $berkas = $upload_berkas->getBerkasById($row['id']);

            $bindo = 0;
            $bing = 0;
            $mtk = 0;
            $ipa = 0;
            $ips = 0;
            $bobot_hasil = 0;
            $nama_berkas = '';

            foreach ($nilai as $item) {
                $bindo = $item['bobot_bindo'];
                $bing = $item['bobot_bing'];
                $mtk = $item['bobot_mtk'];
                $ipa = $item['bobot_ipa'];
                $ips = $item['bobot_ips'];
                $bobot_hasil = $item['bobot_hasil'];
            }

            foreach ($berkas as $p) {
                $nama_berkas = $p['st_ortu'];
            }

            $data[] = [
                'id' => $row['id'],
                'nisn' => $row['nisn'],
                'nama_siswa' => $row['nama_siswa'],
                'bindo' => $bindo,
                'bing' => $bing,
                'mtk' => $mtk,
                'ipa' => $ipa,
                'ips' => $ips,
                'bobot_hasil' => $bobot_hasil,
                'berkas' => $nama_berkas,
                'persentase' => $persentaseMutasi
            ];
        }

        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        $sheet->setCellValue('A1', 'No')->getStyle('A1')->getFont()->setBold(true);
        $sheet->setCellValue('B1', 'NISN')->getStyle('B1')->getFont()->setBold(true);
        $sheet->setCellValue('C1', 'Nama Siswa')->getStyle('C1')->getFont()->setBold(true);
        $sheet->setCellValue('D1', 'Bahasa Indonesia')->getStyle('D1')->getFont()->setBold(true);
        $sheet->setCellValue('E1', 'Bahasa Inggris')->getStyle('E1')->getFont()->setBold(true);
        $sheet->setCellValue('F1', 'Matematika')->getStyle('F1')->getFont()->setBold(true);
        $sheet->setCellValue('G1', 'IPA')->getStyle('G1')->getFont()->setBold(true);
        $sheet->setCellValue('H1', 'IPS')->getStyle('H1')->getFont()->setBold(true);
        $sheet->setCellValue('I1', 'Bobot Hasil')->getStyle('I1')->getFont()->setBold(true);
        $sheet->setCellValue('J1', 'Persentase')->getStyle('K1')->getFont()->setBold(true);

        $row = 2;
        $n = 1;
        foreach ($data as $item) {
            $sheet->setCellValue('A' . $row, $n);
            $sheet->setCellValue('B' . $row, $item['nisn']);
            $sheet->setCellValue('C' . $row, $item['nama_siswa']);
            $sheet->setCellValue('D' . $row, $item['bindo']);
            $sheet->setCellValue('E' . $row, $item['bing']);
            $sheet->setCellValue('F' . $row, $item['mtk']);
            $sheet->setCellValue('G' . $row, $item['ipa']);
            $sheet->setCellValue('H' . $row, $item['ips']);
            $sheet->setCellValue('I' . $row, $item['bobot_hasil']);
            $sheet->setCellValue('J' . $row, $item['persentase'] . '%');
            $row++;
            $n++;
        }

        $headerStyle = $sheet->getStyle('A1:J1');
        $headerStyle->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
        $headerStyle->getAlignment()->setVertical(Alignment::VERTICAL_CENTER);
        $headerStyle->getFont()->setBold(true);
        $headerStyle->getBorders()->getAllBorders()->setBorderStyle(Border::BORDER_THIN);

        $dataStyle = $sheet->getStyle('A2:J' . ($row - 1));
        $dataStyle->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
        $dataStyle->getAlignment()->setVertical(Alignment::VERTICAL_CENTER);
        $dataStyle->getBorders()->getAllBorders()->setBorderStyle(Border::BORDER_THIN);

        for ($col = 'A'; $col != 'L'; ++$col) {
            $sheet->getColumnDimension($col)->setWidth(18);
        }

        for ($rowIndex = 1; $rowIndex <= $row; $rowIndex++) {
            $sheet->getRowDimension($rowIndex)->setRowHeight(-1);
        }

        $writer = new Xlsx($spreadsheet);

        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="bobot_mutasi.xlsx"');
        header('Cache-Control: max-age=0');

        $writer->save('php://output');
    }

    public function export_prestasi()
    {
        $data_siswa = new Data_siswa();
        $nilai_mapel = new Nilai_mapel();
        $upload_berkas = new Upload_berkas();
        $nilaiSertif = new NilaiSertif();

        $siswa = $data_siswa->where('jalur', 'prestasi')->findAll();

        $jumlahSiswaPrestasi = $data_siswa->where('jalur', 'prestasi')->countAllResults();
        $totalSemuaSiswa = $data_siswa->countAllResults();
        $persentasePrestasi = 0;

        if ($jumlahSiswaPrestasi == 0 && $totalSemuaSiswa == 0) {
            $persentasePrestasi = 0;
        } else {
            $persentasePrestasi = ($jumlahSiswaPrestasi / $totalSemuaSiswa) * 100;
        }

        $data = [];

        foreach ($siswa as $row) {
            $nilai = $nilai_mapel->getNilaiBySiswaId($row['id']);
            $nsertif = $nilaiSertif->getNSertifBySiswaId($row['id']);
            $berkas = $upload_berkas->where('id_siswa', $row['id'])->find();

            $bindo = 0;
            $bing = 0;
            $mtk = 0;
            $ipa = 0;
            $ips = 0;
            $bobot_hasil = 0;
            $nilai_sertif = 0;
            $BTHSL = 0;
            $berkas_sertif = '';

            foreach ($nilai as $item) {
                $bindo = $item['bobot_bindo'];
                $bing = $item['bobot_bing'];
                $mtk = $item['bobot_mtk'];
                $ipa = $item['bobot_ipa'];
                $ips = $item['bobot_ips'];
                $bobot_hasil = $item['bobot_hasil'];
            }

            foreach ($berkas as $b) {
                $berkas_sertif = $b['sertif_prestasi'];
            }

            foreach ($nsertif as $ns) {
                $nilai_sertif = $ns['nilai'];
            }

            if ($nilai_sertif == 0) {
                $BTHSL = $bobot_hasil;
            } else {
                $hitBobotHasil = $bindo + $bing + $mtk + $ipa + $ips + $nilai_sertif;
                $BTHSL = $hitBobotHasil / 6;
            }

            $data[] = [
                'id' => $row['id'],
                'nisn' => $row['nisn'],
                'nama_siswa' => $row['nama_siswa'],
                'bindo' => $bindo,
                'bing' => $bing,
                'mtk' => $mtk,
                'ipa' => $ipa,
                'ips' => $ips,
                'bobot_hasil' => number_format($BTHSL, 2),
                'nilai_sertif' => $nilai_sertif,
                'berkas_sertif' => $berkas_sertif,
                'persentase' => $persentasePrestasi
            ];
        }

        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        $sheet->setCellValue('A1', 'No')->getStyle('A1')->getFont()->setBold(true);
        $sheet->setCellValue('B1', 'NISN')->getStyle('B1')->getFont()->setBold(true);
        $sheet->setCellValue('C1', 'Nama Siswa')->getStyle('C1')->getFont()->setBold(true);
        $sheet->setCellValue('D1', 'Bahasa Indonesia')->getStyle('D1')->getFont()->setBold(true);
        $sheet->setCellValue('E1', 'Bahasa Inggris')->getStyle('E1')->getFont()->setBold(true);
        $sheet->setCellValue('F1', 'Matematika')->getStyle('F1')->getFont()->setBold(true);
        $sheet->setCellValue('G1', 'IPA')->getStyle('G1')->getFont()->setBold(true);
        $sheet->setCellValue('H1', 'IPS')->getStyle('H1')->getFont()->setBold(true);
        $sheet->setCellValue('I1', 'Bobot Hasil')->getStyle('I1')->getFont()->setBold(true);
        $sheet->setCellValue('J1', 'Nilai Sertifikasi')->getStyle('J1')->getFont()->setBold(true);
        $sheet->setCellValue('K1', 'Persentase')->getStyle('L1')->getFont()->setBold(true);

        $row = 2;
        $n = 1;
        foreach ($data as $item) {
            $sheet->setCellValue('A' . $row, $n);
            $sheet->setCellValue('B' . $row, $item['nisn']);
            $sheet->setCellValue('C' . $row, $item['nama_siswa']);
            $sheet->setCellValue('D' . $row, $item['bindo']);
            $sheet->setCellValue('E' . $row, $item['bing']);
            $sheet->setCellValue('F' . $row, $item['mtk']);
            $sheet->setCellValue('G' . $row, $item['ipa']);
            $sheet->setCellValue('H' . $row, $item['ips']);
            $sheet->setCellValue('I' . $row, $item['bobot_hasil']);
            $sheet->setCellValue('J' . $row, $item['nilai_sertif']);
            $sheet->setCellValue('K' . $row, $item['persentase'] . '%');
            $row++;
            $n++;
        }

        $headerStyle = $sheet->getStyle('A1:K1');
        $headerStyle->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
        $headerStyle->getAlignment()->setVertical(Alignment::VERTICAL_CENTER);
        $headerStyle->getFont()->setBold(true);
        $headerStyle->getBorders()->getAllBorders()->setBorderStyle(Border::BORDER_THIN);

        $dataStyle = $sheet->getStyle('A2:K' . ($row - 1));
        $dataStyle->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
        $dataStyle->getAlignment()->setVertical(Alignment::VERTICAL_CENTER);
        $dataStyle->getBorders()->getAllBorders()->setBorderStyle(Border::BORDER_THIN);

        for ($col = 'A'; $col != 'M'; ++$col) {
            $sheet->getColumnDimension($col)->setWidth(18);
        }

        for ($rowIndex = 1; $rowIndex <= $row; $rowIndex++) {
            $sheet->getRowDimension($rowIndex)->setRowHeight(-1);
        }

        $writer = new Xlsx($spreadsheet);

        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="bobot_prestasi.xlsx"');
        header('Cache-Control: max-age=0');

        $writer->save('php://output');
    }
}
