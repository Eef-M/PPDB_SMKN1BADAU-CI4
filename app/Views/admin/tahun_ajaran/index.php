<?= $this->extend('admin/templates/index') ?>

<?= $this->section('admin-content') ?>
<div class="container-fluid flex-grow-1 container-p-y">
    <!-- Layout Demo -->
    <div class="card mb-3">
        <div class="card-body flex-column d-flex gap-3 ">
            <h5 class="card-title">Data Tahun Ajaran</h5>
            <?php if (empty($tahun_ajaran)) { ?>
            <div class="d-flex justify-content-end align-items-center w-100">
                <a href="<?= base_url('tahun_ajaran-tambah') ?>" class="btn btn-primary d-flex justify-content-center align-items-center gap-2">
                    <i class='bx bx-plus-circle'></i>
                    <span class="d-lg-inline-block d-none">Tambah Tahun Ajaran</span>
                </a>
            </div>
            <?php } else { null; } ?>
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
                            <th>Tahun Ajaran</th>
                            <th>Keterangan</th>
                            <th>Status</th>
                            <th>Tanggal Mulai</th>
                            <th>Tanggal Selesai</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (empty($tahun_ajaran)) { ?>
                            <tr>
                                <td colspan="9" class="text-center py-5 fs-4 text-dark">TIDAK ADA DATA</td>
                            </tr>
                            <?php } else {
                            $num = 1;
                            foreach ($tahun_ajaran as $item) : ?>
                                <tr>
                                    <td><?= $num ?></td>
                                    <td><?= $item['tahun_ajaran'] ?></td>
                                    <td class="text-wrap">
                                        <?= $item['keterangan'] ?>
                                    </td>
                                    <td>
                                        <?php if ($item['is_active'] == 0) { ?>
                                            <span class="badge bg-label-danger fs-6 fw-bold">TIDAK AKTIF</span>
                                        <?php } else { ?>
                                            <span class="badge bg-label-success fs-6 fw-bold">AKTIF</span>
                                        <?php } ?>
                                    </td>
                                    <td><?= $item['tanggal_mulai'] ?></td>
                                    <td><?= $item['tanggal_selesai'] ?></td>
                                    <td class="d-flex justify-content-start align-items-center gap-2">
                                        <a href="<?= base_url('tahun_ajaran/edit/' . $item['id']); ?>" class="btn btn-info"><i class='bx bx-edit'></i></a>
                                        <a href="#" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modalCenter<?= $item['id'] ?>"><i class='bx bx-trash'></i></a>
                                    </td>
                                </tr>

                                <!-- Modal -->
                                <div class="modal fade" id="modalCenter<?= $item['id'] ?>" tabindex="-1" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <form action="<?= base_url('tahun_ajaran/delete/' . $item['id']) ?>" method="POST">
                                            <input type="hidden" name="_method" value="DELETE">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="modalCenterTitle">Apakah Yakin ?</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body text-wrap">
                                                    <span>Ingin menghapus Tahun Ajaran </span>
                                                    <span class="fw-bold text-danger"><?= $item['tahun_ajaran'] ?></span>
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
                        <?php
                                $num++;
                            endforeach;
                        } ?>
                    </tbody>
                </table>
            </div>
            <span class="text-dark">Tanggal Sekarang: <?= $date; ?></span>
            <span class="text-danger">*DATA AKAN TERHAPUS OTOMATIS APABILA SUDAH MEMASUKI TANGGAL SELESAI</span>
        </div>
    </div>
    <!--/ Layout Demo -->
</div>
<script type="text/javascript">
       if (!localStorage.getItem('reloaded')) {
           
           setTimeout(function () {
               location.reload();
               localStorage.setItem('reloaded', 'true');
           }, 3000); 
       }
       window.addEventListener('beforeunload', function () {
           localStorage.removeItem('reloaded');
       });
</script>
<?= $this->endSection(); ?>