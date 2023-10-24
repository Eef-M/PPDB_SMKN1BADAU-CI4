<?= $this->extend('landing_page/templates/index') ?>

<?= $this->section('landing-page-content') ?>
<!-- Start retroy layout blog posts -->
<section class="section bg-light" style="min-height: 60%">
    <div class="container">
        <div class="row align-items-stretch retro-layout">
            <div class="col-md-12">
                <div class="d-flex justify-content-center align-items-center w-100 mb-3 h-100">
                    <span class="fs-3 text-dark fw-bold">Untuk mendaftar PPDB Online anda harus Login/Registrasi
                        terlebih dahulu</span>

                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 text-md-end mb-3">
                <a href="<?= url_to('login') ?>" class="btn btn-info fw-bold">Login</a>
            </div>
            <div class="col-md-6 text-md-start">
                <a href="<?= url_to('register') ?>" class="btn btn-info fw-bold">Register</a>
            </div>
        </div>
    </div>
</section>
<?= $this->endSection(); ?>