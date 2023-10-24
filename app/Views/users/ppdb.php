<?= $this->extend('users/templates/index') ?>

<?= $this->section('user-content') ?>
<div class="row" style="min-height: 82vh;">
    <div class="col-md-9">
        <div class="row justify-content-center align-items-center p-3">
            <div class="col-md-12 text-center">
                <span class="fw-bold fs-2 text-dark">Jalur Daftar</span><br>
                <?php foreach ($tahun_ajaran as $row) : ?>
                    <?php if ($row['is_active'] == 1) { ?>
                        <span class="fw-bold fs-5 text-dark">Tahun Ajaran <?= $row['tahun_ajaran']; ?></span>
                    <?php } else {
                        null;
                    } ?>
                <?php endforeach; ?>
            </div>
        </div>
        <div class="row justify-content-center align-items-start p-3">
            <div class="col-md-3">
                <a href="<?= base_url('user-tambah-zonasi') ?>">
                    <div class="card bg-info text-white text-center py-3 mb-3">
                        <div class="card-body">
                            <span class="fw-bold fs-3">ZONASI</span>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-md-3">
                <a href="<?= base_url('user-tambah-afirmasi') ?>">
                    <div class="card bg-secondary text-white text-center py-3 mb-3">
                        <div class="card-body">
                            <span class="fw-bold fs-3">AFIRMASI</span>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-md-3">
                <a href="<?= base_url('user-tambah-mutasi') ?>">
                    <div class="card bg-success text-white text-center py-3 mb-3">
                        <div class="card-body">
                            <span class="fw-bold fs-3">MUTASI</span>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-md-3">
                <a href="<?= base_url('user-tambah-prestasi') ?>">
                    <div class="card bg-warning text-white text-center py-3 mb-3">
                        <div class="card-body">
                            <span class="fw-bold fs-3">PRESTASI</span>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>
    <div class="col-sm-3 p-4" style="background-color: #EDEEF7;">
        <span class="badge bg-warning text-dark fs-6 mb-3">Jalur Daftar</span>
        <div class="card text-dark shadow-sm bg-white mb-3 w-100">
            <div class="card-body">
                <h5 class="card-title fw-bold text-info fs-3">Zonasi</h5>
                <p class="card-text" style="text-align: justify; font-size: 18px">
                    diperuntukkan bagi peserta didik yang berdomisili di dalam wilayah zonasi yang ditetapkan Pemerintah
                    Daerah.
                </p>
            </div>
        </div>
        <div class="card text-dark shadow-sm bg-white mb-3 w-100">
            <div class="card-body">
                <h5 class="card-title fw-bold text-secondary fs-3">Afirmasi</h5>
                <p class="card-text" style="text-align: justify; font-size: 18px">
                    diperuntukkan bagi peserta didik yang berasal dari keluarga ekonomi tidak mampu dan anak penyandang
                    disabilitas.
                </p>
            </div>
        </div>
        <div class="card text-dark shadow-sm bg-white mb-3 w-100">
            <div class="card-body">
                <h5 class="card-title fw-bold text-success fs-3">Mutasi</h5>
                <p class="card-text" style="text-align: justify; font-size: 18px">
                    diperuntukkan bagi peserta didik yang berpindah tempat karena hal yang tak bisa dipilih
                    (pekerjaan/tugas orangtua/ wali).
                </p>
            </div>
        </div>
        <div class="card text-dark shadow-sm bg-white mb-3 w-100">
            <div class="card-body">
                <h5 class="card-title fw-bold text-warning fs-3">Prestasi</h5>
                <p class="card-text" style="text-align: justify; font-size: 18px">
                    diperuntukkan bagi peserta didik berdasarkan prestasi akademik atau non-akademik yang telah dicapai.
                    Siswa yang memiliki prestasi yang tinggi dalam bidang akademik, olahraga, seni, atau bidang lainnya.
                </p>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>