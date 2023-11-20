<?= $this->extend('admin/templates/index') ?>

<?= $this->section('admin-content') ?>
<div class="container-fluid flex-grow-1 container-p-y">
    <!-- Layout Demo -->
    <?php
    if (session()->getFlashdata('status')) {
        echo session()->getFlashdata('status');
    }
    ?>
    <!-- Persyaratan Start -->
    <div class="card mb-3">
        <div class="card-body flex-column d-flex gap-3 ">
            <h5 class="card-title">Data Persyaratan</h5>

            <?php if (empty($persyaratan)) : ?>
                <div class="d-flex justify-content-end align-items-center w-100">
                    <a href="<?= base_url('persyaratan-tambah') ?>" class="btn btn-primary d-flex justify-content-center align-items-center gap-2">
                        <i class='bx bx-plus-circle'></i>
                        <span class="d-lg-inline-block d-none">Tambah Persyaratan</span>
                    </a>
                </div>
            <?php else : ?>
                <?php null; ?>
            <?php endif; ?>

            <div class="table-responsive text-nowrap">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th class="text-center">Deskripsi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (empty($persyaratan)) { ?>
                            <tr>
                                <td colspan="2" class="text-center py-5 fs-4 text-dark">TIDAK ADA DATA</td>
                            </tr>
                            <?php } else {
                            foreach ($persyaratan as $item) : ?>
                                <tr>
                                    <td class="text-wrap" style="text-align: justify;"><?= nl2br($item['deskripsi']) ?></td>
                                </tr>
                                <tr>
                                    <td>
                                        <a href="<?= base_url('persyaratan/edit/' . $item['id']) ?>" class="btn btn-info d-flex justify-content-center align-items-center gap-2">
                                            <i class='bx bx-edit'></i>
                                            <span class="d-lg-inline-block d-none">EDIT PERSYARATAN</span>
                                        </a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <a href="#" class="btn btn-danger d-flex justify-content-center align-items-center gap-2" data-bs-toggle="modal" data-bs-target="#modalCenterHapusPersyaratan">
                                            <i class='bx bx-trash'></i>
                                            <span class="d-lg-inline-block d-none">HAPUS PERSYARATAN</span>
                                        </a>
                                    </td>
                                </tr>
                        <?php
                            endforeach;
                        } ?>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- Persyaratan End -->

    <!-- Tata cara Start -->
    <div class="card mb-3">
        <div class="card-body flex-column d-flex gap-3 ">
            <h5 class="card-title">Data Tata Cara</h5>

            <?php if (empty($tata_cara)) : ?>
                <div class="d-flex justify-content-end align-items-center w-100">
                    <a href="<?= base_url('tata_cara-tambah') ?>" class="btn btn-primary d-flex justify-content-center align-items-center gap-2">
                        <i class='bx bx-plus-circle'></i>
                        <span class="d-lg-inline-block d-none">Tambah Tata Cara</span>
                    </a>
                </div>
            <?php else : ?>
                <?php null; ?>
            <?php endif; ?>

            <div class="table-responsive text-nowrap">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th class="text-center">Deskripsi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (empty($tata_cara)) { ?>
                            <tr>
                                <td colspan="2" class="text-center py-5 fs-4 text-dark">TIDAK ADA DATA</td>
                            </tr>
                            <?php } else {
                            foreach ($tata_cara as $item) : ?>
                                <tr>
                                    <td class="text-wrap" style="text-align: justify;"><?= nl2br($item['deskripsi']) ?></td>
                                </tr>
                                <tr>
                                    <td>
                                        <a href="<?= base_url('tata_cara/edit/' . $item['id']) ?>" class="btn btn-info d-flex justify-content-center align-items-center gap-2">
                                            <i class='bx bx-edit'></i>
                                            <span class="d-lg-inline-block d-none">EDIT TATA CARA</span>
                                        </a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <a href="#" class="btn btn-danger d-flex justify-content-center align-items-center gap-2" data-bs-toggle="modal" data-bs-target="#modalCenterHapusTataCara">
                                            <i class='bx bx-trash'></i>
                                            <span class="d-lg-inline-block d-none">HAPUS TATA CARA</span>
                                        </a>
                                    </td>
                                </tr>
                        <?php
                            endforeach;
                        } ?>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- Tata cara End -->

    <!--/ Layout Demo -->

    <!-- Modal Persyaratan Start -->
    <div class="modal fade" id="modalCenterHapusPersyaratan" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalCenterTitle">Apakah Yakin ?</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body text-wrap">
                    <span>Ingin menghapus data Persyaratan ?</span>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                        Tidak
                    </button>
                    <a class="btn btn-danger" href="<?= base_url('persyaratan-hapus') ?>">Ya</a>
                </div>
            </div>
        </div>
    </div>
    <!-- End Modal Persyaratab End -->

    <!-- Modal Tata Cara Start -->
    <div class="modal fade" id="modalCenterHapusTataCara" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalCenterTitle">Apakah Yakin ?</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body text-wrap">
                    <span>Ingin menghapus data Tata Cara ?</span>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                        Tidak
                    </button>
                    <a class="btn btn-danger" href="<?= base_url('tata_cara-hapus') ?>">Ya</a>
                </div>
            </div>
        </div>
    </div>
    <!-- End Modal Tata Cara End -->

</div>
<?= $this->endSection(); ?>