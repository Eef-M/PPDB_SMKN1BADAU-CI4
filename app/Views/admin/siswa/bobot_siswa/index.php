<?= $this->extend('admin/templates/index') ?>

<?= $this->section('admin-content') ?>
<div class="container-fluid flex-grow-1 container-p-y">
    <!-- Layout Demo -->
    <div class="card mb-3 p-4">
        <div class="card-body flex-column d-flex gap-3 ">
            <h5 class="card-title">Bobot Nilai Siswa</h5>
            <div class="row text-center">
                <div class="col-md-3">
                    <a href="<?= base_url('siswa-bobot-zonasi') ?>" class="btn btn-info py-4 px-5 w-100 mb-3">
                        <span class="card-title text-white fs-2">Zonasi</span>
                    </a>
                </div>
                <div class="col-md-3">
                    <a href="<?= base_url('siswa-bobot-afirmasi') ?>" class="btn btn-primary py-4 px-5 w-100 mb-3">
                        <span class="card-title text-white fs-2">Afirmasi</span>
                    </a>
                </div>
                <div class="col-md-3">
                    <a href="<?= base_url('siswa-bobot-mutasi') ?>" class="btn btn-success py-4 px-5 w-100 mb-3">
                        <span class="card-title text-white fs-2">Mutasi</span>
                    </a>
                </div>
                <div class="col-md-3">
                    <a href="<?= base_url('siswa-bobot-prestasi') ?>" class="btn btn-warning py-4 px-5 w-100 mb-3">
                        <span class="card-title text-white fs-2">Prestasi</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <!--/ Layout Demo -->
</div>
<?= $this->endSection(); ?>