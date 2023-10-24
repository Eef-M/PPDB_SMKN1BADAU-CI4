<?= $this->extend('auth/templates/index'); ?>

<?= $this->section('auth-content') ?>
<div class="container-xxl">
    <div class="authentication-wrapper authentication-basic container-p-y">
        <div class="authentication-inner">
            <!-- Register -->
            <div class="card">
                <div class="card-body">
                    <!-- Logo -->
                    <div class="d-flex justify-content-center align-items-center login-head rounded-2 py-3 gap-2">
                        <img src="<?= base_url(); ?>/assets/img/logo-smk.png" alt="logo-smk" class="logo_smk">
                        <div class="d-flex justify-content-center align-items-start flex-column">
                            <div class="fs-3 fw-bold text-white">PPDB</div>
                            <div class="fs-6 fw-bold text-white">SMK NEGERI 1 BADAU</div>
                        </div>
                    </div>
                    <!-- /Logo -->
                    <div class="d-flex justify-content-center align-items-center flex-column my-3">
                        <div class="fs-2 fw-bold"><?= lang('Auth.loginTitle') ?></div>
                    </div>

                    <?= view('Myth\Auth\Views\_message_block') ?>

                    <!-- <form id="formAuthentication" class="mb-3" action="index.html" method="POST"> -->
                    <form action="<?= url_to('login') ?>" method="post" id="formAuthentication" class="mb-3">
                        <?= csrf_field() ?>

                        <!-- <div class="mb-3">
                            <label for="nisn" class="form-label fs-6">NISN</label>
                            <input type="text" class="form-control" id="nisn" name="nisn" placeholder="Masukkan NISN Anda" autofocus />
                        </div> -->
                        <?php if ($config->validFields === ['email']) : ?>
                            <div class="mb-3">
                                <label for="email" class="form-label fs-6">Email</label>
                                <input type="text" class="form-control <?php if (session('errors.login')) : ?>is-invalid<?php endif ?>" id="email" name="login" placeholder="Masukkan Email Anda" autofocus />
                                <div class="invalid-feedback">
                                    <?= session('errors.login') ?>
                                </div>
                            </div>
                        <?php else : ?>
                            <div class="mb-3">
                                <label for="nisn" class="form-label fs-6">NISN</label>
                                <input type="text" class="form-control <?php if (session('errors.login')) : ?>is-invalid<?php endif ?>" id="nisn" name="login" placeholder="Masukkan NISN Anda" autofocus />
                                <div class="invalid-feedback">
                                    <?= session('errors.login') ?>
                                </div>
                            </div>
                        <?php endif; ?>

                        <div class="mb-3 form-password-toggle">
                            <div class="d-flex justify-content-between">
                                <label class="form-label fs-6" for="password">NIK</label>
                            </div>
                            <div class="input-group input-group-merge">
                                <input type="password" id="password" class="form-control <?php if (session('errors.password')) : ?>is-invalid<?php endif ?>" name="password" placeholder="Masukkan NIK Anda" aria-describedby="password" />
                                <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                            </div>
                            <div class="invalid-feedback">
                                <?= session('errors.password') ?>
                            </div>
                        </div>
                        <div class="my-4">
                            <button class="btn warna-primary d-grid w-100" type="submit"><?= lang('Auth.loginAction') ?></button>
                        </div>
                    </form>

                    <p class="text-center">
                        <span>Belum registrasi?</span>
                        <a href="<?= url_to('register') ?>">
                            <span>Registrasi</span>
                        </a>
                    </p>
                </div>
            </div>
            <!-- /Register -->
        </div>
    </div>
</div>
<?= $this->endSection(''); ?>