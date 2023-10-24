<?= $this->extend('admin/templates/index') ?>

<?= $this->section('admin-content') ?>
<div class="container-fluid flex-grow-1 container-p-y">
    <!-- Layout Demo -->
    <div class="card mb-3">
        <div class="card-body flex-column d-flex gap-3 ">
            <h5 class="card-title">User Account</h5>
            <div class="d-flex justify-content-end align-items-center w-100">
                <a href="<?= base_url('user-account/tambah') ?>"
                    class="btn btn-primary d-flex justify-content-center align-items-center gap-2">
                    <i class='bx bx-plus-circle'></i>
                    <span class="d-lg-inline-block d-none">Tambah User</span>
                </a>
            </div>
            <?php
            if (session()->getFlashdata('status')) {
                echo session()->getFlashdata('status');
            }
            ?>
            <div class="table-responsive text-nowrap">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Nomor Telepon</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (empty($users)) { ?>
                        <tr>
                            <td colspan="5" class="text-center py-5 fs-4 text-dark">TIDAK ADA DATA</td>
                        </tr>
                        <?php } else {
                            $no = 1;
                            foreach ($users as $user) : ?>
                        <?php if ($user->name == 'admin') { ?>
                        <tr>
                            <td><?= $no; ?></td>
                            <td><?= $user->username; ?></td>
                            <td><?= $user->email; ?></td>
                            <td><?= $user->nisn; ?></td>
                            <td>
                                <?php if (user()->id == $user->userid) { ?>
                                <span class="badge bg-label-info fs-5 w-100 py-3">Anda Sedang Login</span>
                                <?php } else { ?>
                                <a href="#"
                                    class="btn btn-danger w-100 d-flex justify-content-center align-items-center gap-2"
                                    data-bs-toggle="modal" data-bs-target="#modalCenter<?= $user->userid; ?>">
                                    <i class='bx bx-trash fs-3'></i>
                                    <span class="fs-6 fw-bold">Hapus</span>
                                </a>
                                <?php } ?>
                            </td>
                        </tr>

                        <!-- Modal -->
                        <div class="modal fade" id="modalCenter<?= $user->userid; ?>" tabindex="-1" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <form action="<?= base_url('user-account/delete/' . $user->userid) ?>" method="POST">
                                    <input type="hidden" name="_method" value="DELETE">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="modalCenterTitle">Apakah Yakin ?</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body text-wrap">
                                            <span>Ingin menghapus User dengan nama:</span>
                                            <span class="fw-bold text-danger"><?= $user->username; ?></span>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                                                Tidak
                                            </button>
                                            <button type="submit" class="btn btn-danger">Ya</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <!-- End Modal -->
                        <?php } else {
                                    null;
                                } ?>

                        <?php $no++;
                            endforeach;
                        } ?>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!--/ Layout Demo -->
</div>
<?= $this->endSection(); ?>