<?= $this->extend('admin/templates/index') ?>

<?= $this->section('admin-content') ?>
<div class="container-fluid flex-grow-1 container-p-y">
    <!-- Layout Demo -->
    <div class="card mb-3">
        <div class="card-body flex-column d-flex gap-3">
            <h5 class="card-title">Cari Data Siswa</h5>
            <?php $validation = \Config\Services::validation(); ?>
            <form action="<?= base_url('cari') ?>" method="POST"
                class="d-flex flex-wrap justify-content-center align-items-center gap-2">
                <input type="text" placeholder="Masukkan kata kunci. ex: nama siswa, nisn atau nik"
                    class="form-control rounded" name="keyword" style="flex: 1;">

                <button type="submit" class="btn btn-primary d-flex justify-content-center align-items-center gap-2"
                    style="width: 200px;"><i class='bx bx-search'></i><span>Cari Siswa</span></button>
            </form>
            <!-- ERROR -->
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
            <?php } else {
        null;
      } ?>
        </div>
    </div>
    <!--/ Layout Demo -->
</div>
<?= $this->endSection(); ?>