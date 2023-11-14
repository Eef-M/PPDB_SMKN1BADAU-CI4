<?= $this->extend('landing_page/templates/index') ?>

<?= $this->section('landing-page-content') ?>
<div class="row" style="min-height: 82vh;">
    <div class="col-md-12">
        <div class="container mt-2">
            <span class="text-dark fw-bold fs-2">Jadwal PPDB</span>
            <hr>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">NO</th>
                        <th scope="col">KEGIATAN</th>
                        <th scope="col">TANGGAL MULAI</th>
                        <th scope="col">TANGGAL SELEAI</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (empty($TA) && empty($jadwal)) { ?>
                        <tr>
                            <td colspan="5" class="text-center">Jadwal Belum Tersedia</td>
                        </tr>
                    <?php } else { ?>

                        <?php if (!empty($TA)) { ?>

                            <?php $n = 1;
                            foreach ($TA as $item) : ?>
                                <tr>
                                    <td><?= $n ?></td>
                                    <td>Pendaftaran</td>
                                    <td><?= date("d F Y", strtotime($item['tanggal_mulai'])) ?></td>
                                    <td><?= date("d F Y", strtotime($item['tanggal_selesai'])) ?></td>
                                </tr>
                            <?php $n++;
                            endforeach; ?>

                        <?php } else { ?>
                            <tr>
                                <td colspan="5" class="text-center">Pendaftaran Belum Tersedia</td>
                            </tr>
                        <?php } ?>

                        <?php if (!empty($jadwal)) { ?>

                            <?php $n = 2;
                            foreach ($jadwal as $row) : ?>
                                <tr>
                                    <td><?= $n; ?></td>
                                    <td><?= $row['kegiatan'] ?></td>
                                    <td><?= date("d F Y", strtotime($row['tanggal_mulai'])) ?></td>
                                    <td><?= date("d F Y", strtotime($row['tanggal_selesai'])) ?></td>
                                </tr>
                            <?php $n++;
                            endforeach; ?>

                        <?php } else { ?>
                            <tr>
                                <td colspan="5" class="text-center">Jadwal Seleksi dan Hasil Belum Tersedia</td>
                            </tr>
                        <?php } ?>

                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>