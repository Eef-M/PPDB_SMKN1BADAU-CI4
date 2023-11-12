<?= $this->extend('landing_page/templates/index') ?>

<?= $this->section('landing-page-content') ?>

<style>
    .singkat {
        overflow: hidden;
        text-overflow: ellipsis;
        white-space: nowrap;
        width: 400px;
        /* Ubah angka ini sesuai dengan jumlah karakter yang ingin ditampilkan */
    }
</style>
<div class="container py-4" style="min-height: 60%">
    <div class="row posts-entry">
        <div class="col-lg-12">
            <div class="d-flex justify-content-center align-items-center w-100">
                <span class="text-primary fw-bold fs-3">Pengumuman</span>
            </div>
            <hr class="hr" />
            <?php if(empty($data_siswa)) { ?>
                <div class="d-flex justify-content-center align-items-center w-100">
                    <span class="text-black fw-bold fs-4">Tidak Ada Pengumuman</span>
                </div>  
            <?php } else { ?>
                <div class="mt-3 mb-5">
                    <div class="d-flex justify-content-center align-items-center w-100">
                    <span class="text-black fw-bold">CALON SISWA JURUSAN AKUNTANSI 2023/2024</span>
                    </div>  
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">NAMA</th>
                                <th scope="col">NISN</th>
                                <th scope="col">JK</th>
                                <th scope="col">JURUSAN</th>
                                <th scope="col">STATUS</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                                $n=1;
                                foreach ($data_siswa as $ds) :
                                
                                if($ds['jurusan'] == 'AKUNTANSI') {
                            ?>
                            <tr>
                                <th scope="row"><?= $n; ?></th>
                                <td><?= strtoupper($ds['nama_siswa']) ?></td>
                                <td><?= $ds['nisn'] ?></td>
                                <td><?= strtoupper($ds['jenis_kelamin']) ?></td>
                                <td><?= $ds['jurusan'] ?></td>
                                <td>
                                    <?php if ($ds['status'] == 0) { ?>
                                    <span class="badge bg-warning text-dark fs-6">DALAM PROSES</span>
                                    <?php } else if ($ds['status'] == 1) { ?>
                                    <span class="badge bg-success fs-6">LULUS</span>
                                    <?php } else { ?> <span class="badge bg-danger fs-6">TIDAK LULUS</span> <?php } ?>
                                </td>
                            </tr>
                            <?php
                                } else { null; }
                            $n++;
                                endforeach;
                            ?>
                        </tbody>
                    </table>
                </div>
                <div class="mb-5">
                    <div class="d-flex justify-content-center align-items-center w-100">
                    <span class="text-black fw-bold">CALON SISWA JURUSAN MULTIMEDIA 2023/2024</span>
                    </div>  
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">NAMA</th>
                                <th scope="col">NISN</th>
                                <th scope="col">JK</th>
                                <th scope="col">JURUSAN</th>
                                <th scope="col">STATUS</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                                $n=1;
                                foreach ($data_siswa as $ds) :
                                
                                if($ds['jurusan'] == 'MULTIMEDIA') {
                            ?>
                            <tr>
                                <th scope="row"><?= $n; ?></th>
                                <td><?= strtoupper($ds['nama_siswa']) ?></td>
                                <td><?= $ds['nisn'] ?></td>
                                <td><?= strtoupper($ds['jenis_kelamin']) ?></td>
                                <td><?= $ds['jurusan'] ?></td>
                                <td>
                                    <?php if ($ds['status'] == 0) { ?>
                                    <span class="badge bg-warning text-dark fs-6">DALAM PROSES</span>
                                    <?php } else if ($ds['status'] == 1) { ?>
                                    <span class="badge bg-success fs-6">LULUS</span>
                                    <?php } else { ?> <span class="badge bg-danger fs-6">TIDAK LULUS</span> <?php } ?>
                                </td>
                            </tr>
                            <?php
                                } else { null; }
                            $n++;
                                endforeach;
                            ?>
                        </tbody>
                    </table>
                </div>
                <div class="mb-5">
                    <div class="d-flex justify-content-center align-items-center w-100">
                    <span class="text-black fw-bold">CALON SISWA JURUSAN PEMASARAN 2023/2024</span>
                    </div>  
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">NAMA</th>
                                <th scope="col">NISN</th>
                                <th scope="col">JK</th>
                                <th scope="col">JURUSAN</th>
                                <th scope="col">STATUS</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                                $n=1;
                                foreach ($data_siswa as $ds) :
                                
                                if($ds['jurusan'] == 'PEMASARAN') {
                            ?>
                            <tr>
                                <th scope="row"><?= $n; ?></th>
                                <td><?= strtoupper($ds['nama_siswa']) ?></td>
                                <td><?= $ds['nisn'] ?></td>
                                <td><?= strtoupper($ds['jenis_kelamin']) ?></td>
                                <td><?= $ds['jurusan'] ?></td>
                                <td>
                                    <?php if ($ds['status'] == 0) { ?>
                                    <span class="badge bg-warning text-dark fs-6">DALAM PROSES</span>
                                    <?php } else if ($ds['status'] == 1) { ?>
                                    <span class="badge bg-success fs-6">LULUS</span>
                                    <?php } else { ?> <span class="badge bg-danger fs-6">TIDAK LULUS</span> <?php } ?>
                                </td>
                            </tr>
                            <?php
                                } else { null; }
                            $n++;
                                endforeach;
                            ?>
                        </tbody>
                    </table>
                </div>
            <?php } ?>
        </div>
    </div>
</div>


<?= $this->endSection(); ?>