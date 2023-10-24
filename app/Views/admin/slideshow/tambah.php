<?= $this->extend('admin/templates/index') ?>

<?= $this->section('admin-content') ?>
<div class="container-fluid flex-grow-1 container-p-y">

    <div class="d-flex justify-content-start align-items-center w-100 gap-2">
        <a href="<?= base_url('slideshow') ?>"
            class="btn btn-dark d-flex justify-content-center align-items-center gap-1">
            <i class='bx bx-left-arrow-alt'></i>
            <span>Kembali</span>
        </a>
        <div class="w-100 bg-secondary rounded" style="height: 2px;"></div>
    </div>
    <!-- Form -->
    <div class="d-flex justify-content-center align-items-center my-3">
        <div class="card w-100 bg-white">
            <!-- <span class="text-center mt-4 fs-3 fw-bold text-dark">TAMBAH TAHUN AJARAN</span> -->
            <span class="badge bg-label-dark text-center mt-4 fs-3 fw-bold text-dark">TAMBAH SLIDESHOW</span>
            <hr class="hr mx-4" />
            <div class="card-body">
                <?php $validation = \Config\Services::validation(); ?>

                <form action="<?= base_url('slideshow-store'); ?>" method="POST" enctype="multipart/form-data">
                    <!-- Data Diri Siswa -->
                    <div class="d-flex flex-column justify-content-center align-items-center gap-3">
                        <div
                            class="d-flex justify-content-center align-items-center gap-4 flex-column flex-lg-row w-100">
                            <div class="d-flex flex-column justify-content-center align-items-start w-100">
                                <label class="text-black fs-5">Gambar</label>
                                <input type="file" class="form-control border-secondary" name="gambar">
                                <!-- ERROR -->
                                <?php if ($validation->getError('gambar')) { ?>
                                <div class="alert alert-danger mt-2" role="alert">
                                    <?= $error = $validation->getError('gambar') ?>
                                </div>
                                <?php } ?>
                            </div>
                            <div class="d-flex flex-column justify-content-center align-items-start w-100">
                                <label class="text-black fs-5">Judul</label>
                                <input type="text" class="form-control border-secondary" name="judul"
                                    placeholder="Masukkan judul">
                                <!-- ERROR -->
                                <?php if ($validation->getError('judul')) { ?>
                                <div class="alert alert-danger mt-2" role="alert">
                                    <?= $error = $validation->getError('judul') ?>
                                </div>
                                <?php } ?>
                            </div>
                        </div>
                        <div
                            class="d-flex justify-content-center align-items-center gap-4 flex-column flex-lg-row w-100">
                            <div class="d-flex flex-column justify-content-center align-items-start w-100">
                                <label class="text-black fs-5">Deskripsi</label>
                                <textarea cols="2" class="form-control border-secondary" name="deskripsi"
                                    placeholder="Masukkan deskripsi"></textarea>
                                <!-- ERROR -->
                                <?php if ($validation->getError('isi')) { ?>
                                <div class="alert alert-danger mt-2" role="alert">
                                    <b>Deskripsi</b> harus di isi
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