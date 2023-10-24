<?= $this->extend('users/templates/index') ?>

<?= $this->section('user-content') ?>
<div style="min-height: 100vh;">
    <?php if(!empty($content)) : ?>
    <div class="site-cover site-cover-sm same-height overlay single-page "
        style="background-image: url('<?= base_url('uploads/content/'. $content['gambar']); ?>'); background-position: center; background-repeat: no-repeat; background-size: cover;">
        <div class="container">
            <div class="row same-height justify-content-center">
                <div class="col-md-6">
                    <div class="post-entry text-center">
                        <h1 class="mb-4"><?= $content['judul']; ?></h1>
                        <div class="post-meta align-items-center text-center">
                            <figure class="author-figure mb-0 me-3 d-inline-block"><img
                                    src="<?= base_url('uploads/content/'. $content['gambar']); ?>" alt="Image"
                                    class="img-fluid"></figure>
                            <span><?= $content['created_at']; ?></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Start retroy layout blog posts -->
    <section class="section">
        <div class="container">
            <div class="row align-items-stretch retro-layout">
                <div class="col-md-12">
                    <p class="text-dark fs-4" style="text-align: justify;"><?= $content['isi'] ?></p>

                </div>
            </div>
        </div>
    </section>
    <!-- End retroy layout blog posts -->
    <?php else : ?>
    <section class="section">
        <div class="container">
            <div class="row align-items-stretch retro-layout">
                <div class="col-md-12 text-center">
                    <span class="text-dark fs-1">Tidak Ada Konten</span>

                </div>
            </div>
        </div>
    </section>
    <?php endif; ?>
</div>
<?= $this->endSection(); ?>