<?= $this->extend('users/templates/index') ?>

<?= $this->section('user-content') ?>
<div>
    <div class="row">
        <div class="col-sm-9">
            <!-- Start retroy layout blog posts -->
            <section class="section bg-light">
                <div class="d-flex justify-content-center align-items-center mx-auto flex-column px-4">
                    <?php
                    if (session()->getFlashdata('status')) {
                        echo session()->getFlashdata('status');
                    }
                    ?>
                    <span class="fs-2 fw-bold text-dark">FORM PPDB</span>
                    <span class="fs-4 fw-bold text-success">Jalur Mutasi</span>
                    <div class="w-100 bg-dark my-2 rounded" style="height: 1.5px;"></div>

                    <?php if ($current_form === 'data_diri') : ?>

                        <!-- DATA DIRI -->
                        <form action="<?= base_url('user-store-bio'); ?>" class="w-100 mt-3" method="POST" enctype="multipart/form-data">
                            <input type="hidden" name="jalur" value="mutasi">
                            <?= $this->include('users/form_ppdb/data_diri') ?>
                        </form> 
                        <!-- DATA DIRI END -->

                    <?php elseif ($current_form === 'form_nilai') : ?>

                        <!-- NILAI -->
                        <?= $this->include('users/form_ppdb/form_nilai') ?>
                        <!-- NILAI END -->

                    <?php elseif ($current_form === 'upload_berkas') : ?>

                        <!-- UPLOAD BERKAS -->
                        <form action="<?= base_url('user-store-berkas'); ?>" class="w-100 mt-3" method="POST" enctype="multipart/form-data">
                            <div>
                                <span class="fs-4 fw-bold text-black">Upload Berkas</span>
                                <hr class="hr text-primary" />
                                <div class="d-flex justify-content-center align-items-start flex-column mb-3">
                                    <span class="text-black fs-5">Foto</span>
                                    <input type="file" required class="form-control border-primary" name="foto">
                                    <span style="font-size: 14px;" class="text-secondary fst-italic">format file harus JPG/JPEG/PNG. MAX: 4MB</span>
                                </div>
                                <div class="d-flex justify-content-center align-items-start flex-column mb-3">
                                    <span class="text-black fs-5">Kartu Keluarga</span>
                                    <input type="file" required class="form-control border-primary" name="kartu_keluarga">
                                    <span style="font-size: 14px;" class="text-secondary fst-italic">format file harus PDF. MAX: 10MB</span>
                                </div>
                                <div class="d-flex justify-content-center align-items-start flex-column mb-3">
                                    <span class="text-black fs-5">Scan Kartu NISN</span>
                                    <input type="file" required class="form-control border-primary" name="scan_nisn">
                                    <span style="font-size: 14px;" class="text-secondary fst-italic">format file harus PDF. MAX: 10MB</span>
                                </div>
                                <div class="d-flex justify-content-center align-items-start flex-column mb-3">
                                    <span class="text-black fs-5">Raport Semester 1-5</span>
                                    <input type="file" required class="form-control border-primary" name="rpt_smstr_1sd5">
                                    <span style="font-size: 14px;" class="text-secondary fst-italic">format file harus PDF. MAX: 20MB</span>
                                </div>
                                <div class="d-flex justify-content-center align-items-start flex-column mb-3">
                                    <span class="text-black fs-5">Surat Tugas Orang Tua</span>
                                    <input type="file" required class="form-control border-primary" name="st_ortu">
                                    <span style="font-size: 14px;" class="text-secondary fst-italic">format file harus PDF. MAX: 10MB</span>
                                </div>

                                <div class="d-flex justify-content-between">
                                    <button type="submit" class="btn btn-primary">Kirim</button>
                                </div>
                            </div>
                        </form>
                        <!-- UPLOAD BERKAS END -->

                    <?php else : ?>
                    <span>FORM NOT AVAILABLE</span>
                    <?php endif; ?>
                    
                </div>
            </section>
        </div>
        <div class="col-sm-3 p-4" style="background-color: #EDEEF7;">
            <?= $this->include('users/form_ppdb/ket_daftar'); ?>
        </div>
    </div>

</div>
<?= $this->endSection(); ?>