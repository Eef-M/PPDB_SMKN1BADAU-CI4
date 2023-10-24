<?= $this->extend('admin/templates/index') ?>

<?= $this->section('admin-content') ?>
<!-- Content -->
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="d-flex justify-content-start align-items-center w-100 gap-2">
        <a href="<?= base_url('user-account') ?>"
            class="btn btn-dark d-flex justify-content-center align-items-center gap-1">
            <i class='bx bx-left-arrow-alt'></i>
            <span>Kembali</span>
        </a>
        <div class="w-100 bg-secondary rounded" style="height: 2px;"></div>
    </div>
    <div class="row mt-3">
        <div class="col-md-12">
            <div class="card mb-4">
                <!-- Account -->
                <div class="card-body">
                    <?php d($user) ?>
                </div>
                <hr class="my-0" />
            </div>
        </div>
    </div>
</div>
<!-- / Content -->
<?= $this->endSection(); ?>