<?= $this->extend('admin/templates/index') ?>

<?= $this->section('admin-content') ?>
<div class="container-fluid flex-grow-1 container-p-y">

    <div class="d-flex justify-content-start align-items-center w-100 gap-2">
        <a href="<?= base_url('user-account') ?>"
            class="btn btn-dark d-flex justify-content-center align-items-center gap-1">
            <i class='bx bx-left-arrow-alt'></i>
            <span>Kembali</span>
        </a>
        <div class="w-100 bg-secondary rounded" style="height: 2px;"></div>
    </div>
    <!-- Form -->
    <div class="d-flex justify-content-center align-items-center my-3">
        <div class="card w-100 bg-white">
            <!-- <span class="text-center mt-4 fs-3 fw-bold text-dark">TAMBAH TAHUN AJARAN</span> -->
            <span class="badge bg-label-dark text-center mt-4 fs-3 fw-bold text-dark">TAMBAH USER</span>
            <hr class="hr mx-4" />
            <div class="card-body">
                <?= view('Myth\Auth\Views\_message_block') ?>

                <!-- <form id="formAuthentication" class="mb-3" action="index.html" method="POST"> -->
                <form action="<?= url_to('register') ?>" method="post" id="formAuthentication" class="mb-3">
                    <?= csrf_field() ?>
                    <div class="mb-3">
                        <label for="nisn" class="form-label fs-6">Role:</label>
                        <select name="role" class="form-control">
                            <option value="admin">Admin</option>
                            <option value="user">User</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="nisn" class="form-label fs-6">Nomor Telepon/NISN</label>
                        <input type="number"
                            class="form-control <?php if (session('errors.nisn')) : ?>is-invalid<?php endif ?>"
                            id="nisn" name="nisn" placeholder="Masukkan Nomor Telepon" autofocus
                            value="<?= old('nisn') ?>" />
                    </div>
                    <div class=" mb-3">
                        <label for="email" class="form-label fs-6">Email</label>
                        <input type="text"
                            class="form-control <?php if (session('errors.email')) : ?>is-invalid<?php endif ?>"
                            id="email" name="email" placeholder="Masukkan Email Anda" autofocus
                            value="<?= old('email') ?>" />
                        <small id="emailHelp" class="form-text text-muted"><?= lang('Auth.weNeverShare') ?></small>
                    </div>
                    <div class="mb-3">
                        <label for="username" class="form-label fs-6">Nama Lengkap</label>
                        <input type="text"
                            class="form-control <?php if (session('errors.username')) : ?>is-invalid<?php endif ?>"
                            id="username" name="username" placeholder="Masukkan Nama Lengkap Anda" autofocus
                            value="<?= old('username') ?>" />
                    </div>
                    <div class=" mb-3 form-password-toggle">
                        <div class="d-flex justify-content-between">
                            <label class="form-label fs-6" for="password">Password/NIK</label>
                        </div>
                        <div class="input-group input-group-merge">
                            <input type="password" id="password"
                                class="form-control <?php if (session('errors.password')) : ?>is-invalid<?php endif ?>"
                                name="password" placeholder="Masukkan Password" aria-describedby="password"
                                autocomplete="off" />
                            <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                        </div>
                    </div>
                    <div class="mb-3 form-password-toggle">
                        <div class="input-group input-group-merge mt-3">
                            <input type="password" id="RepeatPassword"
                                class="form-control <?php if (session('errors.pass_confirm')) : ?>is-invalid<?php endif ?>"
                                name="pass_confirm" placeholder="Ulangi Password/NIK" aria-describedby="RepeatPassword"
                                autocomplete="off" />
                            <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                        </div>
                    </div>
                    <div class="my-4">
                        <button class="btn btn-primary d-grid w-100" type="submit">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!--/ Form -->
</div>
<?= $this->endSection(); ?>