<?= $this->extend('admin/templates/index') ?>

<?= $this->section('admin-content') ?>
<div class="container-fluid flex-grow-1 container-p-y">

    <div class="d-flex justify-content-start align-items-center w-100 gap-2">
        <a href="<?= base_url('tahun_ajaran') ?>"
            class="btn btn-dark d-flex justify-content-center align-items-center gap-1">
            <i class='bx bx-left-arrow-alt'></i>
            <span>Kembali</span>
        </a>
        <div class="w-100 bg-secondary rounded" style="height: 2px;"></div>
    </div>
    <!-- Form -->
    <div class="d-flex justify-content-center align-items-center my-3">
        <div class="card w-100 bg-white">
            <span class="badge bg-label-dark text-center mt-4 fs-3 fw-bold text-dark">EDIT TAHUN AJARAN</span>
            <hr class="hr mx-4" />
            <div class="card-body">
                <?php $validation = \Config\Services::validation(); ?>

                <form action="<?= base_url('tahun_ajaran/update/' . $tahun_ajaran['id']); ?>" method="POST"
                    enctype="multipart/form-data">
                    <input type="hidden" name="_method" value="PUT">
                    <!-- Data Diri Siswa -->
                    <div class="d-flex flex-column justify-content-center align-items-center gap-3">
                        <div
                            class="d-flex justify-content-center align-items-center gap-4 flex-column flex-lg-row w-100">
                            <div class="d-flex flex-column justify-content-center align-items-start w-100">
                                <label class="text-black fs-5">Tahun Ajaran</label>
                                <input type="text" class="form-control border-secondary" name="tahun_ajaran"
                                    placeholder="Masukkan Tahun Ajaran" value="<?= $tahun_ajaran['tahun_ajaran'] ?>">
                                <!-- ERROR -->
                                <?php if ($validation->getError('tahun_ajaran')) { ?>
                                <div class="alert alert-danger mt-2" role="alert">
                                    <b>Tahun Ajaran</b> harus di isi
                                </div>
                                <?php } ?>
                            </div>
                            <div class="d-flex flex-column justify-content-center align-items-start w-100">
                                <label class="text-black fs-5">Tanggal Mulai</label>
                                <input type="date" class="form-control border-secondary" name="tanggal_mulai" value="<?= $tahun_ajaran['tanggal_mulai'] ?>">
                                <!-- ERROR -->
                                <?php if ($validation->getError('tanggal_mulai')) { ?>
                                <div class="alert alert-danger mt-2" role="alert">
                                    <b>Tanggal Mulai</b> harus di isi
                                </div>
                                <?php } ?>
                            </div>
                            <div class="d-flex flex-column justify-content-center align-items-start w-100">
                                <label class="text-black fs-5">Tanggal Selesai</label>
                                <input type="date" class="form-control border-secondary" name="tanggal_selesai" value="<?= $tahun_ajaran['tanggal_selesai'] ?>">
                                <!-- ERROR -->
                                <?php if ($validation->getError('tanggal_selesai')) { ?>
                                <div class="alert alert-danger mt-2" role="alert">
                                    <b>Tanggal Selesai</b> harus di isi
                                </div>
                                <?php } ?>
                            </div>
                        </div>
                        <div
                            class="d-flex justify-content-center align-items-center gap-4 flex-column flex-lg-row w-100">
                            <div class="d-flex flex-column justify-content-center align-items-start w-100">
                                <label class="text-black fs-5">Keterangan</label>
                                <textarea class="form-control border-secondary" name="keterangan" rows="2"
                                    placeholder="Masukkan Keterangan"><?= $tahun_ajaran['keterangan'] ?></textarea>
                                <!-- ERROR -->
                                <?php if ($validation->getError('keterangan')) { ?>
                                <div class="alert alert-danger mt-2" role="alert">
                                    <b>Keterangan</b> harus di isi
                                </div>
                                <?php } ?>
                            </div>
                        </div>
                        <input type="hidden" name="is_active" value="<?= $tahun_ajaran['is_active'] ?>">
                        <div class="d-flex justify-content-end align-items-center w-100">
                            <button type="submit" class="btn btn-primary">Update Data</button>
                        </div>
                    </div>
                    <!-- End Data Diri Siswa -->
                </form>
            </div>
        </div>
    </div>
    <!--/ Form -->
</div>
<?= $this->endSection(); ?>