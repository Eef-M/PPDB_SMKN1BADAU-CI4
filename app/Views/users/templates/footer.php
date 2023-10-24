<footer class="site-footer bg-primary py-4 px-5" id='footer'>
    <?php if (empty($footer)) { ?>
    <div class="row">
        <div class="col-md-6 col-sm-12">
            <div class="fs-3">Profile</div>
            <p style="text-align: justify;">Belum di isi</p>
        </div>
        <div class="col-md-6 col-sm-12">
            <div class="fs-3">Informasi Kontak</div>
            <div class="my-2">
                Belum di isi
            </div>
            <div><i class="fa-solid fa-phone"></i> Belum di isi</div>
            <div><i class="fa-solid fa-envelope"></i> Belum di isi</div>

            <div class="d-flex justify-content-start align-items-center gap-2 mt-3">
                <a href="#">
                    <i class="fa-brands fa-instagram fs-4" style="color:deeppink;"></i>
                </a>
                <a href="#">
                    <i class="fa-brands fa-facebook fs-4" style="color:dodgerblue"></i>
                </a>
            </div>
        </div>
    </div>
    <?php } else { ?>
    <?php foreach ($footer as $row) ?>
    <div class="row">
        <div class="col-md-6 col-sm-12">
            <div class="fs-3">Profile</div>
            <p style="text-align: justify;"><?= $row['profile'] ?></p>
        </div>
        <div class="col-md-6 col-sm-12">
            <div class="fs-3">Informasi Kontak</div>
            <div class="my-2">
                <?= $row['alamat'] ?>
            </div>
            <div><i class="fa-solid fa-phone"></i> <?= $row['phone'] ?></div>
            <div><i class="fa-solid fa-envelope"></i> <?= $row['email'] ?></div>

            <div class="d-flex justify-content-start align-items-center gap-2 mt-3">
                <a href="<?= $row['ig'] ?>">
                    <i class="fa-brands fa-instagram fs-4" style="color:deeppink;"></i>
                </a>
                <a href="<?= $row['fb'] ?>">
                    <i class="fa-brands fa-facebook fs-4" style="color:dodgerblue"></i>
                </a>
            </div>
        </div>
    </div>
    <?php } ?>
</footer>
<div class="row bg-dark py-4 px-5 text-white">
    <div class="col-md-6 col-sm-12 text-sm-center text-md-start">
        Website PPDB SMKN 1 BADAU
    </div>
    <div class="col-md-6 col-sm-12 text-sm-center text-md-end">
        <span>Copyright &copy;<script>
            document.write(new Date().getFullYear());
            </script>. All Rights Reserved.</span>
    </div>
</div>