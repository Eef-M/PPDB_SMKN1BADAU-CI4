<?= $this->extend('admin/templates/index') ?>

<?= $this->section('admin-content') ?>
<div class="container-fluid flex-grow-1 container-p-y">
    <!-- Layout Demo -->
    <div class="card mb-3">
        <div class="card-body flex-column d-flex justify-content-between align-items-center gap-2 ">
            <span class="fs-3 fw-bold text-center">NAVIGATION</span>
            <div class="bg-primary mb-2" style="height: 2px; width: 180px;"></div>
            <?php
            if (session()->getFlashdata('status')) {
                echo session()->getFlashdata('status');
            }
            ?>
            <div class="row w-100">
                <div class="col-md-6 mb-3">
                    <span class="fs-4 text-dark fw-bold">List Menu</span>
                    <hr class="hr" />
                    <div class="d-flex justify-content-between align-items-center bg-label-dark py-2 px-3 rounded mb-2">
                        <span class="text-dark fs-5 fw-bold">Home</span>
                        <span class="text-danger fs-5">Permanent Menu</span>
                    </div>
                    <div class="d-flex justify-content-between align-items-center bg-label-dark py-2 px-3 rounded mb-2">
                        <span class="text-dark fs-5 fw-bold">Pengumuman</span>
                        <span class="text-danger fs-5">Permanent Menu</span>
                    </div>
                    <div class="d-flex justify-content-between align-items-center bg-label-dark py-2 px-3 rounded mb-2">
                        <span class="text-dark fs-5 fw-bold">PPDB</span>
                        <span class="text-danger fs-5">Permanent Menu</span>
                    </div>
                    <?php foreach ($navigation as $item) : ?>
                    <div
                        class="d-flex justify-content-between align-items-center bg-label-primary py-2 px-3 rounded mb-2">
                        <span class="text-primary fs-5 fw-bold"><?= $item['nama_menu'] ?></span>

                        <a href="#" class="btn btn-danger" data-bs-toggle="modal"
                            data-bs-target="#modalCenter<?= $item['id'] ?>"><i class='bx bx-trash'></i></a>

                    </div>

                    <!-- Modal -->
                    <div class="modal fade" id="modalCenter<?= $item['id'] ?>" tabindex="-1" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <form action="<?= base_url('navigation/delete/' . $item['id']) ?>" method="POST">
                                <input type="hidden" name="_method" value="DELETE">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title text-center" id="modalCenterTitle">Apakah Yakin ?</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body d-flex justify-content-center align-items-center">
                                        <span>Ingin menghapus Menu:</span>
                                        <span class="fw-bold text-danger"><?= $item['nama_menu'] ?></span>
                                    </div>
                                    <div class="modal-footer d-flex justify-content-center align-items-center">
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

                    <?php endforeach; ?>
                </div>
                <div class="col-md-6 mb-3">
                    <span class="fs-5 text-dark fw-bold">Tambah Menu</span>
                    <hr class="hr" />
                    <form action="<?= base_url('navigation-store'); ?>" method="POST">
                        <div class="form-group mb-2">
                            <label for="nama_menu">Nama Menu</label>
                            <input type="text" class="form-control" placeholder="Masukkan Nama Menu" name="nama_menu">
                        </div>
                        <div class="form-group float-end">
                            <button class="btn btn-primary" type="submit">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!--/ Layout Demo -->
</div>
<?= $this->endSection(); ?>