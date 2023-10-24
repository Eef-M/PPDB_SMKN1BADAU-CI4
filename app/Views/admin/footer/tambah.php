<?= $this->extend('admin/templates/index') ?>

<?= $this->section('admin-content') ?>
<div class="container-fluid flex-grow-1 container-p-y">

    <div class="d-flex justify-content-start align-items-center w-100 gap-2">
        <a href="<?= base_url('footer') ?>" class="btn btn-dark d-flex justify-content-center align-items-center gap-1">
            <i class='bx bx-left-arrow-alt'></i>
            <span>Kembali</span>
        </a>
        <div class="w-100 bg-secondary rounded" style="height: 2px;"></div>
    </div>
    <!-- Form -->
    <div class="d-flex justify-content-center align-items-center my-3">
        <div class="card w-100 bg-white">
            <!-- <span class="text-center mt-4 fs-3 fw-bold text-dark">TAMBAH TAHUN AJARAN</span> -->
            <span class="badge bg-label-dark text-center mt-4 fs-3 fw-bold text-dark">TAMBAH FOOTER</span>
            <hr class="hr mx-4" />
            <div class="card-body">
                <?php $validation = \Config\Services::validation(); ?>

                <form action="<?= base_url('footer-store'); ?>" method="POST" enctype="multipart/form-data">
                    <!-- Data Diri Siswa -->
                    <div class="d-flex flex-column justify-content-center align-items-center gap-3">
                        <div
                            class="d-flex justify-content-center align-items-center gap-4 flex-column flex-lg-row w-100">
                            <div class="d-flex flex-column justify-content-center align-items-start w-100">
                                <label class="text-black fs-5">Deskripsi Profile</label>
                                <textarea name="profile" cols="20" class="form-control border-secondary"
                                    placeholder="Masukkan Deskripsi"></textarea>
                                <!-- ERROR -->
                                <?php if ($validation->getError('profile')) { ?>
                                <div class="alert alert-danger mt-2" role="alert">
                                    <b>Deskripsi Profile</b> harus di isi
                                </div>
                                <?php } ?>
                            </div>
                        </div>
                        <div
                            class="d-flex justify-content-center align-items-center gap-4 flex-column flex-lg-row w-100">
                            <div class="d-flex flex-column justify-content-center align-items-start w-100">
                                <label class="text-black fs-5">Alamat</label>
                                <textarea name="alamat" cols="20" class="form-control border-secondary"
                                    placeholder="Masukkan alamat"></textarea>
                                <!-- ERROR -->
                                <?php if ($validation->getError('alamat')) { ?>
                                <div class="alert alert-danger mt-2" role="alert">
                                    <b>alamat</b> harus di isi
                                </div>
                                <?php } ?>
                            </div>
                        </div>
                        <div
                            class="d-flex justify-content-center align-items-center gap-4 flex-column flex-lg-row w-100">
                            <div class="d-flex flex-column justify-content-center align-items-start w-100">
                                <label class="text-black fs-5">Phone</label>
                                <input type="number" class="form-control border-secondary" name="phone"
                                    placeholder="Masukkan Nomor Telepon">
                                <!-- ERROR -->
                                <?php if ($validation->getError('phone')) { ?>
                                <div class="alert alert-danger mt-2" role="alert">
                                    <b>Phone</b> harus di isi
                                </div>
                                <?php } ?>
                            </div>
                        </div>
                        <div
                            class="d-flex justify-content-center align-items-center gap-4 flex-column flex-lg-row w-100">
                            <div class="d-flex flex-column justify-content-center align-items-start w-100">
                                <label class="text-black fs-5">Email</label>
                                <input type="text" class="form-control border-secondary" name="email"
                                    placeholder="Masukkan Email">
                                <!-- ERROR -->
                                <?php if ($validation->getError('email')) { ?>
                                <div class="alert alert-danger mt-2" role="alert">
                                    <b>Email</b> harus di isi
                                </div>
                                <?php } ?>
                            </div>
                        </div>
                        <div
                            class="d-flex justify-content-center align-items-center gap-4 flex-column flex-lg-row w-100">
                            <div class="d-flex flex-column justify-content-center align-items-start w-100">
                                <label class="text-black fs-5">Link Instagram</label>
                                <input type="text" class="form-control border-secondary" name="ig"
                                    placeholder="Masukkan Link Instagram">
                                <!-- ERROR -->
                                <?php if ($validation->getError('ig')) { ?>
                                <div class="alert alert-danger mt-2" role="alert">
                                    <b>Link Instagram</b> harus di isi
                                </div>
                                <?php } ?>
                            </div>
                        </div>
                        <div
                            class="d-flex justify-content-center align-items-center gap-4 flex-column flex-lg-row w-100">
                            <div class="d-flex flex-column justify-content-center align-items-start w-100">
                                <label class="text-black fs-5">Link Facebook</label>
                                <input type="text" class="form-control border-secondary" name="fb"
                                    placeholder="Masukkan Link Instagram">
                                <!-- ERROR -->
                                <?php if ($validation->getError('fb')) { ?>
                                <div class="alert alert-danger mt-2" role="alert">
                                    <b>Link Facebook</b> harus di isi
                                </div>
                                <?php } ?>
                            </div>
                        </div>
                        <div class="d-flex justify-content-end align-items-center w-100">
                            <button type="submit" class="btn btn-primary">Simpan Data</button>
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