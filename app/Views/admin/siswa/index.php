<?= $this->extend('admin/templates/index') ?>

<?= $this->section('admin-content') ?>
<div class="container-fluid flex-grow-1 container-p-y">
    <!-- Layout Demo -->
    <div class="card mb-3">
        <div class="card-body flex-column d-flex gap-3 ">
            <h5 class="card-title">Data Siswa</h5>
            <div class="d-flex justify-content-between align-items-center w-100 gap-2">

                <?php $validation = \Config\Services::validation(); ?>
                <form action="<?= base_url('cari') ?>" method="POST"
                    class="d-flex flex-wrap justify-content-center align-items-center gap-2 w-100">
                    <input type="text" placeholder="Masukkan kata kunci. ex: nama siswa, nisn atau nik"
                        class="form-control rounded" name="keyword" style="flex: 1;">

                    <button type="submit" class="btn btn-secondary d-flex justify-content-center align-items-center gap-2"><i class='bx bx-search'></i><span class="d-lg-inline-block d-none">Cari Siswa</span></button>
                </form>

                <!-- Hidden Arrow Dropdowns -->
                <div class="btn-group w-25">
                    <button type="button"
                        class="btn btn-primary dropdown-toggle hide-arrow d-flex justify-content-center align-items-center gap-2"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        <i class='bx bx-plus-circle'></i>
                        <span class="d-lg-inline-block d-none">Tambah Data Siswa</span>
                    </button>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="<?= base_url('siswa-tambah-zonasi') ?>">Zonasi</a></li>
                        <li><a class="dropdown-item" href="<?= base_url('siswa-tambah-afirmasi') ?>">Afirmasi</a>
                        </li>
                        <li><a class="dropdown-item" href="<?= base_url('siswa-tambah-mutasi') ?>">Mutasi</a></li>
                        <li><a class="dropdown-item" href="<?= base_url('siswa-tambah-prestasi') ?>">Prestasi</a>
                        </li>
                    </ul>
                </div>
                <!--/ Hidden Arrow Dropdowns -->
                <?php if (empty($data_siswa)) {
                    null;
                } else { ?>
                <a href="<?= base_url('siswa-excel'); ?>"
                    class="btn d-flex justify-content-center align-items-center gap-2 w-25"
                    style="background-color: #379237; color: white;">
                    <i class='bx bx-export'></i>
                    <span class="d-lg-inline-block d-none">Export Excel</span>
                </a>
                <?php } ?>


            </div>

            <?php
            if (session()->getFlashdata('status')) {
                echo session()->getFlashdata('status');
            }
            ?>

            <?php if ($validation->getError('keyword')) { ?>
                <div class="alert alert-danger mt-2" role="alert">
                    <b>kata kunci</b> tidak boleh kosong!
                </div>
            <?php } ?>

            <?php if (isset($hasil_cari)) { ?>
            <?php if (count($hasil_cari) > 0) : ?>
            <div class="table-responsive">
                <table class="table card-table">
                    <thead>
                        <tr>
                            <th>Nama</th>
                            <th>NISN</th>
                            <th>NIK</th>
                            <th>Jurusan</th>
                            <th>Jalur Daftar</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($hasil_cari as $item) : ?>
                        <tr>
                            <td><?= $item->nama_siswa ?></td>
                            <td><?= $item->nisn ?></td>
                            <td><?= $item->nik ?></td>
                            <td><?= $item->jurusan ?></td>
                            <td><?= $item->jalur ?></td>
                            <td>
                                <a href="<?= base_url('siswa/detail/' . $item->id); ?>" class="btn btn-info"><i
                                        class='bx bxs-user-detail'></i></a>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
            <?php else : ?>
            <hr class="hr">
            <div class="d-flex justify-content-center align-items-center">
                <span class="fs-4 text-danger fw-bold">Siswa tidak ditemukan!</span>
            </div>
            <?php endif; ?>
            <?php } else { ?> 
                <div class="table-responsive text-nowrap">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>NISN</th>
                                <th>Nama</th>
                                <th>Jurusan</th>
                                <th>No HP</th>
                                <th>Status</th>
                                <th colspan="2">Lulus/Tidak Lulus</th>
                                <th>Verifikasi</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php if (empty($data_siswa)) { ?>
                            <tr>
                                <td colspan="10" class="text-center py-5 fs-4 text-dark">TIDAK ADA DATA</td>
                            </tr>
                            <?php } else {
                                $n = 1;
                                foreach ($data_siswa as $ds) : ?>
                            <tr>
                                <td><?= $n; ?></td>
                                <td><?= $ds['nisn']; ?></td>
                                <td class="text-wrap"><?= $ds['nama_siswa']; ?></td>
                                <td class="text-wrap"><?= $ds['jurusan'] ?></td>
                                <td><?= $ds['nohp_siswa']; ?></td>
                                <td>
                                    <?php if ($ds['status'] == 0) { ?>
                                    <span class="badge bg-label-warning fw-bold">Proses</span>
                                    <?php } else if ($ds['status'] == 1)  { ?>
                                    <span class="badge bg-label-success fw-bold">Lulus</span>
                                    <?php } else { ?>
                                    <span class="badge bg-label-danger fw-bold">Tidak Lulus</span>
                                    <?php } ?>
                                </td>
                                <td>
                                    <?php if ($ds['status'] == 0) { ?>
                                    <form action="<?= base_url('siswa/lulus/' . $ds['id']) ?>" method="POST">
                                        <input type="hidden" name="_method" value="PUT">
                                        <button class="btn btn-outline-success">Lulus</button>
                                    </form>
                                    <?php } else if ($ds['status'] == 1) { ?>
                                    <form action="<?= base_url('siswa/proses-lulus/' . $ds['id']) ?>" method="POST">
                                        <input type="hidden" name="_method" value="PUT">
                                        <button class="btn btn-outline-warning">Batalkan Lulus</button>
                                    </form>
                                    <?php } else {?> <button class="btn btn-outline-secondary" disabled>Lulus</button> <?php } ?>
                                    <!-- <span class="badge badge-center bg-success" style="width: 35px; height: 35px;"><i
                                            class='bx bx-check fs-3'></i></span>
                                    <span class="badge badge-center bg-danger" style="width: 35px; height: 35px;"><i
                                            class='bx bx-x fs-3'></i></span> -->
                                </td>
                                <td>
                                    <?php if ($ds['status'] == 0) { ?>
                                    <form action="<?= base_url('siswa/tidak-lulus/' . $ds['id']) ?>" method="POST">
                                        <input type="hidden" name="_method" value="PUT">
                                        <button class="btn btn-outline-danger">Tidak Lulus</button>
                                    </form>
                                    <?php } else if ($ds['status'] == 2) { ?>
                                    <form action="<?= base_url('siswa/proses-lulus/' . $ds['id']) ?>" method="POST">
                                        <input type="hidden" name="_method" value="PUT">
                                        <button class="btn btn-outline-warning">Batalkan Tidak Lulus</button>
                                    </form>
                                    <?php } else {?> <button class="btn btn-outline-secondary" disabled>Tidak Lulus</button> <?php } ?>
                                </td>
                                <td class="text-center">
                                    <?php if ($ds['verif'] == 0) { ?>
                                        ❌
                                    <?php } else { ?>
                                        ✅
                                    <?php } ?>
                                </td>
                                <td>
                                    <a href="<?= base_url('siswa/detail/' . $ds['id']); ?>" class="btn btn-info"><i
                                            class='bx bxs-user-detail'></i></a>
                                    <a href="#" class="btn btn-danger" data-bs-toggle="modal"
                                        data-bs-target="#modalCenter<?= $ds['id'] ?>"><i class='bx bx-trash'></i></a>
                                </td>
                            </tr>

                            <!-- Modal -->
                            <div class="modal fade" id="modalCenter<?= $ds['id'] ?>" tabindex="-1" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <form action="<?= base_url('siswa/delete/' . $ds['id']) . '/' . $ds['jalur'] ?>"
                                        method="POST">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="modalCenterTitle">Apakah Yakin ?</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body text-wrap">
                                                <span>Ingin menghapus data siswa bernama </span>
                                                <span class="fw-bold text-danger"><?= $ds['nama_siswa'] ?></span>
                                                <span>dengan NISN : <b class="text-danger"><?= $ds['nisn'] ?></b>,</span>
                                                <span>beserta nilai dan berkas-berkasnya ?</span>
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

                            <?php $n++;
                                endforeach;
                            } ?>



                        </tbody>
                    </table>
                </div>
            <?php } ?>

            
        </div>
    </div>
    <!--/ Layout Demo -->
</div>
<?= $this->endSection(); ?>