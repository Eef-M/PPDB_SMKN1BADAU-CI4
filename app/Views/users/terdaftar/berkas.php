<?php foreach ($berkas as $item) : ?>
    <div class="row my-3">
        <div class="col-md-6">
            <form action="<?= base_url('update-foto/' . $item['id']); ?>" method="POST" enctype="multipart/form-data">
                <div class="d-flex justify-content-start align-items-center gap-2 flex-column w-100">
                    <input type="hidden" name="_method" value="PUT">
                    <span class="text-dark fw-bold fs-5">Foto: </span>
                    <img style="width: 200px; height: auto;" class="img-fluid" src="<?= base_url('uploads/berkas_siswa/' . $item['foto']); ?>" alt="Card image cap" />
                    <div class="d-flex justify-content-center align-items-center gap-3 p-2">
                        <label for="foto" class="btn btn-info">Ganti File</label>
                        <input type="file" name="foto" id="foto" accept="image/jpeg, image/jpg, image/png" style="display:none;" onchange="displayFileNameAndUploadButton('foto')">
                        <a href="<?= base_url('user/view/' . $item['id'] . '/foto') ?>" class="btn btn-success">Lihat</a>
                    </div>
                    <div id="file-name-display-foto"></div>
                    <button id="upload-button-foto" style="display:none;" type="submit" class="btn btn-primary">Upload File</button>
                </div>
            </form>
            <hr class="hr" />
            <form action="<?= base_url('update-rpt/' . $item['id']); ?>" method="POST" enctype="multipart/form-data">
                <div class="d-flex justify-content-start align-items-center gap-2 flex-column w-100">
                    <input type="hidden" name="_method" value="PUT">
                    <span class="text-dark fw-bold fs-5">Raport Semester 1-5: </span>
                    <img style="width: 200px; height: auto;" class="img-fluid" src="<?= base_url('assets/pdf.svg'); ?>" alt="Card image cap" />
                    <div class="d-flex justify-content-center align-items-center gap-3 p-2">
                        <label for="rpt" class="btn btn-info">Ganti File</label>
                        <input type="file" name="rpt_smstr_1sd5" id="rpt" accept=".pdf" style="display:none;" onchange="displayFileNameAndUploadButton('rpt')">
                        <a href="<?= site_url('unduh-pdf/' . $item['id'] . '/rpt_smstr_1sd5') ?>" class="btn btn-success">Unduh</a>
                    </div>
                    <div id="file-name-display-rpt"></div>
                    <button id="upload-button-rpt" style="display:none;" type="submit" class="btn btn-primary">Upload File</button>
                </div>
            </form>
            <hr class="hr" />
            <?php if ($profile['jalur'] == 'zonasi') { ?>
                <div class="d-flex justify-content-start align-items-center gap-2 flex-column w-100">
                    <div class="w-100 h-100"></div>
                </div>
            <?php } elseif ($profile['jalur'] == 'afirmasi') { ?>
                <form action="<?= base_url('update-kkm/' . $item['id']); ?>" method="POST" enctype="multipart/form-data">
                    <div class="d-flex justify-content-start align-items-center gap-2 flex-column w-100">
                        <input type="hidden" name="_method" value="PUT">
                        <span class="text-dark fw-bold fs-5">Bukti Keluarga Kurang Mampu: </span>
                        <img style="width: 200px; height: auto;" class="img-fluid" src="<?= base_url('assets/pdf.svg'); ?>" alt="Card image cap" />
                        <div class="d-flex justify-content-center align-items-center gap-3 p-2">
                            <label for="kkm" class="btn btn-info">Ganti File</label>
                            <input type="file" name="kel_kur_mampu" id="kkm" accept=".pdf" style="display:none;" onchange="displayFileNameAndUploadButton('kkm')">
                            <a href="<?= site_url('unduh-pdf/' . $item['id'] . '/kel_kur_mampu') ?>" class="btn btn-success">Unduh</a>
                        </div>
                        <div id="file-name-display-kkm"></div>
                        <button id="upload-button-kkm" style="display:none;" type="submit" class="btn btn-primary">Upload File</button>
                    </div>
                </form>
                <hr class="hr" />
            <?php } elseif ($profile['jalur'] == 'mutasi') { ?>
                <form action="<?= base_url('update-stortu/' . $item['id']); ?>" method="POST" enctype="multipart/form-data">
                    <div class="d-flex justify-content-start align-items-center gap-2 flex-column w-100">
                        <input type="hidden" name="_method" value="PUT">
                        <span class="text-dark fw-bold fs-5">Surat Tugas Orang Tua: </span>
                        <img style="width: 200px; height: auto;" class="img-fluid" src="<?= base_url('assets/pdf.svg'); ?>" alt="Card image cap" />
                        <div class="d-flex justify-content-center align-items-center gap-3 p-2">
                            <label for="stortu" class="btn btn-info">Ganti File</label>
                            <input type="file" name="st_ortu" id="stortu" accept=".pdf" style="display:none;" onchange="displayFileNameAndUploadButton('stortu')">
                            <a href="<?= site_url('unduh-pdf/' . $item['id'] . '/st_ortu') ?>" class="btn btn-success">Unduh</a>
                        </div>
                        <div id="file-name-display-stortu"></div>
                        <button id="upload-button-stortu" style="display:none;" type="submit" class="btn btn-primary">Upload File</button>
                    </div>
                </form>
                <hr class="hr" />
            <?php } elseif ($profile['jalur'] == 'prestasi') { ?>
                <form action="<?= base_url('update-sertif/' . $item['id']); ?>" method="POST" enctype="multipart/form-data">
                    <div class="d-flex justify-content-start align-items-center gap-2 flex-column w-100">
                        <span class="text-dark fw-bold fs-5">Sertifikasi Lomba/Prestasi: </span>
                        <img style="width: 200px; height: auto;" class="img-fluid" src="<?= base_url('assets/pdf.svg'); ?>" alt="Card image cap" />
                        <div class="d-flex justify-content-center align-items-center gap-3 p-2">
                            <label for="sertif" class="btn btn-info">Ganti File</label>
                            <input type="file" name="sertif_prestasi" id="sertif" accept=".pdf" style="display:none;" onchange="displayFileNameAndUploadButton('sertif')">
                            <a href="<?= site_url('unduh-pdf/' . $item['id'] . '/sertif_prestasi') ?>" class="btn btn-success">Unduh</a>
                        </div>
                        <div id="file-name-display-sertif"></div>
                        <button id="upload-button-sertif" style="display:none;" type="submit" class="btn btn-primary">Upload File</button>
                    </div>
                </form>
                <hr class="hr" />
            <?php } else {
                null;
            } ?>
        </div>
        <div class="col-md-6">
            <form action="<?= base_url('update-snisn/' . $item['id']); ?>" method="POST" enctype="multipart/form-data">
                <div class="d-flex justify-content-start align-items-center gap-2 flex-column w-100">
                    <input type="hidden" name="_method" value="PUT">
                    <span class="text-dark fw-bold fs-5">Scan Kartu NISN: </span>
                    <img style="width: 200px; height: auto;" class="img-fluid" src="<?= base_url('assets/pdf.svg'); ?>" alt="Card image cap" />
                    <div class="d-flex justify-content-center align-items-center gap-3 p-2">
                        <label for="snisn" class="btn btn-info">Ganti File</label>
                        <input type="file" name="scan_nisn" id="snisn" accept=".pdf" style="display:none;" onchange="displayFileNameAndUploadButton('snisn')">
                        <a href="<?= site_url('unduh-pdf/' . $item['id'] . '/scan_nisn') ?>" class="btn btn-success">Unduh</a>
                    </div>
                    <div id="file-name-display-snisn"></div>
                    <button id="upload-button-snisn" style="display:none;" type="submit" class="btn btn-primary">Upload File</button>
                </div>
            </form>
            <hr class="hr" />
            <form action="<?= base_url('update-kk/' . $item['id']); ?>" method="POST" enctype="multipart/form-data">
                <div class="d-flex justify-content-start align-items-center gap-2 flex-column w-100">
                    <input type="hidden" name="_method" value="PUT">
                    <span class="text-dark fw-bold fs-5">Kartu Keluarga: </span>
                    <img style="width: 200px; height: auto;" class="img-fluid" src="<?= base_url('assets/pdf.svg'); ?>" alt="Card image cap" />
                    <div class="d-flex justify-content-center align-items-center gap-3 p-2">
                        <label for="kk" class="btn btn-info">Ganti File</label>
                        <input type="file" name="kartu_keluarga" id="kk" accept=".pdf" style="display:none;" onchange="displayFileNameAndUploadButton('kk')">
                        <a href="<?= site_url('unduh-pdf/' . $item['id'] . '/kartu_keluarga') ?>" class="btn btn-success">Unduh</a>
                    </div>
                    <div id="file-name-display-kk"></div>
                    <button id="upload-button-kk" style="display:none;" type="submit" class="btn btn-primary">Upload File</button>
                </div>
            </form>
            <hr class="hr" />
        </div>
    </div>

<?php endforeach; ?>

<script>
    function displayFileNameAndUploadButton(inputId) {
        var inputFile = document.getElementById(inputId);

        if (inputFile.files.length > 0) {
            var fileName = inputFile.files[0].name;

            var fileNameDisplay = document.getElementById('file-name-display-' + inputId);
            fileNameDisplay.innerHTML = 'Nama File: ' + fileName;

            var uploadButton = document.getElementById('upload-button-' + inputId);
            uploadButton.style.display = 'block';
        }
    }
</script>