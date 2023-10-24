<nav class="site-nav bg-primary">
    <div class="container">
        <div class="menu-bg-wrap">
            <div class="site-navigation">
                <div class="row g-0 align-items-center">
                    <div class="col-3 d-lg-inline-flex d-none justify-content-center align-items-center gap-3">
                        <img src="<?= base_url(); ?>/assets/img/logo-smk.png" alt="logo-smk" class="logo_smk">
                        <a href="index.html" class="logo m-0 float-start w-100">SMK NEGERI 1 BADAU</a>
                    </div>
                    <div class="col-3 d-flex justify-content-center align-items-center d-inline-block d-lg-none">
                        <img src="<?= base_url(); ?>/assets/img/logo-smk.png" alt="logo-smk" class="logo_smk_res">
                    </div>
                    <div class="col-7 text-lg-end text-center">
                        <div class="d-inline-flex d-lg-none justify-content-center align-items-center fw-bold">
                            <span class="text-white">SMK NEGERI 1 BADAU</span>
                        </div>

                        <ul class="js-clone-nav d-none d-lg-inline-block text-start site-menu mx-auto text-white">
                            <li class="<?= (isset($navbar_active) && $navbar_active == 'home') ? 'active' : '' ?>"><a href="<?= url_to('landing-page'); ?>" class="fs-6 fw-bold">Home</a></li>
                            <li class="<?= (isset($navbar_active) && $navbar_active == 'pengumuman') ? 'active' : '' ?>">
                                <a href="<?= url_to('pengumuman'); ?>" class="fs-6 fw-bold">Pengumuman</a>
                            </li>
                            <!-- Pengkondisian PPDB Menu -->
                            <?php
                            $isActiveExists = false;
                            foreach ($tahun_ajaran as $item) {
                                if ($item['is_active'] == 1) {
                                    $isActiveExists = true; // Ubah variabel pengecekan menjadi true jika ada elemen dengan is_active = 1
                                    break; // Hentikan iterasi jika sudah ditemukan elemen dengan is_active = 1
                                }
                            }

                            if ($isActiveExists) { ?>
                                <li class="<?= (isset($navbar_active) && $navbar_active == 'ppdb') ? 'active' : '' ?>"><a href="<?= url_to('ppdb') ?>" class="fs-6 fw-bold">PPDB</a></li>
                            <?php } else {
                                null;
                            }
                            ?>
                            <li><a href="<?= url_to('login') ?>" class="d-lg-none fs-6 fw-bold">Login</a>
                            </li>
                            <li><a href="<?= url_to('register') ?>" class="d-lg-none fs-6 fw-bold">Register</a></li>
                        </ul>
                    </div>
                    <div class="col-2 text-center">
                        <a href="#" class="burger ms-auto float-end site-menu-toggle js-menu-toggle d-inline-block d-lg-none light">
                            <span></span>
                        </a>

                        <div class="d-none d-lg-inline-flex justify-content-center align-items-center gap-2">
                            <a href="<?= url_to('login') ?>" class="fw-bold btn btn-outline-light py-2">Login</a>
                            <a href="<?= url_to('register') ?>" class="fw-bold btn btn-outline-light py-2">Register</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</nav>