<?php foreach ($berkas as $item) : ?>
<div class="row my-3">
    <div class="col-md-6">
        <div class="d-flex justify-content-start align-items-center gap-2 flex-column w-100" style="height: 350px;">
            <span class="text-dark fw-bold fs-5">Kartu Keluarga: </span>
            <img style="width: 200px; height: auto;" class="img-fluid"
                src="<?= base_url('uploads/berkas_siswa/' . $item['kartu_keluarga']); ?>" alt="Card image cap" />

        </div>
        <hr class="hr" />
        <div class="d-flex justify-content-start align-items-center gap-2 flex-column w-100" style="height: 350px;">
            <span class="text-dark fw-bold fs-5">Raport Semester 1: </span>
            <img style="width: 200px; height: auto;" class="img-fluid"
                src="<?= base_url('uploads/berkas_siswa/' . $item['rpt_smstr_1']); ?>" alt="Card image cap" />
        </div>
        <hr class="hr" />
        <div class="d-flex justify-content-start align-items-center gap-2 flex-column w-100" style="height: 350px;">
            <span class="text-dark fw-bold fs-5">Raport Semester 3: </span>
            <img style="width: 200px; height: auto;" class="img-fluid"
                src="<?= base_url('uploads/berkas_siswa/' . $item['rpt_smstr_3']); ?>" alt="Card image cap" />
        </div>
        <hr class="hr" />
        <div class="d-flex justify-content-start align-items-center gap-2 flex-column w-100" style="height: 350px;">
            <span class="text-dark fw-bold fs-5">Raport Semester 5: </span>
            <img style="width: 200px; height: auto;" class="img-fluid"
                src="<?= base_url('uploads/berkas_siswa/' . $item['rpt_smstr_5']); ?>" alt="Card image cap" />
        </div>
        <hr class="hr" />
    </div>
    <div class="col-md-6">
        <div class="d-flex justify-content-start align-items-center gap-2 flex-column w-100" style="height: 350px;">
            <span class="text-dark fw-bold fs-5">Scan Kartu NISN: </span>
            <img style="width: 200px; height: auto;" class="img-fluid"
                src="<?= base_url('uploads/berkas_siswa/' . $item['scan_nisn']); ?>" alt="Card image cap" />
        </div>
        <hr class="hr" />
        <div class="d-flex justify-content-start align-items-center gap-2 flex-column w-100" style="height: 350px;">
            <span class="text-dark fw-bold fs-5">Raport Semester 2: </span>
            <img style="width: 200px; height: auto;" class="img-fluid"
                src="<?= base_url('uploads/berkas_siswa/' . $item['rpt_smstr_2']); ?>" alt="Card image cap" />
        </div>
        <hr class="hr" />
        <div class="d-flex justify-content-start align-items-center gap-2 flex-column w-100" style="height: 350px;">
            <span class="text-dark fw-bold fs-5">Raport Semester 4: </span>
            <img style="width: 200px; height: auto;" class="img-fluid"
                src="<?= base_url('uploads/berkas_siswa/' . $item['rpt_smstr_4']); ?>" alt="Card image cap" />
        </div>
        <hr class="hr" />
        <?php if ($profile['jalur'] == 'zonasi') { ?>
        <div class="d-flex justify-content-start align-items-center gap-2 flex-column w-100" style="height: 350px;">
            <div class="w-100 h-100"></div>
        </div>
        <?php } elseif ($profile['jalur'] == 'afirmasi') { ?>
        <div class="d-flex justify-content-start align-items-center gap-2 flex-column w-100" style="height: 350px;">
            <span class="text-dark fw-bold fs-5">Bukti Keluarga Kurang Mampu: </span>
            <img style="width: 200px; height: auto;" class="img-fluid"
                src="<?= base_url('uploads/berkas_siswa/' . $item['kel_kur_mampu']); ?>" alt="Card image cap" />
        </div>
        <hr class="hr" />
        <?php } elseif ($profile['jalur'] == 'mutasi') { ?>
        <div class="d-flex justify-content-start align-items-center gap-2 flex-column w-100" style="height: 350px;">
            <span class="text-dark fw-bold fs-5">Surat Tugas Orang Tua: </span>
            <img style="width: 200px; height: auto;" class="img-fluid"
                src="<?= base_url('uploads/berkas_siswa/' . $item['st_ortu']); ?>" alt="Card image cap" />
        </div>
        <hr class="hr" />
        <?php } elseif ($profile['jalur'] == 'prestasi') { ?>
        <div class="d-flex justify-content-start align-items-center gap-2 flex-column w-100" style="height: 350px;">
            <span class="text-dark fw-bold fs-5">Sertifikasi Lomba/Prestasi: </span>
            <img style="width: 200px; height: auto;" class="img-fluid"
                src="<?= base_url('uploads/berkas_siswa/' . $item['sertif_prestasi']); ?>" alt="Card image cap" />
        </div>
        <hr class="hr" />
        <?php } else {
                null;
            } ?>
    </div>
</div>
<?php endforeach; ?>