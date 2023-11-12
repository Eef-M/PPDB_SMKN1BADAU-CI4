public function store_berkas() {
    $data_siswa = new Data_siswa();
    $upload_berkas = new Upload_berkas();
    $siswa = $data_siswa->findAll();

    $data = array();
    $siswaIDget = $data_siswa->getIdByNisn(user()->nisn);
    $siswaIDconv = implode($siswaIDget);

    $ID_siswa = intval($siswaIDconv);

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

    $data = [
        'id_siswa' => $ID_siswa,
        'nisn' => user()->nisn,
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

    $upload_berkas->insertUploadBerkas($data);
        
    $data['tahun_ajaran'] = $this->kondisi_TA();
    $data['navigation'] = $this->menu_handle();
    return view('users/notif_page', $data);
}