<?= $this->extend('users/templates/index') ?>

<?= $this->section('user-content') ?>

<!-- Start retroy layout blog posts -->
<section class="section bg-light">
    <div class="container" style="min-height: 80vh;">
        <div class="row align-items-stretch retro-layout">
            <div class="col-md-12">
                <div class="d-flex justify-content-center align-items-center w-100 mb-3">
                    <span class="fs-3 text-dark fw-bold"><?= $pengumuman['judul'] ?></span>
                </div>
                <div class="d-flex justify-content-center align-items-center w-100 mb-3">
                    <div class="rounded overflow-hidden">
                        <img src="<?= base_url('uploads/pengumuman/' . $pengumuman['foto']) ?>" alt="hero" width="480">
                    </div>
                </div>
                <div class="d-flex justify-content-center align-items-center w-100 mb-3">
                    <p class="fs-5" style="text-align: justify;"><?= $pengumuman['isi'] ?></p>
                </div>
                <div class="d-flex justify-content-between align-items-center w-100 mb-3">
                    <a href="<?= base_url('user-pengumuman') ?>" class="btn btn-primary">Kembali</a>
                </div>
            </div>
        </div>
    </div>
</section>
<?= $this->endSection(); ?>