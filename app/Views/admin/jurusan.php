<?= $this->extend('admin/templates/index') ?>

<?= $this->section('admin-content') ?>
<div class="container-fluid flex-grow-1 container-p-y">
    <!-- Layout Demo -->
    <div class="card mb-3">
        <div class="card-body flex-column d-flex gap-3 ">
            <h5 class="card-title">Data Jurusan</h5>
            <div class="d-flex justify-content-end align-items-center w-100">
                <button class="btn btn-primary d-flex justify-content-center align-items-center gap-2">
                    <i class='bx bx-plus-circle'></i>
                    <span class="d-lg-inline-block d-none">Tambah Jurusan</span>
                </button>
            </div>
            <div class="table-responsive text-nowrap">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Gambar</th>
                            <th>Guru</th>
                            <th>Jurusan</th>
                            <th>Siswa</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>GGG</td>
                            <td>Alice</td>
                            <td>Bahasa Indonesia</td>
                            <td>34</td>
                            <td>
                                <a href="#" class="btn btn-info"><i class='bx bx-edit'></i></a>
                                <a href="#" class="btn btn-danger"><i class='bx bx-trash'></i></a>
                            </td>
                        </tr>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!--/ Layout Demo -->
</div>
<?= $this->endSection(); ?>