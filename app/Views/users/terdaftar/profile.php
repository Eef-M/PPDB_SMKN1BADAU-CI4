<div class="">

    <?php if ($profile['status'] == 0) { ?>
        <div class="alert alert-danger fs-5 text-center mb-4">Anda Belum Terverifikasi</div>
    <?php } else { ?>
        <div class="alert alert-success fs-5 text-center mb-4">Anda Sudah Terverifikasi</div>
    <?php } ?>

    <div class="row">
        <div class="col-md-4 text-center mb-3">
            <?php foreach ($berkas as $item) : ?>
                <img src="<?= base_url('uploads/berkas_siswa/' . $item['foto']); ?>" alt="foto" class="img-thumbnail" width="250">
            <?php endforeach; ?>
        </div>
        <div class="col-md-8">
            <div class="card p-2">
                <div class="row">
                    <div class="col-md-5">
                        1. Tanggal Pendaftaran
                    </div>
                    <div class="col-md-7 fw-bold">
                        <?= $profile['tanggal_pendaftaran'] ?>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-md-5">
                        2. NISN
                    </div>
                    <div class="col-md-7 fw-bold">
                        <?= $profile['nisn'] ?>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-md-5">
                        3. Nama Siswa
                    </div>
                    <div class="col-md-7 fw-bold">
                        <?= strtoupper($profile['nama_siswa']) ?>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-md-5">
                        4. Nomor Induk Kependudukan (NIK)
                    </div>
                    <div class="col-md-7 fw-bold">
                        <?= $profile['nik'] ?>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-md-5">
                        5. Jenis Kelamin
                    </div>
                    <div class="col-md-7 fw-bold">
                        <?= strtoupper($profile['jenis_kelamin']) ?>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-md-5">
                        6. Tempat Lahir
                    </div>
                    <div class="col-md-7 fw-bold">
                        <?= strtoupper($profile['tempat_lahir']) ?>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-md-5">
                        7. Tanggal Lahir
                    </div>
                    <div class="col-md-7 fw-bold">
                        <?= $profile['tanggal_lahir'] ?>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-md-5">
                        8. Agama
                    </div>
                    <div class="col-md-7 fw-bold">
                        <?= strtoupper($profile['agama']) ?>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-md-5">
                        9. Status Dalam Keluarga
                    </div>
                    <div class="col-md-7 fw-bold">
                        <?= strtoupper($profile['status_dlm_kel']) ?>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-md-5">
                        10. Alamat Tempat Tinggal
                    </div>
                    <div class="col-md-7 fw-bold">
                        <?= strtoupper($profile['alamat']) ?>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-md-5">
                        11. RT
                    </div>
                    <div class="col-md-7 fw-bold">
                        <?= $profile['rt'] ?>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-md-5">
                        12. RW
                    </div>
                    <div class="col-md-7 fw-bold">
                        <?= $profile['rw'] ?>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-md-5">
                        13. Kelurahan
                    </div>
                    <div class="col-md-7 fw-bold">
                        <?= strtoupper($profile['kelurahan']) ?>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-md-5">
                        14. Kecamatan
                    </div>
                    <div class="col-md-7 fw-bold">
                        <?= strtoupper($profile['kecamatan']) ?>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-md-5">
                        15. Kabupaten/Kota
                    </div>
                    <div class="col-md-7 fw-bold">
                        <?= strtoupper($profile['kab_kota']) ?>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-md-5">
                        16. Provinsi
                    </div>
                    <div class="col-md-7 fw-bold">
                        <?= strtoupper($profile['provinsi']) ?>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-md-5">
                        17. Telepon/No. HP Siswa
                    </div>
                    <div class="col-md-7 fw-bold">
                        <?= $profile['nohp_siswa'] ?>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-md-5">
                        18. Nama Ayah
                    </div>
                    <div class="col-md-7 fw-bold">
                        <?= strtoupper($profile['nama_ayah']) ?>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-md-5">
                        19. No. NIK Ayah
                    </div>
                    <div class="col-md-7 fw-bold">
                        <?= $profile['nik_ayah'] ?>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-md-5">
                        20. Nama Ibu
                    </div>
                    <div class="col-md-7 fw-bold">
                        <?= strtoupper($profile['nama_ibu']) ?>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-md-5">
                        21. No. NIK Ibu
                    </div>
                    <div class="col-md-7 fw-bold">
                        <?= $profile['nik_ibu'] ?>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-md-5">
                        22. Telepon/No. HP Ayah/Ibu
                    </div>
                    <div class="col-md-7 fw-bold">
                        <?= $profile['nohp_ortu'] ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>