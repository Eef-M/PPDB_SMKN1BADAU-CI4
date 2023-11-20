<?= $this->extend('users/templates/index') ?>

<?= $this->section('user-content') ?>
<div class="row" style="min-height: 82vh;">
    <div class="col-md-12">
        <div class="container mt-2">
            <span class="text-dark fw-bold fs-2">Tata Cara PPDB</span>
            <hr>
            <?php if (empty($tata_cara)) : ?>
                <div class="d-flex justify-content-center align-items-center w-100">
                    <span class="text-secondary fs-3">Tata Cara Belum Ada</span>
                </div>
            <?php else : ?>
                <?php foreach ($tata_cara as $row) : ?>
                    <div class="d-flex justify-content-start align-items-center w-100">
                        <span class="text-secondary fs-4" style="text-align: justify;"><?= nl2br($row['deskripsi']) ?></span>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>