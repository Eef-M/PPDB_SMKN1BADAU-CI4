<?= $this->extend('users/templates/index') ?>

<?= $this->section('user-content') ?>
<div class="row" style="min-height: 82vh;">
    <div class="col-md-12">
        <div class="row justify-content-center align-items-center p-3">
            <div class="col-md-12 text-center">
                <span class="badge bg-success fw-bold fs-4 text-light">Anda Sudah Mendaftar <i class="fa-solid fa-check"></i></span>
            </div>
        </div>
        <?php
        if (session()->getFlashdata('status')) {
            echo session()->getFlashdata('status');
        }
        ?>
        <a href="<?= base_url('view-pdf/' . $profile['id']) ?>" class="btn btn-info mb-3 mx-4"><i class="fa-sharp fa-solid fa-print"></i> CETAK BUKTI PENDAFTARAN</a>
        <div class="row justify-content-center align-items-center px-4 my-2">
            <div class="col-md-12">
                <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile" aria-selected="true">Profile</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="pills-nilai-tab" data-bs-toggle="pill" data-bs-target="#pills-nilai" type="button" role="tab" aria-controls="pills-nilai" aria-selected="false">Nilai Raport</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="pills-berkas-tab" data-bs-toggle="pill" data-bs-target="#pills-berkas" type="button" role="tab" aria-controls="pills-berkas" aria-selected="false">Berkas</button>
                    </li>
                </ul>
                <div class="tab-content" id="pills-tabContent">
                    <div class="tab-pane fade show active" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                        <?= $this->include('users/terdaftar/profile') ?>
                    </div>
                    <div class="tab-pane fade" id="pills-nilai" role="tabpanel" aria-labelledby="pills-nilai-tab">

                        <?php if ($profile['jalur'] == 'afirmasi') { ?>
                            <div class="d-flex justify-content-center align-items-center">
                                <span class="fs-4">
                                    Tidak ada nilai. Anda mendaftar dijalur <b class="text-secondary">AFIRMASI</b>
                                </span>
                            </div>
                        <?php } else { ?>
                            <?= $this->include('users/terdaftar/nilai') ?>
                        <?php } ?>

                    </div>
                    <div class="tab-pane fade" id="pills-berkas" role="tabpanel" aria-labelledby="pills-berkas-tab">
                        <?= $this->include('users/terdaftar/berkas') ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>