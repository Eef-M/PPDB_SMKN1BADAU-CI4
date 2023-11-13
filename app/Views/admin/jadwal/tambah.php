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
            <span class="badge bg-label-dark text-center mt-4 fs-3 fw-bold text-dark">TAMBAH PENJADWALAN</span>
            <hr class="hr mx-4" />
            <div class="card-body">
                <?php $validation = \Config\Services::validation(); ?>

                <form action="<?= base_url('penjadwalan-store'); ?>" method="POST" enctype="multipart/form-data">
                    <!-- Data Diri Siswa -->
                    <div class="d-flex flex-column justify-content-center align-items-center gap-3">

                        <!-- Seleksi -->
                        <div class="d-flex justify-content-center align-items-center gap-4 flex-column flex-lg-row w-100">
                            <div class="d-flex flex-column justify-content-center align-items-start w-100">
                                <label class="text-black fs-5">Kegiatan</label>
                                <input type="text" class="form-control border-secondary" name="kegiatan_1" placeholder="Masukkan Kegiatan" value="Seleksi" readonly>
                                <!-- ERROR -->
                                <?php if ($validation->getError('kegiatan_1')) { ?>
                                    <div class="alert alert-danger mt-2" role="alert">
                                        <b>Kegiatan</b> harus di isi
                                    </div>
                                <?php } ?>
                            </div>
                            <div class="d-flex flex-column justify-content-center align-items-start w-100">
                                <label class="text-black fs-5">Lokasi</label>
                                <select name="lokasi_1" required class="form-control border-secondary">
                                    <option selected>-- Pilih Lokasi --</option>
                                    <option value="ONLINE">ONLINE</option>
                                    <option value="OFFLINE">OFFLINE</option>
                                </select>
                                <!-- ERROR -->
                                <?php if ($validation->getError('lokasi_1')) { ?>
                                    <div class="alert alert-danger mt-2" role="alert">
                                        <b>Kegiatan</b> harus di isi
                                    </div>
                                <?php } ?>
                            </div>
                            <div class="d-flex flex-column justify-content-center align-items-start w-100">
                                <label class="text-black fs-5">Tanggal Mulai</label>
                                <input type="date" class="form-control border-secondary" name="tanggal_mulai_1" required>
                                <!-- ERROR -->
                                <?php if ($validation->getError('tanggal_mulai_1')) { ?>
                                    <div class="alert alert-danger mt-2" role="alert">
                                        <b>Tanggal Mulai</b> harus di isi
                                    </div>
                                <?php } ?>
                            </div>
                            <div class="d-flex flex-column justify-content-center align-items-start w-100">
                                <label class="text-black fs-5">Tanggal Selesai</label>
                                <input type="date" class="form-control border-secondary" name="tanggal_selesai_1" required>
                                <!-- ERROR -->
                                <?php if ($validation->getError('tanggal_selesai_1')) { ?>
                                    <div class="alert alert-danger mt-2" role="alert">
                                        <b>Tanggal Selesai</b> harus di isi
                                    </div>
                                <?php } ?>
                            </div>
                        </div>

                        <!-- Pengumuman Hasil Akhir -->
                        <div class="d-flex justify-content-center align-items-center gap-4 flex-column flex-lg-row w-100">
                            <div class="d-flex flex-column justify-content-center align-items-start w-100">
                                <label class="text-black fs-5">Kegiatan</label>
                                <input type="text" class="form-control border-secondary" name="kegiatan_2" placeholder="Masukkan Kegiatan" value="Pengumuman Hasil Akhir" readonly>
                                <!-- ERROR -->
                                <?php if ($validation->getError('kegiatan_2')) { ?>
                                    <div class="alert alert-danger mt-2" role="alert">
                                        <b>Kegiatan</b> harus di isi
                                    </div>
                                <?php } ?>
                            </div>
                            <div class="d-flex flex-column justify-content-center align-items-start w-100">
                                <label class="text-black fs-5">Lokasi</label>
                                <select name="lokasi_2" required class="form-control border-secondary">
                                    <option selected>-- Pilih Lokasi --</option>
                                    <option value="ONLINE">ONLINE</option>
                                    <option value="OFFLINE">OFFLINE</option>
                                </select>
                                <!-- ERROR -->
                                <?php if ($validation->getError('lokasi_2')) { ?>
                                    <div class="alert alert-danger mt-2" role="alert">
                                        <b>Kegiatan</b> harus di isi
                                    </div>
                                <?php } ?>
                            </div>
                            <div class="d-flex flex-column justify-content-center align-items-start w-100">
                                <label class="text-black fs-5">Tanggal Mulai</label>
                                <input type="date" class="form-control border-secondary" name="tanggal_mulai_2" required>
                                <!-- ERROR -->
                                <?php if ($validation->getError('tanggal_mulai_2')) { ?>
                                    <div class="alert alert-danger mt-2" role="alert">
                                        <b>Tanggal Mulai</b> harus di isi
                                    </div>
                                <?php } ?>
                            </div>
                            <div class="d-flex flex-column justify-content-center align-items-start w-100">
                                <label class="text-black fs-5">Tanggal Selesai</label>
                                <input type="date" class="form-control border-secondary" name="tanggal_selesai_2" required>
                                <!-- ERROR -->
                                <?php if ($validation->getError('tanggal_selesai_2')) { ?>
                                    <div class="alert alert-danger mt-2" role="alert">
                                        <b>Tanggal Selesai</b> harus di isi
                                    </div>
                                <?php } ?>
                            </div>
                        </div>

                        <!-- Lapor Diri -->
                        <div class="d-flex justify-content-center align-items-center gap-4 flex-column flex-lg-row w-100">
                            <div class="d-flex flex-column justify-content-center align-items-start w-100">
                                <label class="text-black fs-5">Kegiatan</label>
                                <input type="text" class="form-control border-secondary" name="kegiatan_3" placeholder="Masukkan Kegiatan" value="Lapor Diri" readonly>
                                <!-- ERROR -->
                                <?php if ($validation->getError('kegiatan_3')) { ?>
                                    <div class="alert alert-danger mt-2" role="alert">
                                        <b>Kegiatan</b> harus di isi
                                    </div>
                                <?php } ?>
                            </div>
                            <div class="d-flex flex-column justify-content-center align-items-start w-100">
                                <label class="text-black fs-5">Lokasi</label>
                                <select name="lokasi_3" required class="form-control border-secondary">
                                    <option selected>-- Pilih Lokasi --</option>
                                    <option value="ONLINE">ONLINE</option>
                                    <option value="OFFLINE">OFFLINE</option>
                                </select>
                                <!-- ERROR -->
                                <?php if ($validation->getError('lokasi_3')) { ?>
                                    <div class="alert alert-danger mt-2" role="alert">
                                        <b>Kegiatan</b> harus di isi
                                    </div>
                                <?php } ?>
                            </div>
                            <div class="d-flex flex-column justify-content-center align-items-start w-100">
                                <label class="text-black fs-5">Tanggal Mulai</label>
                                <input type="date" class="form-control border-secondary" name="tanggal_mulai_3" required>
                                <!-- ERROR -->
                                <?php if ($validation->getError('tanggal_mulai_3')) { ?>
                                    <div class="alert alert-danger mt-2" role="alert">
                                        <b>Tanggal Mulai</b> harus di isi
                                    </div>
                                <?php } ?>
                            </div>
                            <div class="d-flex flex-column justify-content-center align-items-start w-100">
                                <label class="text-black fs-5">Tanggal Selesai</label>
                                <input type="date" class="form-control border-secondary" name="tanggal_selesai_3" required>
                                <!-- ERROR -->
                                <?php if ($validation->getError('tanggal_selesai_3')) { ?>
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