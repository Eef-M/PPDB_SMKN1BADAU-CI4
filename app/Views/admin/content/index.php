<?= $this->extend('admin/templates/index') ?>

<?= $this->section('admin-content') ?>
<div class="container-fluid flex-grow-1 container-p-y">
    <!-- Layout Demo -->
    <div class="card mb-3">
        <div class="card-body flex-column d-flex gap-3 ">
            <h5 class="card-title">Data Konten</h5>
            <div class="d-flex justify-content-end align-items-center w-100">
                <a href="<?= base_url('content-tambah') ?>"
                    class="btn btn-primary d-flex justify-content-center align-items-center gap-2">
                    <i class='bx bx-plus-circle'></i>
                    <span class="d-lg-inline-block d-none">Tambah Konten</span>
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
                            <th>Gambar</th>
                            <th>Judul Konten</th>
                            <th>Isi Konten</th>
                            <th>Nama Menu</th>
                            <th>Tanggal</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (empty($content)) { ?>
                        <tr>
                            <td colspan="9" class="text-center py-5 fs-4 text-dark">TIDAK ADA DATA</td>
                        </tr>
                        <?php } else {
                            $no = 1;
                            foreach ($content as $item) : ?>
                        <tr>
                            <td><?= $no; ?></td>
                            <td>
                                <img src="<?= base_url('uploads/content/' . $item['gambar']); ?>" alt="gambar_jurusan"
                                    style="width: 100px; height: auto;">
                            </td>
                            <td><?= $item['judul'] ?></td>
                            <td class="text-wrap"><?= $item['isi'] ?></td>
                            <td><?= $item['nama_menu'] ?></td>
                            <td><?= $item['created_at'] ?></td>
                            <td>
                                <a href="<?= base_url('content/edit/' . $item['id']); ?>" class="btn btn-info"><i
                                        class='bx bxs-edit'></i></a>
                                <a href="#" class="btn btn-danger" data-bs-toggle="modal"
                                    data-bs-target="#modalCenter<?= $item['id'] ?>"><i class='bx bx-trash'></i></a>
                            </td>
                        </tr>

                        <!-- Modal -->
                        <div class="modal fade" id="modalCenter<?= $item['id'] ?>" tabindex="-1" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <form action="<?= base_url('content/delete/' . $item['id']) ?>" method="POST">
                                    <input type="hidden" name="_method" value="DELETE">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="modalCenterTitle">Apakah Yakin ?</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body text-wrap">
                                            <span>Ingin menghapus Content dengan judul:</span>
                                            <span class="fw-bold text-danger"><?= $item['judul'] ?></span>
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