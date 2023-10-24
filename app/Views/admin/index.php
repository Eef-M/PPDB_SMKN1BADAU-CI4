<?= $this->extend('admin/templates/index') ?>

<?= $this->section('admin-content') ?>
<div class="container-fluid flex-grow-1 container-p-y">
    <!-- Layout Demo -->
    <div class="row">
        <div class="col-md-6 col-xl-4">
            <div class="card bg-dark text-white mb-3">
                <div class="card-body justify-content-center align-items-center d-flex h-100" style="gap: 110px;">
                    <div>
                        <span class="text-white fw-bold" style="font-size: 44px;"><?= $semua_pendaftar; ?></span>
                        <p class="card-text fs-6">Semua Pendaftar</p>
                    </div>
                    <i class='bx bxs-bar-chart-alt-2' style="font-size: 70px; opacity: 0.7;"></i>
                </div>

            </div>
        </div>
        <div class="col-md-6 col-xl-4">
            <div class="card bg-secondary text-white mb-3">
                <div class="card-body justify-content-center align-items-center d-flex h-100" style="gap: 110px;">
                    <div>
                        <span class="text-white fw-bold" style="font-size: 44px;"><?= $pendaftar_laki2; ?></span>
                        <p class="card-text fs-6">Pendaftar Laki-laki</p>
                    </div>
                    <i class='bx bxs-bar-chart-alt-2' style="font-size: 70px; opacity: 0.7;"></i>
                </div>

            </div>
        </div>
        <div class="col-md-6 col-xl-4">
            <div class="card bg-danger text-white mb-3">
                <div class="card-body justify-content-center align-items-center d-flex h-100" style="gap: 110px;">
                    <div>
                        <span class="text-white fw-bold" style="font-size: 44px;"><?= $pendaftar_perempuan; ?></span>
                        <p class="card-text fs-6">Pendaftar Perempuan</p>
                    </div>
                    <i class='bx bxs-bar-chart-alt-2' style="font-size: 70px; opacity: 0.7;"></i>
                </div>

            </div>
        </div>
    </div>
    <!--/ Layout Demo -->

    <div class="row">
        <div class="col-md-3">
            <div class="card shadow-none bg-transparent border border-info mb-3">
                <div class="card-body">
                    <span class="card-title fw-bold fs-2 text-info">ZONASI</span>
                    <p class="card-text fs-4"><b class="fw-bold text-info"><?= $zonasi; ?></b> Pendaftar</p>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card shadow-none bg-transparent border border-primary mb-3">
                <div class="card-body">
                    <span class="card-title fw-bold fs-2 text-primary">AFIRMASI</span>
                    <p class="card-text fs-4"><b class="fw-bold text-primary"><?= $afirmasi; ?></b> Pendaftar</p>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card shadow-none bg-transparent border border-success mb-3">
                <div class="card-body">
                    <span class="card-title fw-bold fs-2 text-success">MUTASI</span>
                    <p class="card-text fs-4"><b class="fw-bold text-success"><?= $mutasi; ?></b> Pendaftar</p>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card shadow-none bg-transparent border border-warning mb-3">
                <div class="card-body">
                    <span class="card-title fw-bold fs-2 text-warning">PRESTASI</span>
                    <p class="card-text fs-4"><b class="fw-bold text-warning"><?= $prestasi; ?></b> Pendaftar</p>
                </div>
            </div>
        </div>
    </div>

</div>
<?= $this->endSection(); ?>