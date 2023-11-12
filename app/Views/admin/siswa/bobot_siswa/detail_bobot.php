<?= $this->extend('admin/templates/index') ?>

<?= $this->section('admin-content') ?>
<div class="container-fluid flex-grow-1 container-p-y">

    <div class="d-flex justify-content-start align-items-center w-100 gap-2">
        <?php if ($siswa_detail['jalur'] == 'zonasi') { ?>
            <a href="<?= base_url('siswa-bobot-zonasi') ?>" class="btn btn-dark d-flex justify-content-center align-items-center gap-1">
                <i class='bx bx-left-arrow-alt'></i>
                <span>Kembali</span>
            </a>
        <?php } elseif ($siswa_detail['jalur'] == 'afirmasi') { ?>
            <a href="<?= base_url('siswa-bobot-afirmasi') ?>" class="btn btn-dark d-flex justify-content-center align-items-center gap-1">
                <i class='bx bx-left-arrow-alt'></i>
                <span>Kembali</span>
            </a>
        <?php } elseif ($siswa_detail['jalur'] == 'mutasi') { ?>
            <a href="<?= base_url('siswa-bobot-mutasi') ?>" class="btn btn-dark d-flex justify-content-center align-items-center gap-1">
                <i class='bx bx-left-arrow-alt'></i>
                <span>Kembali</span>
            </a>
        <?php } elseif ($siswa_detail['jalur'] == 'prestasi') { ?>
            <a href="<?= base_url('siswa-bobot-prestasi') ?>" class="btn btn-dark d-flex justify-content-center align-items-center gap-1">
                <i class='bx bx-left-arrow-alt'></i>
                <span>Kembali</span>
            </a>
        <?php } else {
            null;
        } ?>
        <div class="w-100 bg-secondary rounded" style="height: 2px;"></div>
    </div>
    <div class="card my-3">
        <div class="row g-0">
            <div class="col-md-8">
                <div class="card-body">
                    <h5 class="card-title">Bobot Nilai Siswa
                        <?php if ($siswa_detail['jalur'] == 'zonasi') { ?>
                            <span class="text-info fw-bold">Zonasi</span>
                        <?php } elseif ($siswa_detail['jalur'] == 'afirmasi') { ?>
                            <span class="text-primary fw-bold">Afirmasi</span>
                        <?php } elseif ($siswa_detail['jalur'] == 'mutasi') { ?>
                            <span class="text-success fw-bold">Mutasi</span>
                        <?php } elseif ($siswa_detail['jalur'] == 'prestasi') { ?>
                            <span class="text-warning fw-bold">Prestasi</span>
                        <?php } else {
                            null;
                        } ?>
                    </h5>
                    <hr class="hr" />
                    <!-- Nilai -->

                    <?php if ($siswa_detail['jalur'] == 'afirmasi') {
                        null;
                    } else { ?>
                        <span class="text-dark fs-5 fw-bold">Nilai Raport</span>
                        <div class="table-responsive text-wrap mt-2 text-center">
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
                    <?php } ?>

                    <!-- Nilai End -->
                    <div class="d-flex justify-content-start align-items-start w-100 flex-column gap-3 my-3">
                        <?php foreach ($berkas_detail as $item) : ?>
                            <div class="d-flex justify-content-start align-items-start w-100 flex-column gap-2">
                                <span class="text-dark fw-bold fs-5">Foto</span>
                                <div class="d-flex justify-content-start align-items-start w-100 gap-2">
                                    <a href="<?= base_url('siswa-berkas/download/' . $item['id'] . '/foto') ?>" class="btn btn-success d-flex justify-content-center align-items-center gap-2">
                                        <i class='bx bxs-arrow-to-bottom'></i>
                                        <span>Download</span>
                                    </a>
                                    <a href="<?= base_url('siswa-berkas/view/' . $item['id'] . '/foto') ?>" class="btn btn-info d-flex justify-content-center align-items-center gap-2">
                                        <i class='bx bx-show'></i>
                                        <span>Lihat</span>
                                    </a>
                                </div>
                            </div>
                            <div class="d-flex justify-content-start align-items-start w-100 flex-column gap-2">
                                <span class="text-dark fw-bold fs-5">Kartu Keluarga</span>
                                <div class="d-flex justify-content-start align-items-start w-100 gap-2">
                                    <a href="<?= base_url('siswa-berkas/download/' . $item['id'] . '/kartu_keluarga') ?>" class="btn btn-success d-flex justify-content-center align-items-center gap-2">
                                        <i class='bx bxs-arrow-to-bottom'></i>
                                        <span>Download</span>
                                    </a>
                                </div>
                            </div>
                            <div class="d-flex justify-content-start align-items-start w-100 flex-column gap-2">
                                <span class="text-dark fw-bold fs-5">Scan NISN</span>
                                <div class="d-flex justify-content-start align-items-start w-100 gap-2">
                                    <a href="<?= base_url('siswa-berkas/download/' . $item['id'] . '/scan_nisn') ?>" class="btn btn-success d-flex justify-content-center align-items-center gap-2">
                                        <i class='bx bxs-arrow-to-bottom'></i>
                                        <span>Download</span>
                                    </a>
                                </div>
                            </div>
                            <div class="d-flex justify-content-start align-items-start w-100 flex-column gap-2">
                                <span class="text-dark fw-bold fs-5">Raport Semester 1 - 5</span>
                                <div class="d-flex justify-content-start align-items-start w-100 gap-2">
                                    <a href="<?= base_url('siswa-berkas/download/' . $item['id'] . '/rpt_smstr_1sd5') ?>" class="btn btn-success d-flex justify-content-center align-items-center gap-2">
                                        <i class='bx bxs-arrow-to-bottom'></i>
                                        <span>Download</span>
                                    </a>
                                </div>
                            </div>

                            <?php if ($siswa_detail['jalur'] == 'afirmasi') { ?>
                                <div class="d-flex justify-content-start align-items-start w-100 flex-column gap-2">
                                    <span class="text-dark fw-bold fs-5">Bukti Keluarga Kurang Mampu</span>
                                    <div class="d-flex justify-content-start align-items-start w-100 gap-2">
                                        <a href="<?= base_url('siswa-berkas/download/' . $item['id'] . '/kel_kur_mampu') ?>" class="btn btn-success d-flex justify-content-center align-items-center gap-2">
                                            <i class='bx bxs-arrow-to-bottom'></i>
                                            <span>Download</span>
                                        </a>
                                    </div>
                                </div>
                            <?php } elseif ($siswa_detail['jalur'] == 'mutasi') { ?>
                                <div class="d-flex justify-content-start align-items-start w-100 flex-column gap-2">
                                    <span class="text-dark fw-bold fs-5">Surat Tugas Orang Tua</span>
                                    <div class="d-flex justify-content-start align-items-start w-100 gap-2">
                                        <a href="<?= base_url('siswa-berkas/download/' . $item['id'] . '/st_ortu') ?>" class="btn btn-success d-flex justify-content-center align-items-center gap-2">
                                            <i class='bx bxs-arrow-to-bottom'></i>
                                            <span>Download</span>
                                        </a>
                                    </div>
                                </div>
                            <?php } elseif ($siswa_detail['jalur'] == 'prestasi') { ?>
                                <div class="d-flex justify-content-start align-items-start w-100 flex-column gap-2">
                                    <span class="text-dark fw-bold fs-5">Sertifikat Lomba/Prestasi</span>
                                    <div class="d-flex justify-content-start align-items-start w-100 gap-2">
                                        <a href="<?= base_url('siswa-berkas/download/' . $item['id'] . '/sertif_prestasi') ?>" class="btn btn-success d-flex justify-content-center align-items-center gap-2">
                                            <i class='bx bxs-arrow-to-bottom'></i>
                                            <span>Download</span>
                                        </a>
                                    </div>
                                </div>
                            <?php } else {
                                null;
                            } ?>

                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
            <div class="col-md-4 d-flex justify-content-center align-items-start bg-dark py-4">
                <div class="card w-75">
                    <div class="card-body d-flex justify-content-center align-items-center flex-column gap-2">

                        <?php foreach ($berkas_detail as $foto) : ?>

                            <img class="img-fluid d-flex mx-auto my-2" src="<?= base_url('uploads/berkas_siswa/' . $foto['foto']); ?>" alt="Card image cap" />

                        <?php endforeach; ?>

                        <div class="table-responsive text-wrap text-dark fw-bold">
                            <table class="table table-borderless">
                                <thead>

                                </thead>
                                <tbody>
                                    <tr>
                                        <td style="padding: 0; margin: 0;">Nama Siswa</td>
                                        <td style="padding: 0 10px 0 16px; margin: 0;">:</td>
                                        <td style="padding: 0; margin: 0;"><?= $siswa_detail['nama_siswa'] ?></td>
                                    </tr>
                                    <tr>
                                        <td style="padding: 0; margin: 0;">NISN</td>
                                        <td style="padding: 0 10px 0 16px; margin: 0;">:</td>
                                        <td style="padding: 0; margin: 0;"><?= $siswa_detail['nisn'] ?></td>
                                    </tr>
                                    <?php if ($siswa_detail['jalur'] == 'afirmasi') {
                                        null;
                                    } else { ?>
                                        <tr>
                                            <td style="padding: 0; margin: 0;">Bobot</td>
                                            <td style="padding: 0 10px 0 16px; margin: 0;">:</td>
                                            <td style="padding: 0; margin: 0;"><?= $final_bobot; ?></td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>

                        <!-- <a href="#" class="btn btn-primary w-100">Verifikasi</a>
                        <a href="#" class="btn btn-danger w-100">Batalkan Verifikasi</a> -->
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
<?= $this->endSection(); ?>