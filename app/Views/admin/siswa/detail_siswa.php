<?= $this->extend('admin/templates/index') ?>

<?= $this->section('admin-content') ?>
<div class="container-fluid flex-grow-1 container-p-y">
    <!-- Layout Demo -->
    <div class="d-flex justify-content-start align-items-center w-100 gap-2">
        <a href="<?= base_url('siswa') ?>" class="btn btn-dark d-flex justify-content-center align-items-center gap-1">
            <i class='bx bx-left-arrow-alt'></i>
            <span>Kembali</span>
        </a>
        <div class="w-100 bg-secondary rounded" style="height: 2px;"></div>
    </div>

    <!-- Data Siswa -->
    <div class="card my-3">
        <div class="row g-0">
            <div class="col-md-8">
                <div class="card-body">
                    <h5 class="card-title">Data Siswa</h5>
                    <hr class="hr" />
                    <div class="row">
                        <div class="col-md-5">
                            1. Tanggal Pendaftaran
                        </div>
                        <div class="col-md-1 text-center">
                            :
                        </div>
                        <div class="col-md-6">
                            <?= $siswa_detail['tanggal_pendaftaran'] ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-5">
                            2. NISN
                        </div>
                        <div class="col-md-1 text-center">
                            :
                        </div>
                        <div class="col-md-6">
                            <?= $siswa_detail['nisn'] ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-5">
                            3. Nama Siswa
                        </div>
                        <div class="col-md-1 text-center">
                            :
                        </div>
                        <div class="col-md-6">
                            <?= $siswa_detail['nama_siswa'] ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-5">
                            4. Nomor Induk Kependudukan (NIK)
                        </div>
                        <div class="col-md-1 text-center">
                            :
                        </div>
                        <div class="col-md-6">
                            <?= $siswa_detail['nik'] ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-5">
                            5. Jenis Kelamin
                        </div>
                        <div class="col-md-1 text-center">
                            :
                        </div>
                        <div class="col-md-6">
                            <?= $siswa_detail['jenis_kelamin'] ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-5">
                            6. Tempat Lahir
                        </div>
                        <div class="col-md-1 text-center">
                            :
                        </div>
                        <div class="col-md-6">
                            <?= $siswa_detail['tempat_lahir'] ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-5">
                            7. Tanggal Lahir
                        </div>
                        <div class="col-md-1 text-center">
                            :
                        </div>
                        <div class="col-md-6">
                            <?= $siswa_detail['tanggal_lahir'] ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-5">
                            8. Agama
                        </div>
                        <div class="col-md-1 text-center">
                            :
                        </div>
                        <div class="col-md-6">
                            <?= $siswa_detail['agama'] ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-5">
                            9. Status Dalam Keluarga
                        </div>
                        <div class="col-md-1 text-center">
                            :
                        </div>
                        <div class="col-md-6">
                            <?= $siswa_detail['status_dlm_kel'] ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-5">
                            10. Alamat Tempat Tinggal
                        </div>
                        <div class="col-md-1 text-center">
                            :
                        </div>
                        <div class="col-md-6">
                            <?= $siswa_detail['alamat'] ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-5">
                            11. RT
                        </div>
                        <div class="col-md-1 text-center">
                            :
                        </div>
                        <div class="col-md-6">
                            <?= $siswa_detail['rt'] ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-5">
                            12. RW
                        </div>
                        <div class="col-md-1 text-center">
                            :
                        </div>
                        <div class="col-md-6">
                            <?= $siswa_detail['rw'] ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-5">
                            13. Kelurahan
                        </div>
                        <div class="col-md-1 text-center">
                            :
                        </div>
                        <div class="col-md-6">
                            <?= $siswa_detail['kelurahan'] ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-5">
                            14. Kecamatan
                        </div>
                        <div class="col-md-1 text-center">
                            :
                        </div>
                        <div class="col-md-6">
                            <?= $siswa_detail['kecamatan'] ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-5">
                            15. Kabupaten/Kota
                        </div>
                        <div class="col-md-1 text-center">
                            :
                        </div>
                        <div class="col-md-6">
                            <?= $siswa_detail['kab_kota'] ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-5">
                            16. Provinsi
                        </div>
                        <div class="col-md-1 text-center">
                            :
                        </div>
                        <div class="col-md-6">
                            <?= $siswa_detail['provinsi'] ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-5">
                            17. Telepon/No. HP Siswa
                        </div>
                        <div class="col-md-1 text-center">
                            :
                        </div>
                        <div class="col-md-6">
                            <?= $siswa_detail['nohp_siswa'] ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-5">
                            18. Nama Ayah
                        </div>
                        <div class="col-md-1 text-center">
                            :
                        </div>
                        <div class="col-md-6">
                            <?= $siswa_detail['nama_ayah'] ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-5">
                            19. No. NIK Ayah
                        </div>
                        <div class="col-md-1 text-center">
                            :
                        </div>
                        <div class="col-md-6">
                            <?= $siswa_detail['nik_ayah'] ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-5">
                            20. Nama Ibu
                        </div>
                        <div class="col-md-1 text-center">
                            :
                        </div>
                        <div class="col-md-6">
                            <?= $siswa_detail['nama_ibu'] ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-5">
                            21. No. NIK Ibu
                        </div>
                        <div class="col-md-1 text-center">
                            :
                        </div>
                        <div class="col-md-6">
                            <?= $siswa_detail['nik_ibu'] ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-5">
                            22. Telepon/No. HP Ayah/Ibu
                        </div>
                        <div class="col-md-1 text-center">
                            :
                        </div>
                        <div class="col-md-6">
                            <?= $siswa_detail['nohp_ortu'] ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-5">
                            23. Jalur
                        </div>
                        <div class="col-md-1 text-center">
                            :
                        </div>
                        <div class="col-md-6">
                            <span class="badge fw-bold fs-6" style="background-color: #FFA559; color: #454545;"><?= $siswa_detail['jalur'] ?></span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 d-flex justify-content-center align-items-center" style="background-color: #93B5C6;">
                <div class="card w-75">
                    <div class="card-body d-flex justify-content-center align-items-center flex-column gap-2">

                        <?php foreach ($berkas_detail as $foto) : ?>

                            <img class="img-fluid d-flex mx-auto my-2" src="<?= base_url('uploads/berkas_siswa/' . $foto['foto']); ?>" alt="Card image cap" />

                        <?php endforeach; ?>

                        <span class="fs-5 text-black fw-bold"><?= $siswa_detail['nama_siswa'] ?></span>
                        <span class="fs-5 text-black"><?= $siswa_detail['nisn'] ?></span>
                        <?php if ($siswa_detail['verif'] == 0) { ?>
                            <span class="badge rounded-pill bg-label-danger px-4 py-2 shadow-sm my-2 fw-bold">Belum
                                Terverifikasi</span>
                            <form action="<?= base_url('siswa/verif/' . $siswa_detail['id']) ?>" method="POST" class="w-100">
                                <input type="hidden" name="_method" value="PUT">
                                <button class="btn btn-primary w-100">Verifikasi</button>
                            </form>
                        <?php } else { ?>
                            <span class="badge rounded-pill bg-label-success px-4 py-2 shadow-sm my-2 fw-bold">Terverifikasi</span>
                            <form action="<?= base_url('siswa/unverif/' . $siswa_detail['id']) ?>" method="POST" class="w-100">
                                <input type="hidden" name="_method" value="PUT">
                                <button class="btn btn-danger w-100">Batalkan Verifikasi</button>
                            </form>
                        <?php } ?>
                        <!-- <a href="#" class="btn btn-primary w-100">Verifikasi</a>
                        <a href="#" class="btn btn-danger w-100">Batalkan Verifikasi</a> -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Data Siswa -->

    <!-- Nilai Siswa -->
    <?php if ($siswa_detail['jalur'] == 'afirmasi') {
        null;
    } else { ?>
        <div class="card my-3">
            <div class="card-body">
                <h5 class="card-title">Nilai Mata Pelajaran</h5>
                <hr class="hr" />
                <div class="table-responsive text-nowrap">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Mata Pelajaran</th>
                                <th>Semester 1</th>
                                <th>Semester 2</th>
                                <th>Semester 3</th>
                                <th>Semester 4</th>
                                <th>Semester 5</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Bahasa Indonesia</td>
                                <?php foreach ($nilai_detail as $item) : ?>
                                    <td><?= $item['bindo_1'] ?></td>
                                    <td><?= $item['bindo_2'] ?></td>
                                    <td><?= $item['bindo_3'] ?></td>
                                    <td><?= $item['bindo_4'] ?></td>
                                    <td><?= $item['bindo_5'] ?></td>
                                <?php endforeach; ?>
                            </tr>
                            <tr>
                                <td>Bahasa Inggris</td>
                                <?php foreach ($nilai_detail as $item) : ?>
                                    <td><?= $item['bing_1'] ?></td>
                                    <td><?= $item['bing_2'] ?></td>
                                    <td><?= $item['bing_3'] ?></td>
                                    <td><?= $item['bing_4'] ?></td>
                                    <td><?= $item['bing_5'] ?></td>
                                <?php endforeach; ?>
                            </tr>
                            <tr>
                                <td>Matematika</td>
                                <?php foreach ($nilai_detail as $item) : ?>
                                    <td><?= $item['mtk_1'] ?></td>
                                    <td><?= $item['mtk_2'] ?></td>
                                    <td><?= $item['mtk_3'] ?></td>
                                    <td><?= $item['mtk_4'] ?></td>
                                    <td><?= $item['mtk_5'] ?></td>
                                <?php endforeach; ?>
                            </tr>
                            <tr>
                                <td>IPA</td>
                                <?php foreach ($nilai_detail as $item) : ?>
                                    <td><?= $item['ipa_1'] ?></td>
                                    <td><?= $item['ipa_2'] ?></td>
                                    <td><?= $item['ipa_3'] ?></td>
                                    <td><?= $item['ipa_4'] ?></td>
                                    <td><?= $item['ipa_5'] ?></td>
                                <?php endforeach; ?>
                            </tr>
                            <tr>
                                <td>IPS</td>
                                <?php foreach ($nilai_detail as $item) : ?>
                                    <td><?= $item['ips_1'] ?></td>
                                    <td><?= $item['ips_2'] ?></td>
                                    <td><?= $item['ips_3'] ?></td>
                                    <td><?= $item['ips_4'] ?></td>
                                    <td><?= $item['ips_5'] ?></td>
                                <?php endforeach; ?>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    <?php } ?>
    <!-- End Niilai Siswa -->

    <!-- Berkas Siswa -->
    <div class="card my-3">
        <div class="card-body">
            <h5 class="card-title">Berkas Siswa</h5>
            <hr class="hr" />
            <?php foreach ($berkas_detail as $item) : ?>
                <div class="d-flex justify-content-center align-items-start w-100 h-100">
                    <div class="d-flex justify-content-center align-items-center gap-2 flex-column w-100">
                        <span class="text-dark fw-bold fs-5">Kartu Keluarga: </span>
                        <img style="width: 200px; height: auto;" src="<?= base_url('assets/pdf.svg'); ?>" alt="Card image cap" />
                        <div class="d-flex justify-content-center align-items-center w-100 gap-2">
                            <a href="<?= base_url('siswa-berkas/download/' . $item['id'] . '/kartu_keluarga') ?>" class="btn btn-success d-flex justify-content-center align-items-center gap-2">
                                <i class='bx bxs-arrow-to-bottom'></i>
                                <span>Download</span>
                            </a>
                        </div>
                    </div>
                    <div class="d-flex justify-content-center align-items-center gap-2 flex-column w-100">
                        <span class="text-dark fw-bold fs-5"><?= $item['scan_nisn'] ?>: </span>
                        <img style="width: 200px; height: auto;" src="<?= base_url('assets/pdf.svg'); ?>" alt="Card image cap" />
                        <div class="d-flex justify-content-center align-items-center w-100 gap-2">
                            <a href="<?= base_url('siswa-berkas/download/' . $item['id'] . '/scan_nisn') ?>" class="btn btn-success d-flex justify-content-center align-items-center gap-2">
                                <i class='bx bxs-arrow-to-bottom'></i>
                                <span>Download</span>
                            </a>
                        </div>
                    </div>
                </div>
                <hr class="hr" />
                <div class="d-flex justify-content-center align-items-start w-100 h-100">
                    <div class="d-flex justify-content-center align-items-center gap-2 flex-column w-100">
                        <span class="text-dark fw-bold fs-5">Raport Semester 1-5: </span>
                        <img style="width: 200px; height: auto;" src="<?= base_url('assets/pdf.svg'); ?>" alt="Card image cap" />
                        <div class="d-flex justify-content-center align-items-center w-100 gap-2">
                            <a href="<?= base_url('siswa-berkas/download/' . $item['id'] . '/rpt_smstr_1sd5') ?>" class="btn btn-success d-flex justify-content-center align-items-center gap-2">
                                <i class='bx bxs-arrow-to-bottom'></i>
                                <span>Download</span>
                            </a>
                        </div>
                    </div>
                    <?php if ($siswa_detail['jalur'] == 'zonasi') { ?>
                        <div class="d-flex justify-content-center align-items-center gap-2 flex-column w-100">
                            <div class="w-100 h-100"></div>
                        </div>
                    <?php } elseif ($siswa_detail['jalur'] == 'afirmasi') { ?>
                        <div class="d-flex justify-content-center align-items-center gap-2 flex-column w-100">
                            <span class="text-dark fw-bold fs-5">Bukti Keluarga Kurang Mampu: </span>
                            <img style="width: 200px; height: auto;" src="<?= base_url('assets/pdf.svg'); ?>" alt="Card image cap" />
                            <div class="d-flex justify-content-center align-items-center w-100 gap-2">
                                <a href="<?= base_url('siswa-berkas/download/' . $item['id'] . '/kel_kur_mampu') ?>" class="btn btn-success d-flex justify-content-center align-items-center gap-2">
                                    <i class='bx bxs-arrow-to-bottom'></i>
                                    <span>Download</span>
                                </a>
                            </div>
                        </div>
                    <?php } elseif ($siswa_detail['jalur'] == 'mutasi') { ?>
                        <div class="d-flex justify-content-center align-items-center gap-2 flex-column w-100">
                            <span class="text-dark fw-bold fs-5">Surat Tugas Orang Tua: </span>
                            <img style="width: 200px; height: auto;" src="<?= base_url('assets/pdf.svg'); ?>" alt="Card image cap" />
                            <div class="d-flex justify-content-center align-items-center w-100 gap-2">
                                <a href="<?= base_url('siswa-berkas/download/' . $item['id'] . '/st_ortu') ?>" class="btn btn-success d-flex justify-content-center align-items-center gap-2">
                                    <i class='bx bxs-arrow-to-bottom'></i>
                                    <span>Download</span>
                                </a>
                            </div>
                        </div>
                    <?php } elseif ($siswa_detail['jalur'] == 'prestasi') { ?>
                        <div class="d-flex justify-content-center align-items-center gap-2 flex-column w-100">
                            <span class="text-dark fw-bold fs-5">Sertifikasi Lomba/Prestasi: </span>
                            <img style="width: 200px; height: auto;" src="<?= base_url('assets/pdf.svg'); ?>" alt="Card image cap" />
                            <div class="d-flex justify-content-center align-items-center w-100 gap-2">
                                <a href="<?= base_url('siswa-berkas/download/' . $item['id'] . '/sertif_prestasi') ?>" class="btn btn-success d-flex justify-content-center align-items-center gap-2">
                                    <i class='bx bxs-arrow-to-bottom'></i>
                                    <span>Download</span>
                                </a>
                            </div>
                        </div>
                    <?php } else {
                        null;
                    } ?>

                </div>
            <?php endforeach; ?>
        </div>
    </div>
    <!-- End Berkas Siswa -->

    <!--/ Layout Demo -->
</div>
<?= $this->endSection(); ?>