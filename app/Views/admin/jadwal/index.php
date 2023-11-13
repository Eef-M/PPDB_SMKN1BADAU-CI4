<?= $this->extend('admin/templates/index') ?>

<?= $this->section('admin-content') ?>
<div class="container-fluid flex-grow-1 container-p-y">
    <!-- Layout Demo -->
    <div class="card mb-3">
        <div class="card-body flex-column d-flex gap-3 ">
            <h5 class="card-title">Data Penjadwalan</h5>

            <?php if (empty($jadwal)) { ?>
                <div class="d-flex justify-content-end align-items-center w-100">
                    <a href="<?= base_url('penjadwalan-tambah') ?>" class="btn btn-primary d-flex justify-content-center align-items-center gap-2">
                        <i class='bx bx-plus-circle'></i>
                        <span class="d-lg-inline-block d-none">Tambah Jadwal</span>
                    </a>
                </div>
            <?php } else { ?>
                <div class="d-flex justify-content-end align-items-center w-100">
                    <a href="#" class="btn btn-danger d-flex justify-content-center align-items-center gap-2" data-bs-toggle="modal" data-bs-target="#modalCenterHapus">
                        <i class='bx bx-trash'></i>
                        <span class="d-lg-inline-block d-none">Hapus Jadwal</span>
                    </a>
                </div>
            <?php } ?>

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
                            <th>Kegiatan</th>
                            <th>Lokasi</th>
                            <th>Tanggal Mulai</th>
                            <th>Tanggal Selesai</th>
                            <th>Edit</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (empty($jadwal)) { ?>
                            <tr>
                                <td colspan="6" class="text-center py-5 fs-4 text-dark">TIDAK ADA DATA</td>
                            </tr>
                            <?php } else {
                            $n = 1;
                            foreach ($jadwal as $row) : ?>
                                <tr>
                                    <td><?= $n; ?></td>
                                    <td><?= $row['kegiatan'] ?></td>
                                    <td><?= $row['lokasi'] ?></td>
                                    <td><?= $row['tanggal_mulai'] ?></td>
                                    <td><?= $row['tanggal_selesai'] ?></td>
                                    <td>
                                        <a href="<?= base_url('penjadwalan/edit/' . $row['id']); ?>" class="btn btn-info"><i class='bx bxs-edit'></i></a>
                                    </td>
                                </tr>
                            <?php $n++;
                            endforeach; ?>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!--/ Layout Demo -->

    <!-- Modal -->
    <div class="modal fade" id="modalCenterHapus" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalCenterTitle">Apakah Yakin ?</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body text-wrap">
                    <span>Ingin menghapus data Penjadwalan ?</span>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                        Tidak
                    </button>
                    <a class="btn btn-danger" href="<?= base_url('penjadwalan-hapus') ?>">Ya</a>
                </div>
            </div>
        </div>
    </div>
    <!-- End Modal -->
</div>
<?= $this->endSection(); ?>