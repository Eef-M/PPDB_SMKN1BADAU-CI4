<?= $this->extend('admin/templates/index') ?>

<?= $this->section('admin-content') ?>
<div class="container-fluid flex-grow-1 container-p-y">
    <div class="d-flex justify-content-start align-items-center w-100 gap-2">
        <a href="<?= base_url('siswa-bobot') ?>"
            class="btn btn-dark d-flex justify-content-center align-items-center gap-1">
            <i class='bx bx-left-arrow-alt'></i>
            <span>Kembali</span>
        </a>
        <div class="w-100 bg-secondary rounded" style="height: 2px;"></div>
    </div>
    <!-- Layout Demo -->
    <div class="card my-3">
        <div class="card-body flex-column d-flex gap-3 ">
            <h5 class="card-title">Bobot Nilai Siswa <span class="text-info fw-bold">Zonasi</span></h5>
            <div class="d-flex justify-content-end align-items-center w-100 gap-2">
                <?php if (empty($zonasi)) {
                null;
            } else { ?>
                <a href="<?= base_url('zonasi-excel'); ?>"
                    class="btn d-flex justify-content-center align-items-center gap-2"
                    style="background-color: #379237; color: white;">
                    <i class='bx bx-plus-circle'></i>
                    <span class="d-lg-inline-block d-none">Export Excel</span>
                </a>
                <?php } ?>
            </div>

            <?php
            if (session()->getFlashdata('status')) {
                echo session()->getFlashdata('status');
            }
            ?>
            <div class="table-responsive text-nowrap text-center">
                <table class="table">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>NISN</th>
                            <th>Nama</th>
                            <th class="text-wrap">Bahasa Indonesia</th>
                            <th class="text-wrap">Bahasa Inggris</th>
                            <th>Matematika</th>
                            <th>IPA</th>
                            <th>IPS</th>
                            <th>Bobot Hasil</th>
                            <th class="text-wrap">Persentase Calon Siswa</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (empty($data)) { ?>
                        <tr>
                            <td colspan="11" class="text-center py-5 fs-4 text-dark">TIDAK ADA DATA</td>
                        </tr>
                        <?php } else {
                            $no = 1;
                            foreach ($data as $row) : ?>
                        <tr>
                            <td><?= $no; ?></td>
                            <td><?= $row['nisn']; ?></td>
                            <td class="text-wrap"><?= $row['nama_siswa']; ?></td>
                            <td><?= $row['bindo']; ?></td>
                            <td><?= $row['bing']; ?></td>
                            <td><?= $row['mtk']; ?></td>
                            <td><?= $row['ipa']; ?></td>
                            <td><?= $row['ips']; ?></td>
                            <td><?= $row['bobot_hasil']; ?></td>
                            <td><?= $row['persentase']; ?>%</td>
                            <td>
                                <a href="<?= base_url('siswa-bobot/detail/' . $row['id']) ?>"
                                    class="btn btn-info">Detail</a>
                            </td>
                        </tr>
                        <?php
                                $no++;
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