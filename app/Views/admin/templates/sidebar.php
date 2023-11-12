<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <div class="app-brand demo">
        <a href="#" class="app-brand-link">
            <img src="<?= base_url(); ?>/assets/img/logo-smk.png" alt="logo_smk" style="height: 40px; width: 43px;">
            <span class="app-brand-text fw-bold ms-1 text-black fs-6">SMK NEGERI 1 BADAU</span>
        </a>

        <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
            <i class="bx bx-chevron-left bx-sm align-middle"></i>
        </a>
    </div>

    <div class="menu-inner-shadow"></div>

    <ul class="menu-inner py-1">
        <!-- Dashboard -->
        <li class="menu-item <?= (isset($sidebar_active) && $sidebar_active == 'dashboard') ? 'active' : '' ?>">
            <a href="<?= base_url('admin/index') ?>" class="menu-link">
                <i class="menu-icon tf-icons bx bxs-home-circle"></i>
                <div data-i18n="Analytics">Dashboard</div>
            </a>
        </li>

        <li class="menu-item <?= (isset($sidebar_active) && $sidebar_active == 'tahun_ajaran') ? 'active' : '' ?>">
            <a href="<?= base_url('tahun_ajaran') ?>" class="menu-link">
                <i class="menu-icon tf-icons bx bxs-calendar"></i>
                <div data-i18n="Analytics">Tahun Ajaran</div>
            </a>
        </li>

        <li class="menu-item <?= (isset($sidebar_active) && $sidebar_active == 'jurusan') ? 'active' : '' ?>">
            <a href="<?= base_url('jurusan') ?>" class="menu-link">
                <i class="menu-icon tf-icons bx bxs-graduation"></i>
                <div data-i18n="Analytics">Jurusan</div>
            </a>
        </li>

        <li class="menu-item <?= (isset($sidebar_active) && $sidebar_active == 'jadwal') ? 'active' : '' ?>">
            <a href="<?= base_url('penjadwalan') ?>" class="menu-link">
                <i class="menu-icon tf-icons bx bx-calendar"></i>
                <div data-i18n="Analytics">Penjadwalan</div>
            </a>
        </li>

        <li class="menu-item <?= (isset($sidebar_active) && ($sidebar_active == 'data_siswa' || $sidebar_active == 'bobot_siswa')) ? 'active open' : '' ?>">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bxs-user-rectangle"></i>
                <div data-i18n="Account Settings">Siswa</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item <?= (isset($sidebar_active) && $sidebar_active == 'data_siswa') ? 'active' : '' ?>">
                    <a href="<?= base_url('siswa') ?>" class="menu-link">
                        <div data-i18n="Account">Data Siswa</div>
                    </a>
                </li>
                <li class="menu-item <?= (isset($sidebar_active) && $sidebar_active == 'bobot_siswa') ? 'active' : '' ?>">
                    <a href="<?= base_url('siswa-bobot') ?>" class="menu-link">
                        <div data-i18n="Connections">Bobot Siswa</div>
                    </a>
                </li>
            </ul>
        </li>

        <li class="menu-header small text-uppercase"><span class="menu-header-text">Websites</span></li>

        <!-- <li class="menu-item <?= (isset($sidebar_active) && $sidebar_active == 'pengumuman') ? 'active' : '' ?>">
            <a href="<?= base_url('admin-pengumuman') ?>" class="menu-link">
                <i class="menu-icon tf-icons bx bxs-chalkboard"></i>
                <div data-i18n="Basic">Pengumuman</div>
            </a>
        </li> -->
        <li class="menu-item <?= (isset($sidebar_active) && ($sidebar_active == 'navigation' || $sidebar_active == 'content' || $sidebar_active == 'slideshow' || $sidebar_active == 'user_account' || $sidebar_active == 'footer')) ? 'active open' : '' ?>">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bxs-cog"></i>
                <div data-i18n="Basic">Pengaturan</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item <?= (isset($sidebar_active) && $sidebar_active == 'navigation') ? 'active' : '' ?>">
                    <a href="<?= base_url('navigation') ?>" class="menu-link">
                        <div data-i18n="Account">Navigation</div>
                    </a>
                </li>
                <!-- <li class="menu-item <?= (isset($sidebar_active) && $sidebar_active == 'content') ? 'active' : '' ?>">
                    <a href="<?= base_url('content') ?>" class="menu-link">
                        <div data-i18n="Notifications">Content</div>
                    </a>
                </li> -->
                <li class="menu-item <?= (isset($sidebar_active) && $sidebar_active == 'slideshow') ? 'active' : '' ?>">
                    <a href="<?= base_url('slideshow') ?>" class="menu-link">
                        <div data-i18n="Notifications">Slideshow</div>
                    </a>
                </li>
                <li class="menu-item <?= (isset($sidebar_active) && $sidebar_active == 'footer') ? 'active' : '' ?>">
                    <a href="<?= base_url('footer') ?>" class="menu-link">
                        <div data-i18n="Notifications">Footer</div>
                    </a>
                </li>
                <li class="menu-item <?= (isset($sidebar_active) && $sidebar_active == 'user_account') ? 'active' : '' ?>">
                    <a href="<?= base_url('user-account') ?>" class="menu-link">
                        <div data-i18n="Notifications">User Account</div>
                    </a>
                </li>
            </ul>
        </li>

        <li class="menu-header small text-uppercase"><span class="menu-header-text">Lainnya</span></li>

        <li class="menu-item">
            <a href="<?= base_url('logout') ?>" class="menu-link">
                <i class="menu-icon tf-icons bx bx-power-off"></i>
                <div data-i18n="Basic">Log Out</div>
            </a>
        </li>
    </ul>
</aside>