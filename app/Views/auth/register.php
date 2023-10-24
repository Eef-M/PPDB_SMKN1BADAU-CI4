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
                        <div class="fs-2 fw-bold"><?= lang('Auth.register') ?></div>
                    </div>

                    <?= view('Myth\Auth\Views\_message_block') ?>

                    <!-- <form id="formAuthentication" class="mb-3" action="index.html" method="POST"> -->
                    <form action="<?= url_to('register') ?>" method="post" id="formAuthentication" class="mb-3">
                        <?= csrf_field() ?>
                        <input type="hidden" name="role" value="user">
                        <div class="mb-3">
                            <label for="nisn" class="form-label fs-6">NISN<span class="text-danger">*</span></label><br>
                            <span style="font-size: 12px;" class="fw-lighter text-danger">*Harus 10 Angka</span>
                            <input type="number"
                                class="form-control <?php if (session('errors.nisn')) : ?>is-invalid<?php endif ?>"
                                id="nisn" name="nisn" placeholder="Masukkan NISN Anda" autofocus
                                value="<?= old('nisn') ?>" />
                        </div>
                        <div class=" mb-3">
                            <label for="email" class="form-label fs-6">Email<span class="text-danger">*</span></label>
                            <input type="text"
                                class="form-control <?php if (session('errors.email')) : ?>is-invalid<?php endif ?>"
                                id="email" name="email" placeholder="Masukkan Email Anda" autofocus
                                value="<?= old('email') ?>" />
                            <!-- <small id="emailHelp" class="form-text text-muted"><?= lang('Auth.weNeverShare') ?></small> -->
                        </div>
                        <div class="mb-3">
                            <label for="username" class="form-label fs-6">Nama Lengkap<span class="text-danger">*</span></label>
                            <input type="text"
                                class="form-control <?php if (session('errors.username')) : ?>is-invalid<?php endif ?>"
                                id="username" name="username" placeholder="Masukkan Nama Lengkap Anda" autofocus
                                value="<?= old('username') ?>" />
                        </div>
                        <div class=" mb-3 form-password-toggle">
                            <div class="d-flex justify-content-between">
                                <label class="form-label fs-6" for="password">NIK<span class="text-danger">*</span></label>
                            </div>
                            <span style="font-size: 12px;" class="fw-lighter text-danger">*Harus 16 Angka</span>
                            <div class="input-group input-group-merge">
                                <input type="password" id="password"
                                    class="form-control <?php if (session('errors.password')) : ?>is-invalid<?php endif ?>"
                                    name="password" placeholder="Masukkan NIK Anda" aria-describedby="password"
                                    autocomplete="off" />
                                <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                            </div>
                        </div>
                        <div class="mb-3 form-password-toggle">
                            <div class="input-group input-group-merge mt-3">
                                <input type="password" id="RepeatPassword"
                                    class="form-control <?php if (session('errors.pass_confirm')) : ?>is-invalid<?php endif ?>"
                                    name="pass_confirm" placeholder="Ulangi NIK Anda" aria-describedby="RepeatPassword"
                                    autocomplete="off" />
                                <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                            </div>
                        </div>
                        <div class="my-4">
                            <button class="btn warna-primary d-grid w-100"
                                type="submit"><?= lang('Auth.register') ?></button>
                        </div>
                    </form>

                    <p class="text-center">
                        <span>Sudah registrasi?</span>
                        <a href="<?= url_to('login') ?>">
                            <span>Login</span>
                        </a>
                    </p>
                </div>
            </div>
            <!-- /Register -->
        </div>
    </div>
</div>
<?= $this->endSection(''); ?>