<nav class="site-nav bg-primary">
    <div class="container">
        <div class="menu-bg-wrap">
            <div class="site-navigation">
                <div class="row g-0 align-items-center">
                    <div class="col-3 d-lg-inline-flex d-none justify-content-center align-items-center gap-3">
                        <img src="<?= base_url(); ?>/assets/img/logo-smk.png" alt="logo-smk" class="logo_smk">
                        <a href="<?= base_url(''); ?>" class="logo m-0 float-start w-100">SMK NEGERI 1 BADAU</a>
                    </div>
                    <div class="col-3 d-flex justify-content-center align-items-center d-inline-block d-lg-none">
                        <img src="<?= base_url(); ?>/assets/img/logo-smk.png" alt="logo-smk" class="logo_smk_res">
                    </div>
                    <div class="col-7 text-lg-end text-center">
                        <div class="d-inline-flex d-lg-none justify-content-center align-items-center fw-bold">
                            <span class="text-white">SMK NEGERI 1 BADAU</span>
                        </div>

                        <ul class="js-clone-nav d-none d-lg-inline-block text-start site-menu mx-auto text-white">
                            <li class="<?= (isset($navbar_active) && $navbar_active == 'home') ? 'active' : '' ?>"><a
                                    href="<?= base_url(''); ?>" class="fs-6 fw-bold">Home</a></li>
                            <li
                                class="<?= (isset($navbar_active) && $navbar_active == 'pengumuman') ? 'active' : '' ?>">
                                <a href="<?= base_url('user-pengumuman'); ?>" class="fs-6 fw-bold">Pengumuman</a>
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
                            <li class="<?= (isset($navbar_active) && $navbar_active == 'ppdb') ? 'active' : '' ?>"><a
                                    href="<?= base_url('user-ppdb'); ?>" class="fs-6 fw-bold">PPDB</a></li>
                            <?php } else {
                                null;
                            }
                            ?>
                            <!-- Menu Dinamis -->
                            <?php foreach ($navigation as $menu) : ?>
                            <li
                                class="<?= (isset($menu) && isset($content) && $menu['id'] == $content['id_menu']) ? 'active' : '' ?>">
                                <a href="<?= base_url($menu['url']); ?>"
                                    class="fs-6 fw-bold"><?= $menu['nama_menu'] ?></a>
                            </li>
                            <?php endforeach; ?>
                            <!-- Menu Dinamis End -->
                            <?php if (in_groups('admin')) : ?>
                            <li><a href="<?= base_url('/admin') ?>" class="d-lg-none" class="fs-6 fw-bold">Admin</a>
                            </li>
                            <?php endif; ?>
                            <li><a href="<?= base_url('logout') ?>" class="d-lg-none" class="fs-6 fw-bold">Logout</a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-2 text-center">
                        <a href="#"
                            class="burger ms-auto float-end site-menu-toggle js-menu-toggle d-inline-block d-lg-none light">
                            <span></span>
                        </a>

                        <div class="d-none d-lg-inline-flex justify-content-center align-items-center gap-2">
                            <ul class="navbar-nav">
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle text-white" href="#"
                                        id="navbarDarkDropdownMenuLink" role="button" data-bs-toggle="dropdown"
                                        aria-expanded="false">
                                        <?php if (user() !== null) { ?>
                                        <?= user()->username; ?>
                                        <?php } else { ?>
                                        ---------------
                                        <?php } ?>
                                    </a>
                                    <ul class="dropdown-menu dropdown-menu-dark"
                                        aria-labelledby="navbarDarkDropdownMenuLink">
                                        <?php if (in_groups('admin')) : ?>
                                        <li><a class="dropdown-item" href="<?= base_url('/admin') ?>">Halaman Admin</a>
                                        </li>
                                        <?php endif; ?>
                                        <li><a class="dropdown-item" href="<?= base_url('logout') ?>">Logout</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</nav>