<?= $this->extend('admin/templates/index') ?>

<?= $this->section('admin-content') ?>
<div class="container-fluid flex-grow-1 container-p-y">

    <div class="d-flex justify-content-start align-items-center w-100 gap-2">
        <a href="<?= base_url('penjadwalan') ?>" class="btn btn-dark d-flex justify-content-center align-items-center gap-1">
            <i class='bx bx-left-arrow-alt'></i>
            <span>Kembali</span>
        </a>
        <div class="w-100 bg-secondary rounded" style="height: 2px;"></div>
    </div>
    <!-- Form -->
    <div class="d-flex justify-content-center align-items-center my-3">
        <div class="card w-100 bg-white">
            <!-- <span class="text-center mt-4 fs-3 fw-bold text-dark">TAMBAH TAHUN AJARAN</span> -->
            <span class="badge bg-label-dark text-center mt-4 fs-3 fw-bold text-dark">EDIT PENJADWALAN</span>
            <hr class="hr mx-4" />
            <div class="card-body">
                <?php $validation = \Config\Services::validation(); ?>

                <form action="<?= base_url('penjadwalan/update/' . $jadwal['id']); ?>" method="POST" enctype="multipart/form-data">

                    <input type="hidden" name="_method" value="PUT">
                    <div class="d-flex flex-column justify-content-center align-items-center gap-3">

                        <div class="d-flex justify-content-center align-items-center gap-4 flex-column flex-lg-row w-100">
                            <div class="d-flex flex-column justify-content-center align-items-start w-100">
                                <label class="text-black fs-5">Kegiatan</label>
                                <input type="text" class="form-control border-secondary" name="kegiatan" placeholder="Masukkan Kegiatan" value="<?= $jadwal['kegiatan'] ?>" readonly>
                                <!-- ERROR -->
                                <?php if ($validation->getError('kegiatan')) { ?>
                                    <div class="alert alert-danger mt-2" role="alert">
                                        <b>Kegiatan</b> harus di isi
                                    </div>
                                <?php } ?>
                            </div>
                            <div class="d-flex flex-column justify-content-center align-items-start w-100">
                                <label class="text-black fs-5">Lokasi</label>
                                <select name="lokasi" required class="form-control border-secondary">
                                    <option selected>-- Pilih Lokasi --</option>
                                    <option value="ONLINE">ONLINE</option>
                                    <option value="OFFLINE">OFFLINE</option>
                                </select>
                                <!-- ERROR -->
                                <?php if ($validation->getError('lokasi')) { ?>
                                    <div class="alert alert-danger mt-2" role="alert">
                                        <b>Kegiatan</b> harus di isi
                                    </div>
                                <?php } ?>
                            </div>
                            <div class="d-flex flex-column justify-content-center align-items-start w-100">
                                <label class="text-black fs-5">Tanggal Mulai</label>
                                <input type="date" class="form-control border-secondary" name="tanggal_mulai" required value="<?= $jadwal['tanggal_mulai'] ?>">
                                <!-- ERROR -->
                                <?php if ($validation->getError('tanggal_mulai')) { ?>
                                    <div class="alert alert-danger mt-2" role="alert">
                                        <b>Tanggal Mulai</b> harus di isi
                                    </div>
                                <?php } ?>
                            </div>
                            <div class="d-flex flex-column justify-content-center align-items-start w-100">
                                <label class="text-black fs-5">Tanggal Selesai</label>
                                <input type="date" class="form-control border-secondary" name="tanggal_selesai" required value="<?= $jadwal['tanggal_selesai'] ?>">
                                <!-- ERROR -->
                                <?php if ($validation->getError('tanggal_selesai')) { ?>
                                    <div class="alert alert-danger mt-2" role="alert">
                                        <b>Tanggal Selesai</b> harus di isi
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