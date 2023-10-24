<?= $this->extend('admin/templates/index') ?>

<?= $this->section('admin-content') ?>
<div class="container-fluid flex-grow-1 container-p-y">
    <div class="d-flex justify-content-start align-items-center w-100 gap-2">
        <a href="<?= base_url('siswa-bobot') ?>"
            class="btn btn-dark d-flex justify-content-center align-items-center gap-1">
            <i class='bx bx-left-arrow-alt'></i>
            <span>Kembali</span>
        </a>
        <div class="w-100 bg-secondary rounded" style="height: 2px;"></div>
    </div>
    <!-- Layout Demo -->
    <div class="card my-3">
        <div class="card-body flex-column d-flex gap-3 ">
            <h5 class="card-title">Bobot Nilai Siswa <span class="text-warning fw-bold">Prestasi</span></h5>
            <div class="d-flex justify-content-end align-items-center w-100 gap-2">
                <?php if (empty($prestasi)) {
                    null;
                } else { ?>
                <a href="<?= base_url('prestasi-excel'); ?>"
                    class="btn d-flex justify-content-center align-items-center gap-2"
                    style="background-color: #379237; color: white;">
                    <i class='bx bx-plus-circle'></i>
                    <span class="d-lg-inline-block d-none">Export Excel</span>
                </a>
                <?php } ?>
            </div>
            <?php
            if (session()->getFlashdata('status')) {
                echo session()->getFlashdata('status');
            }
            ?>
            <div class="table-responsive text-wrap text-center">
                <table class="table">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>NISN</th>
                            <th>Nama</th>
                            <th>Matematika</th>
                            <th>Bahasa Indonesia</th>
                            <th>Bahasa Inggris</th>
                            <th>IPA</th>
                            <th>IPS</th>
                            <th>Nilai Sertifikat</th>
                            <th class="text-nowrap">Bobot Hasil</th>
                            <th>Persentase Calon Siswa</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody><?php if (empty($data)) { ?>
                        <tr>
                            <td colspan="12" class="text-center py-5 fs-4 text-dark">TIDAK ADA DATA</td>
                        </tr>
                        <?php } else {
                                $no = 1;
                                foreach ($data as $row) : ?>
                        <tr>
                            <td><?= $no; ?></td>
                            <td><?= $row['nisn']; ?></td>
                            <td class="text-wrap"><?= $row['nama_siswa']; ?></td>
                            <td><?= $row['bindo']; ?></td>
                            <td><?= $row['bing']; ?></td>
                            <td><?= $row['mtk']; ?></td>
                            <td><?= $row['ipa']; ?></td>
                            <td><?= $row['ips']; ?></td>
                            <td class="text-center">
                                <?php if ($row['nilai_sertif'] == 0) { ?>
                                <span class="badge bg-label-danger fw-bold mb-2">Belum di nilai</span>
                                <?php } else { ?>
                                <?= $row['nilai_sertif'] ?>
                                <?php } ?>
                            </td>
                            <td><?= $row['bobot_hasil']; ?></td>
                            <td><?= $row['persentase']; ?>%</td>
                            <td class="text-nowrap">
                                <a href="<?= base_url('siswa-bobot/detail/' . $row['id']) ?>"
                                    class="btn btn-info px-2">Detail</a>
                                <?php if ($row['nilai_sertif'] == 0) { ?>
                                <a href="#" class="btn btn-primary px-2" data-bs-toggle="modal"
                                    data-bs-target="#modalCenter<?= $row['id'] ?>">Beri Nilai</a>
                                <?php } else { ?>
                                <a href="#" class="btn btn-danger px-2" data-bs-toggle="modal"
                                    data-bs-target="#modalCenter<?= $row['id'] ?>">Hapus Nilai</a>
                                <?php } ?>
                            </td>
                        </tr>

                        <!-- Modal -->
                        <?php if ($row['nilai_sertif'] == 0) { ?>
                        <div class="modal fade" id="modalCenter<?= $row['id'] ?>" tabindex="-1" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <form action="<?= base_url('nilai-sertif/store/' . $row['id']) ?>" method="POST">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="modalCenterTitle">Nilai Sertifikat</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <img src="<?= base_url('uploads/berkas_siswa/' . $row['berkas_sertif']) ?>"
                                                alt="berkas_sertif" width="500" class="mb-3">
                                            <input type="number" class="form-control border-primary"
                                                placeholder="Masukkan Nilai Sertifikat" name="nilai" required>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                                                Tidak
                                            </button>
                                            <button type="submit" class="btn btn-primary">Kirim</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <?php } else { ?>
                        <div class="modal fade" id="modalCenter<?= $row['id'] ?>" tabindex="-1" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <form action="<?= base_url('nilai-sertif/hapus/' . $row['id']) ?>" method="POST">
                                    <input type="hidden" name="_method" value="DELETE">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="modalCenterTitle">Apakah Yakin ?</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body text-wrap">
                                            <span>Ingin menghapus Nilai Sertif Dari Siswa bernama:</span>
                                            <span class="fw-bold text-danger"><?= $row['nama_siswa'] ?></span>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                                                Tidak
                                            </button>
                                            <button type="submit" class="btn btn-danger">Ya</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <?php } ?>
                        <!-- End Modal -->
                        <?php
                                    $no++;
                                endforeach;
                            } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!--/ Layout Demo -->
</div>
<?= $this->endSection(); ?>