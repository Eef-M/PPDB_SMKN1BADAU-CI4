<?= $this->extend('users/templates/index') ?>

<?= $this->section('user-content') ?>
<div>
    <div class="row">
        <div class="col-sm-9">
            <!-- Start retroy layout blog posts -->
            <section class="section bg-light">
                <div class="d-flex justify-content-center align-items-center mx-auto flex-column px-4">
                    <span class="fs-2 fw-bold">FORM PPDB</span>
                    <form id="multiple-steps-form" class="w-100">
                        <div class="step active" id="step-data-diri">
                            <?= $this->include('users/form_ppdb/data_diri') ?>

                            <button type="button" class="btn btn-primary mt-2" onclick="nextStep()">Selanjutnya</button>
                        </div>

                        <div class="step" id="step-nilai">
                            <?= $this->include('users/form_ppdb/form_nilai') ?>

                            <div class="d-flex justify-content-between">
                                <button type="button" class="btn btn-primary" onclick="prevStep()">Sebelumnya</button>
                                <button type="button" class="btn btn-primary" onclick="nextStep()">Selanjutnya</button>
                            </div>
                        </div>

                        <div class="step" id="step-berkas">
                            <?= $this->include('users/form_ppdb/upload_berkas') ?>

                            <div class="d-flex justify-content-between">
                                <button type="button" class="btn btn-primary" onclick="prevStep()">Sebelumnya</button>
                                <button type="submit" class="btn btn-primary">Kirim</button>
                            </div>
                        </div>
                    </form>
                </div>
            </section>
        </div>
        <div class="col-sm-3">KETERANGAN</div>
    </div>

</div>
<?= $this->endSection(); ?>