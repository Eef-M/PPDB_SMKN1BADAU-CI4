<?= $this->extend('landing_page/templates/index') ?>

<?= $this->section('landing-page-content') ?>
<style>
.singkat {
    overflow: hidden;
    text-overflow: ellipsis;
    white-space: nowrap;
    width: 400px;
    /* Ubah angka ini sesuai dengan jumlah karakter yang ingin ditampilkan */
}

.carousel-image {
    object-fit: cover;
    width: 100%;
    height: 400px;
    /* Sesuaikan ukuran tinggi gambar sesuai kebutuhan */
}

.carousel-zoom {
    animation: zoomInOut 8s infinite;
}

.desk {
    text-shadow:
        -1px -1px 0 #000,
        1px -1px 0 #000,
        -1px 1px 0 #000,
        1px 1px 0 #000;

}

@keyframes zoomInOut {
    0% {
        transform: scale(1);
    }

    50% {
        transform: scale(1.2);
    }

    100% {
        transform: scale(1);
    }
}
</style>
<div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-indicators">
        <?php foreach ($slideshow as $index => $slide) : ?>
        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="<?= $index ?>"
            class="<?= $index === 0 ? 'active' : '' ?>" aria-current="<?= $index === 0 ? 'true' : 'false' ?>"
            aria-label="Slide <?= $slide['id'] ?>"></button>
        <?php endforeach; ?>
    </div>
    <div class="carousel-inner">
        <?php foreach ($slideshow as $index => $slide) : ?>
        <div class="carousel-item <?= $index === 0 ? 'active' : '' ?>">
            <img src="<?= base_url('uploads/slideshow/' . $slide['gambar']) ?>"
                class="d-block w-100 carousel-image carousel-zoom" alt="Slide <?= $slide['id'] ?>">
            <div class="carousel-caption d-none d-md-block">
                <h5 class="desk"><?= $slide['judul'] ?></h5>
                <p class="desk"><?= $slide['deskripsi'] ?></p>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
</div>

<div class="container py-4">
    <div class="row posts-entry">
        <div class="col-lg-12">
            <div class="d-flex justify-content-center align-items-center w-100">
                <span class="text-primary fw-bold fs-3">Pengumuman</span>
            </div>
            <hr class="hr" />
            <?php if(empty($data_siswa)) { ?>
                <div class="d-flex justify-content-center align-items-center w-100">
                    <span class="text-black fw-bold fs-4">Tidak Ada Pengumuman</span>
                </div>  
            <?php } else { ?>
                <div class="mt-3 mb-5">
                    <div class="d-flex justify-content-center align-items-center w-100">
                    <span class="text-black fw-bold">CALON SISWA JURUSAN AKUNTANSI 2023/2024</span>
                    </div>  
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">NAMA</th>
                                <th scope="col">NISN</th>
                                <th scope="col">JK</th>
                                <th scope="col">JURUSAN</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row">1</th>
                                <td>Mark</td>
                                <td>Otto</td>
                                <td>@mdo</td>
                                <td>@mdo</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="mb-5">
                    <div class="d-flex justify-content-center align-items-center w-100">
                    <span class="text-black fw-bold">CALON SISWA JURUSAN MULTIMEDIA 2023/2024</span>
                    </div>  
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">NAMA</th>
                                <th scope="col">NISN</th>
                                <th scope="col">JK</th>
                                <th scope="col">JURUSAN</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row">1</th>
                                <td>Mark</td>
                                <td>Otto</td>
                                <td>@mdo</td>
                                <td>@mdo</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="mb-5">
                    <div class="d-flex justify-content-center align-items-center w-100">
                    <span class="text-black fw-bold">CALON SISWA JURUSAN PEMASARAN 2023/2024</span>
                    </div>  
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">NAMA</th>
                                <th scope="col">NISN</th>
                                <th scope="col">JK</th>
                                <th scope="col">JURUSAN</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row">1</th>
                                <td>Mark</td>
                                <td>Otto</td>
                                <td>@mdo</td>
                                <td>@mdo</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            <?php } ?>
        </div>
    </div>
</div>

<div class="bg-primary py-5 px-5">
    <div class="row">
        <div class="col-md-12 col-sm-12">
            <div class="embed-responsive embed-responsive-16by9">
                <iframe class="embed-responsive-item"
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d19511.395686939824!2d107.78447917949308!3d-2.8171834916957987!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e1724e8174f6c3f%3A0x806370b57f48f20a!2sSMKN%201%20BADAU.!5e0!3m2!1sen!2sid!4v1688116814543!5m2!1sen!2sid"
                    style="border:0; width: 100%; height: 400px;" allowfullscreen="" loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>