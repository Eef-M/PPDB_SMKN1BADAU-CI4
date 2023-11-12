<?= $this->extend('users/templates/index') ?>

<?= $this->section('user-content') ?>
<div class="row justify-content-center align-items-center" style="min-height: 82vh;">
    <div class="col-md-12 d-flex justify-content-center align-items-center flex-column gap-2 p-4">
        <img src="<?= base_url('assets/img/error_icon.png'); ?>" alt="green_check" width="240">
        <span class="text-primary fs-3 fw-bold">Maaf terjadi kesalahan, Silahkan coba lagi.</span>
        <?php
        if (session()->getFlashdata('error')) {
            echo session()->getFlashdata('error');
        }
        ?>
        <a href="<?= base_url('user-ppdb') ?>" class="btn btn-dark"><i class="fa-solid fa-arrow-left"></i> Kembali</a>
    </div>
</div>

<?= $this->endSection(); ?>