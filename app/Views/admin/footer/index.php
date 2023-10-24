<?= $this->extend('admin/templates/index') ?>

<?= $this->section('admin-content') ?>
<div class="container-fluid flex-grow-1 container-p-y">
    <!-- Layout Demo -->
    <div class="card mb-3">
        <div class="card-body flex-column d-flex gap-3 ">
            <h5 class="card-title">Data Footer</h5>
            <?php if (empty($footer)) { ?>
                <div class="d-flex justify-content-end align-items-center w-100">
                    <a href="<?= base_url('footer-tambah') ?>" class="btn btn-primary d-flex justify-content-center align-items-center gap-2">
                        <i class='bx bx-plus-circle'></i>
                        <span class="d-lg-inline-block d-none">Tambah Footer</span>
                    </a>
                </div>
            <?php } else {
                null;
            } ?>
            <?php
            if (session()->getFlashdata('status')) {
                echo session()->getFlashdata('status');
            }
            ?>
            <div class="table-responsive text-nowrap">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Nama</th>
                            <th>Desk/Link</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (empty($footer)) { ?>
                            <tr>
                                <td colspan="9" class="text-center py-5 fs-4 text-dark">TIDAK ADA DATA</td>
                            </tr>
                        <?php } else { ?>
                            <?php foreach ($footer as $item) : ?>
                                <tr>
                                    <td class="fw-bold">Profile</td>
                                    <td class="text-wrap" style="text-align: justify;"><?= $item['profile'] ?></td>
                                </tr>
                                <tr>
                                    <td class="fw-bold">Phone</td>
                                    <td class="text-wrap" style="text-align: justify;"><?= $item['phone'] ?></td>
                                </tr>
                                <tr>
                                    <td class="fw-bold">Email</td>
                                    <td class="text-wrap" style="text-align: justify;"><?= $item['email'] ?></td>
                                </tr>
                                <tr>
                                    <td class="fw-bold">Alamat</td>
                                    <td class="text-wrap" style="text-align: justify;"><?= $item['alamat'] ?></td>
                                </tr>
                                <tr>
                                    <td class="fw-bold">Instagram</td>
                                    <td class="text-wrap" style="text-align: justify;"><?= $item['ig'] ?></td>
                                </tr>
                                <tr>
                                    <td class="fw-bold">Facebook</td>
                                    <td class="text-wrap" style="text-align: justify;"><?= $item['fb'] ?></td>
                                </tr>
                                <tr>
                                    <td colspan="2">
                                        <a href="#" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modalCenter<?= $item['id'] ?>">HAPUS FOOTER</a>
                                    </td>
                                </tr>

                                <!-- Modal -->
                                <div class="modal fade" id="modalCenter<?= $item['id'] ?>" tabindex="-1" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <form action="<?= base_url('footer/delete/' . $item['id']) ?>" method="POST">
                                            <input type="hidden" name="_method" value="DELETE">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="modalCenterTitle">Apakah Yakin ?</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body text-wrap">
                                                    <span>Ingin menghapus Footer ini ?</span>
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
                            <?php endforeach ?>
                        <?php } ?>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!--/ Layout Demo -->
</div>
<?= $this->endSection(); ?>