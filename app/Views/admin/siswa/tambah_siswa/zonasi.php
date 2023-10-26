<?= $this->extend('admin/templates/index') ?>

<?= $this->section('admin-content') ?>
<div class="container-fluid flex-grow-1 container-p-y">
    <!-- Layout Demo -->
    <div class="d-flex justify-content-start align-items-center w-100 gap-2">
        <a href="<?= base_url('siswa') ?>" class="btn btn-dark d-flex justify-content-center align-items-center gap-1">
            <i class='bx bx-left-arrow-alt'></i>
            <span>Kembali</span>
        </a>
        <div class="w-100 bg-secondary rounded" style="height: 2px;"></div>
    </div>
    <!--/ Layout Demo -->
    <div class="d-flex justify-content-center align-items-center my-3">
        <div class="card w-100 bg-white">
            <span class="badge bg-label-dark text-center mt-4 fs-3 fw-bold">TAMBAH DATA SISWA</span>
            <span class="badge bg-label-info text-center fs-5 fw-bold">JALUR ZONASI</span>
            <hr class="hr mx-4" />
            <div class="card-body">
                <?php $validation = \Config\Services::validation(); ?>

                <form action="<?= base_url('siswa-store'); ?>" method="POST" enctype="multipart/form-data">
                    <!-- Data Diri Siswa -->
                    <span class="badge bg-label-info rounded mb-4 px-3 py-2 fs-6 shadow-sm">Data Diri Siswa</span>
                    <div class="d-flex flex-column justify-content-center align-items-center gap-3">
                        <div class="d-flex justify-content-center align-items-center gap-4 flex-column flex-lg-row w-100">
                            <div class="d-flex flex-column justify-content-center align-items-start w-100">
                                <label class="text-black">Tanggal Pendaftaran</label>
                                <input type="date" class="form-control border-info" name="tanggal_pendaftaran">
                                <!-- ERROR -->
                                <?php if ($validation->getError('tanggal_pendaftaran')) { ?>
                                    <div class="alert alert-danger mt-2" role="alert">
                                        <b>Tanggal Pendaftaran</b> harus di isi
                                    </div>
                                <?php } ?>
                            </div>
                            <div class="d-flex flex-column justify-content-center align-items-start w-100">
                                <label class="text-black">NISN</label>
                                <input class="form-control border-info" name="nisn" placeholder="Masukkan NISN Anda">
                                <!-- ERROR -->
                                <?php if ($validation->getError('nisn')) { ?>
                                    <div class="alert alert-danger mt-2" role="alert">
                                        <b>NISN</b> harus di isi
                                    </div>
                                <?php } ?>
                            </div>
                            <div class="d-flex flex-column justify-content-center align-items-start w-100">
                                <label class="text-black">NIK (Nomor Induk Kependudukan)</label>
                                <input class="form-control border-info" name="nik" placeholder="Masukkan NIK Anda">
                                <!-- ERROR -->
                                <?php if ($validation->getError('nik')) { ?>
                                    <div class="alert alert-danger mt-2" role="alert">
                                        <b>NIK</b> harus di isi
                                    </div>
                                <?php } ?>
                            </div>
                            <div class="d-flex flex-column justify-content-center align-items-start w-100">
                                <label class="text-black">Jurusan</label>
                                <select aria-label="Default select example" class="form-control border-info" name="id_jurusan">
                                    <?php if (empty($jurusan)) { ?>
                                        <option selected>Jurusan Belum Tersedia</option>
                                    <?php } else { ?>
                                        <option selected>-- Pilih Jurusan --</option>
                                    <?php foreach($jurusan as $row) : ?>
                                        <option value="<?= $row['id'] ?>"><?= $row['jurusan'] ?></option>
                                    <?php endforeach; 
                                    }
                                    ?>
                                </select>
                                <!-- ERROR -->
                                <?php if ($validation->getError('id_jurusan')) { ?>
                                    <div class="alert alert-danger mt-2" role="alert">
                                        <b>Jurusan</b> harus di pilih
                                    </div>
                                <?php } ?>
                            </div>
                        </div>
                        <div class="d-flex justify-content-center align-items-center gap-4 flex-column flex-lg-row w-100">
                            <div class="d-flex flex-column justify-content-center align-items-start w-100">
                                <label class="text-black">Nama Siswa</label>
                                <input class="form-control border-info" name="nama_siswa" placeholder="Masukkan Nama Lengkap Anda">
                                <!-- ERROR -->
                                <?php if ($validation->getError('nama_siswa')) { ?>
                                    <div class="alert alert-danger mt-2" role="alert">
                                        <b>Nama Siswa</b> harus di isi
                                    </div>
                                <?php } ?>
                            </div>
                            <div class="d-flex flex-column justify-content-center align-items-start w-100">
                                <label class="text-black">Jenis Kelamin</label>
                                <select aria-label="Default select example" class="form-control border-info" name="jenis_kelamin">
                                    <option selected>-- Pilih Jenis Kelamin --</option>
                                    <option value="laki-laki">Laki-laki</option>
                                    <option value="perempuan">Perempuan</option>
                                </select>
                                <!-- ERROR -->
                                <?php if ($validation->getError('jenis_kelamin')) { ?>
                                    <div class="alert alert-danger mt-2" role="alert">
                                        <b>Jenis Kelamin</b> harus di pilih
                                    </div>
                                <?php } ?>
                            </div>
                            <div class="d-flex flex-column justify-content-center align-items-start w-100">
                                <label class="text-black">Tempat Lahir</label>
                                <input class="form-control border-info" name="tempat_lahir" placeholder="Masukkan Tempat Lahir Anda">
                                <!-- ERROR -->
                                <?php if ($validation->getError('tempat_lahir')) { ?>
                                    <div class="alert alert-danger mt-2" role="alert">
                                        <b>Tempat Lahir</b> harus di isi
                                    </div>
                                <?php } ?>
                            </div>
                        </div>
                        <div class="d-flex justify-content-center align-items-center gap-4 flex-column flex-lg-row w-100">
                            <div class="d-flex flex-column justify-content-center align-items-start w-100">
                                <label class="text-black">Tanggal Lahir</label>
                                <input type="date" class="form-control border-info" name="tanggal_lahir">
                                <!-- ERROR -->
                                <?php if ($validation->getError('tanggal_lahir')) { ?>
                                    <div class="alert alert-danger mt-2" role="alert">
                                        <b>Tanggal Lahir</b> harus di isi
                                    </div>
                                <?php } ?>
                            </div>
                            <div class="d-flex flex-column justify-content-center align-items-start w-100">
                                <label class="text-black">Agama</label>
                                <select aria-label="Default select example" class="form-control border-info" name="agama">
                                    <option selected>-- Pilih Agama --</option>
                                    <option value="islam">Islam</option>
                                    <option value="kristen">Kristen</option>
                                    <option value="hindu">Hindu</option>
                                    <option value="budha">Budha</option>
                                </select>
                                <!-- ERROR -->
                                <?php if ($validation->getError('agama')) { ?>
                                    <div class="alert alert-danger mt-2" role="alert">
                                        <b>Agama</b> harus di pilih
                                    </div>
                                <?php } ?>
                            </div>
                            <div class="d-flex flex-column justify-content-center align-items-start w-100">
                                <label class="text-black">Status Dalam Keluarga:</label>
                                <input class="form-control border-info" name="status_dlm_kel" placeholder="Masukkan Status Anda Dalam Keluarga">
                                <!-- ERROR -->
                                <?php if ($validation->getError('status_dlm_kel')) { ?>
                                    <div class="alert alert-danger mt-2" role="alert">
                                        <b>Status dalam Keluarga</b> harus di isi
                                    </div>
                                <?php } ?>
                            </div>
                        </div>
                        <div class="d-flex justify-content-center align-items-center gap-4 flex-column flex-lg-row w-100">
                            <div class="d-flex flex-column justify-content-center align-items-start w-100">
                                <label class="text-black">Alamat Tempat Tinggal</label>
                                <textarea class="form-control border-info" name="alamat" rows="2" placeholder="Masukkan Alamat Anda"></textarea>
                                <!-- ERROR -->
                                <?php if ($validation->getError('alamat')) { ?>
                                    <div class="alert alert-danger mt-2" role="alert">
                                        <b>Alamat</b> harus di isi
                                    </div>
                                <?php } ?>
                            </div>
                        </div>
                        <div class="d-flex justify-content-center align-items-center gap-4 flex-column flex-lg-row w-100">
                            <div class="d-flex flex-column justify-content-center align-items-start w-100">
                                <label class="text-black">RT</label>
                                <input class="form-control border-info" name="rt" placeholder="Masukkan RT">
                                <!-- ERROR -->
                                <?php if ($validation->getError('rt')) { ?>
                                    <div class="alert alert-danger mt-2" role="alert">
                                        <b>RT</b> harus di isi
                                    </div>
                                <?php } ?>
                            </div>
                            <div class="d-flex flex-column justify-content-center align-items-start w-100">
                                <label class="text-black">RW</label>
                                <input class="form-control border-info" name="rw" placeholder="Masukkan RW">
                                <!-- ERROR -->
                                <?php if ($validation->getError('rw')) { ?>
                                    <div class="alert alert-danger mt-2" role="alert">
                                        <b>RW</b> harus di isi
                                    </div>
                                <?php } ?>
                            </div>
                            <div class="d-flex flex-column justify-content-center align-items-start w-100">
                                <label class="text-black">Kelurahan</label>
                                <input class="form-control border-info" name="kelurahan" placeholder="Masukkan Kelurahan">
                                <!-- ERROR -->
                                <?php if ($validation->getError('kelurahan')) { ?>
                                    <div class="alert alert-danger mt-2" role="alert">
                                        <b>kelurahan</b> harus di isi
                                    </div>
                                <?php } ?>
                            </div>
                        </div>
                        <div class="d-flex justify-content-center align-items-center gap-4 flex-column flex-lg-row w-100">
                            <div class="d-flex flex-column justify-content-center align-items-start w-100">
                                <label class="text-black">Kecamatan</label>
                                <input class="form-control border-info" name="kecamatan" placeholder="Masukkan Kecamatan">
                                <!-- ERROR -->
                                <?php if ($validation->getError('kecamatan')) { ?>
                                    <div class="alert alert-danger mt-2" role="alert">
                                        <b>Kecamatan</b> harus di isi
                                    </div>
                                <?php } ?>
                            </div>
                            <div class="d-flex flex-column justify-content-center align-items-start w-100">
                                <label class="text-black">Kabupaten/Kota</label>
                                <input class="form-control border-info" name="kab_kota" placeholder="Masukkan Kabupaten/Kota">
                                <!-- ERROR -->
                                <?php if ($validation->getError('kab_kota')) { ?>
                                    <div class="alert alert-danger mt-2" role="alert">
                                        <b>Kabupaten/Kota</b> harus di isi
                                    </div>
                                <?php } ?>
                            </div>
                            <div class="d-flex flex-column justify-content-center align-items-start w-100">
                                <label class="text-black">Provinsi</label>
                                <input class="form-control border-info" name="provinsi" placeholder="Masukkan Provinsi">
                                <!-- ERROR -->
                                <?php if ($validation->getError('provinsi')) { ?>
                                    <div class="alert alert-danger mt-2" role="alert">
                                        <b>Provinsi</b> harus di isi
                                    </div>
                                <?php } ?>
                            </div>
                        </div>
                        <div class="d-flex justify-content-center align-items-center gap-4 flex-column flex-lg-row w-100">
                            <div class="d-flex flex-column justify-content-center align-items-start w-100">
                                <label class="text-black">Telepon/No. Hp Siswa</label>
                                <input class="form-control border-info" name="nohp_siswa" placeholder="Masukkan Telepon/No. Hp Anda">
                                <!-- ERROR -->
                                <?php if ($validation->getError('nohp_siswa')) { ?>
                                    <div class="alert alert-danger mt-2" role="alert">
                                        <b>Telepon/No. Hp Siswa</b> harus di isi
                                    </div>
                                <?php } ?>
                            </div>
                            <div class="d-flex flex-column justify-content-center align-items-start w-100">
                                <label class="text-black">Nama Ayah</label>
                                <input class="form-control border-info" name="nama_ayah" placeholder="Masukkan Nama Ayah Anda">
                                <!-- ERROR -->
                                <?php if ($validation->getError('nama_ayah')) { ?>
                                    <div class="alert alert-danger mt-2" role="alert">
                                        <b>Nama Ayah</b> harus di isi
                                    </div>
                                <?php } ?>
                            </div>
                            <div class="d-flex flex-column justify-content-center align-items-start w-100">
                                <label class="text-black">No. NIK Ayah</label>
                                <input class="form-control border-info" name="nik_ayah" placeholder="Masukkan NIK Ayah Anda">
                                <!-- ERROR -->
                                <?php if ($validation->getError('nik_ayah')) { ?>
                                    <div class="alert alert-danger mt-2" role="alert">
                                        <b>No. NIK Ayah</b> harus di isi
                                    </div>
                                <?php } ?>
                            </div>
                        </div>
                        <div class="d-flex justify-content-center align-items-center gap-4 flex-column flex-lg-row w-100">
                            <div class="d-flex flex-column justify-content-center align-items-start w-100">
                                <label class="text-black">Nama Ibu</label>
                                <input class="form-control border-info" name="nama_ibu" placeholder="Masukkan Nama Ibu Anda">
                                <!-- ERROR -->
                                <?php if ($validation->getError('nama_ibu')) { ?>
                                    <div class="alert alert-danger mt-2" role="alert">
                                        <b>Nama Ibu</b> harus di isi
                                    </div>
                                <?php } ?>
                            </div>
                            <div class="d-flex flex-column justify-content-center align-items-start w-100">
                                <label class="text-black">No. NIK Ibu</label>
                                <input class="form-control border-info" name="nik_ibu" placeholder="Masukkan NIK Ibu Anda">
                                <!-- ERROR -->
                                <?php if ($validation->getError('nik_ibu')) { ?>
                                    <div class="alert alert-danger mt-2" role="alert">
                                        <b>No. NIK IBu</b> harus di isi
                                    </div>
                                <?php } ?>
                            </div>
                            <div class="d-flex flex-column justify-content-center align-items-start w-100">
                                <label class="text-black">Telepon/No. Hp Ayah/Ibu</label>
                                <input class="form-control border-info" name="nohp_ortu" placeholder="Masukkan Telepon/No. Hp Ayah/Ibu Anda">
                                <!-- ERROR -->
                                <?php if ($validation->getError('nohp_ortu')) { ?>
                                    <div class="alert alert-danger mt-2" role="alert">
                                        <b>Telepon/No. Hp Ayah/Ibu</b> harus di isi
                                    </div>
                                <?php } ?>
                            </div>
                            <input type="hidden" name="jalur" value="zonasi">
                        </div>
                    </div>
                    <!-- End Data Diri Siswa -->
                    <!-- Nilai Mata Pelajaran -->
                    <span class="badge bg-label-info rounded my-4 px-3 py-2 fs-6 shadow-sm">Nilai Mata Pelajaran</span>
                    <div class="d-flex flex-column justify-content-center align-items-center gap-3">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">Mata Pelajaran</th>
                                    <th scope="col">Semester 1</th>
                                    <th scope="col">Semester 2</th>
                                    <th scope="col">Semester 3</th>
                                    <th scope="col">Semester 4</th>
                                    <th scope="col">Semester 5</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Bahasa Indonesia</td>
                                    <td class="text-center">
                                        <input name="bindo_1" class="form-control border-info" style="width: 50px; height: 50px;">
                                        <?php if ($validation->getError('bindo_1')) { ?>
                                            <div class="alert alert-danger mt-2" role="alert">
                                                Bahasa Indonesia Semester 1 harus di isi/harus berupa angka
                                            </div>
                                        <?php } ?>
                                    </td>
                                    <td class="text-center">
                                        <input name="bindo_2" class="form-control border-info" style="width: 50px; height: 50px;">
                                        <?php if ($validation->getError('bindo_2')) { ?>
                                            <div class="alert alert-danger mt-2" role="alert">
                                                Bahasa Indonesia Semester 2 harus di isi/harus berupa angka
                                            </div>
                                        <?php } ?>
                                    </td>
                                    <td class="text-center">
                                        <input name="bindo_3" class="form-control border-info" style="width: 50px; height: 50px;">
                                        <?php if ($validation->getError('bindo_3')) { ?>
                                            <div class="alert alert-danger mt-2" role="alert">
                                                Bahasa Indonesia Semester 3 harus di isi/harus berupa angka
                                            </div>
                                        <?php } ?>
                                    </td>
                                    <td class="text-center">
                                        <input name="bindo_4" class="form-control border-info" style="width: 50px; height: 50px;">
                                        <?php if ($validation->getError('bindo_4')) { ?>
                                            <div class="alert alert-danger mt-2" role="alert">
                                                Bahasa Indonesia Semester 4 harus di isi/harus berupa angka
                                            </div>
                                        <?php } ?>
                                    </td>
                                    <td class="text-center">
                                        <input name="bindo_5" class="form-control border-info" style="width: 50px; height: 50px;">
                                        <?php if ($validation->getError('bindo_5')) { ?>
                                            <div class="alert alert-danger mt-2" role="alert">
                                                Bahasa Indonesia Semester 5 harus di isi/harus berupa angka
                                            </div>
                                        <?php } ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Bahasa Inggris</td>
                                    <td class="text-center">
                                        <input name="bing_1" class="form-control border-info" style="width: 50px; height: 50px;">
                                        <?php if ($validation->getError('bing_1')) { ?>
                                            <div class="alert alert-danger mt-2" role="alert">
                                                Bahasa Inggris Semester 1 harus di isi/harus berupa angka
                                            </div>
                                        <?php } ?>
                                    </td>
                                    <td class="text-center">
                                        <input name="bing_2" class="form-control border-info" style="width: 50px; height: 50px;">
                                        <?php if ($validation->getError('bing_2')) { ?>
                                            <div class="alert alert-danger mt-2" role="alert">
                                                Bahasa Inggris Semester 2 harus di isi/harus berupa angka
                                            </div>
                                        <?php } ?>
                                    </td>
                                    <td class="text-center">
                                        <input name="bing_3" class="form-control border-info" style="width: 50px; height: 50px;">
                                        <?php if ($validation->getError('bing_3')) { ?>
                                            <div class="alert alert-danger mt-2" role="alert">
                                                Bahasa Inggris Semester 3 harus di isi/harus berupa angka
                                            </div>
                                        <?php } ?>
                                    </td>
                                    <td class="text-center">
                                        <input name="bing_4" class="form-control border-info" style="width: 50px; height: 50px;">
                                        <?php if ($validation->getError('bing_4')) { ?>
                                            <div class="alert alert-danger mt-2" role="alert">
                                                Bahasa Inggris Semester 4 harus di isi/harus berupa angka
                                            </div>
                                        <?php } ?>
                                    </td>
                                    <td class="text-center">
                                        <input name="bing_5" class="form-control border-info" style="width: 50px; height: 50px;">
                                        <?php if ($validation->getError('bing_5')) { ?>
                                            <div class="alert alert-danger mt-2" role="alert">
                                                Bahasa Inggris Semester 5 harus di isi/harus berupa angka
                                            </div>
                                        <?php } ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Matematika</td>
                                    <td class="text-center">
                                        <input name="mtk_1" class="form-control border-info" style="width: 50px; height: 50px;">
                                        <?php if ($validation->getError('mtk_1')) { ?>
                                            <div class="alert alert-danger mt-2" role="alert">
                                                Matematika Semester 1 harus di isi/harus berupa angka
                                            </div>
                                        <?php } ?>
                                    </td>
                                    <td class="text-center">
                                        <input name="mtk_2" class="form-control border-info" style="width: 50px; height: 50px;">
                                        <?php if ($validation->getError('mtk_2')) { ?>
                                            <div class="alert alert-danger mt-2" role="alert">
                                                Matematika Semester 2 harus di isi/harus berupa angka
                                            </div>
                                        <?php } ?>
                                    </td>
                                    <td class="text-center">
                                        <input name="mtk_3" class="form-control border-info" style="width: 50px; height: 50px;">
                                        <?php if ($validation->getError('mtk_3')) { ?>
                                            <div class="alert alert-danger mt-2" role="alert">
                                                Matematika Semester 3 harus di isi/harus berupa angka
                                            </div>
                                        <?php } ?>
                                    </td>
                                    <td class="text-center">
                                        <input name="mtk_4" class="form-control border-info" style="width: 50px; height: 50px;">
                                        <?php if ($validation->getError('mtk_4')) { ?>
                                            <div class="alert alert-danger mt-2" role="alert">
                                                Matematika Semester 4 harus di isi/harus berupa angka
                                            </div>
                                        <?php } ?>
                                    </td>
                                    <td class="text-center">
                                        <input name="mtk_5" class="form-control border-info" style="width: 50px; height: 50px;">
                                        <?php if ($validation->getError('mtk_5')) { ?>
                                            <div class="alert alert-danger mt-2" role="alert">
                                                Matematika Semester 5 harus di isi/harus berupa angka
                                            </div>
                                        <?php } ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td>IPA</td>
                                    <td class="text-center">
                                        <input name="ipa_1" class="form-control border-info" style="width: 50px; height: 50px;">
                                        <?php if ($validation->getError('ipa_1')) { ?>
                                            <div class="alert alert-danger mt-2" role="alert">
                                                IPA Semester 1 harus di isi/harus berupa angka
                                            </div>
                                        <?php } ?>
                                    </td>
                                    <td class="text-center">
                                        <input name="ipa_2" class="form-control border-info" style="width: 50px; height: 50px;">
                                        <?php if ($validation->getError('ipa_2')) { ?>
                                            <div class="alert alert-danger mt-2" role="alert">
                                                IPA Semester 2 harus di isi/harus berupa angka
                                            </div>
                                        <?php } ?>
                                    </td>
                                    <td class="text-center">
                                        <input name="ipa_3" class="form-control border-info" style="width: 50px; height: 50px;">
                                        <?php if ($validation->getError('ipa_3')) { ?>
                                            <div class="alert alert-danger mt-2" role="alert">
                                                IPA Semester 3 harus di isi/harus berupa angka
                                            </div>
                                        <?php } ?>
                                    </td>
                                    <td class="text-center">
                                        <input name="ipa_4" class="form-control border-info" style="width: 50px; height: 50px;">
                                        <?php if ($validation->getError('ipa_4')) { ?>
                                            <div class="alert alert-danger mt-2" role="alert">
                                                IPA Semester 4 harus di isi/harus berupa angka
                                            </div>
                                        <?php } ?>
                                    </td>
                                    <td class="text-center">
                                        <input name="ipa_5" class="form-control border-info" style="width: 50px; height: 50px;">
                                        <?php if ($validation->getError('ipa_5')) { ?>
                                            <div class="alert alert-danger mt-2" role="alert">
                                                IPA Semester 5 harus di isi/harus berupa angka
                                            </div>
                                        <?php } ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td>IPS</td>
                                    <td class="text-center">
                                        <input name="ips_1" class="form-control border-info" style="width: 50px; height: 50px;">
                                        <?php if ($validation->getError('ips_1')) { ?>
                                            <div class="alert alert-danger mt-2" role="alert">
                                                IPS Semester 1 harus di isi/harus berupa angka
                                            </div>
                                        <?php } ?>
                                    </td>
                                    <td class="text-center">
                                        <input name="ips_2" class="form-control border-info" style="width: 50px; height: 50px;">
                                        <?php if ($validation->getError('ips_2')) { ?>
                                            <div class="alert alert-danger mt-2" role="alert">
                                                IPS Semester 2 harus di isi/harus berupa angka
                                            </div>
                                        <?php } ?>
                                    </td>
                                    <td class="text-center">
                                        <input name="ips_3" class="form-control border-info" style="width: 50px; height: 50px;">
                                        <?php if ($validation->getError('ips_3')) { ?>
                                            <div class="alert alert-danger mt-2" role="alert">
                                                IPS Semester 3 harus di isi/harus berupa angka
                                            </div>
                                        <?php } ?>
                                    </td>
                                    <td class="text-center">
                                        <input name="ips_4" class="form-control border-info" style="width: 50px; height: 50px;">
                                        <?php if ($validation->getError('ips_4')) { ?>
                                            <div class="alert alert-danger mt-2" role="alert">
                                                IPS Semester 4 harus di isi/harus berupa angka
                                            </div>
                                        <?php } ?>
                                    </td>
                                    <td class="text-center">
                                        <input name="ips_5" class="form-control border-info" style="width: 50px; height: 50px;">
                                        <?php if ($validation->getError('ips_5')) { ?>
                                            <div class="alert alert-danger mt-2" role="alert">
                                                IPS Semester 5 harus di isi/harus berupa angka
                                            </div>
                                        <?php } ?>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <!-- End Nilai Mata Pelajaran -->
                    <!-- Upload Berkas -->
                    <span class="badge bg-label-info rounded my-4 px-3 py-2 fs-6 shadow-sm">Upload Berkas</span>
                    <div class="d-flex flex-column justify-content-center align-items-start gap-3">
                        <div class="d-flex justify-content-center align-items-center w-100 gap-3">
                            <div class="d-flex justify-content-center align-items-start flex-column mb-3 w-100">
                                <span class="text-black fs-5">Foto</span>
                                <input type="file" class="form-control border-info" name="foto">
                                <?php if ($validation->getError('foto')) { ?>
                                    <div class="alert alert-danger mt-2" role="alert">
                                        <?= $error = $validation->getError('foto') ?>
                                    </div>
                                <?php } ?>
                            </div>
                            <div class="d-flex justify-content-center align-items-start flex-column mb-3 w-100">
                                <span class="text-black fs-5">Kartu Keluarga</span>
                                <input type="file" class="form-control border-info" name="kartu_keluarga">
                                <?php if ($validation->getError('kartu_keluarga')) { ?>
                                    <div class="alert alert-danger mt-2" role="alert">
                                        <?= $error = $validation->getError('kartu_keluarga') ?>
                                    </div>
                                <?php } ?>
                            </div>
                            <div class="d-flex justify-content-center align-items-start flex-column mb-3 w-100">
                                <span class="text-black fs-5">Scan Kartu NISN</span>
                                <input type="file" class="form-control border-info" name="scan_nisn">
                                <?php if ($validation->getError('scan_nisn')) { ?>
                                    <div class="alert alert-danger mt-2" role="alert">
                                        <?= $error = $validation->getError('scan_nisn') ?>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>
                        <div class="d-flex justify-content-center align-items-center w-100 gap-3">
                            <div class="d-flex justify-content-center align-items-start flex-column mb-3 w-100">
                                <span class="text-black fs-5">Raport Semester 1</span>
                                <input type="file" class="form-control border-info" name="rpt_smstr_1">
                                <?php if ($validation->getError('rpt_smstr_1')) { ?>
                                    <div class="alert alert-danger mt-2" role="alert">
                                        <?= $error = $validation->getError('rpt_smstr_1') ?>
                                    </div>
                                <?php } ?>
                            </div>
                            <div class="d-flex justify-content-center align-items-start flex-column mb-3 w-100">
                                <span class="text-black fs-5">Raport Semester 2</span>
                                <input type="file" class="form-control border-info" name="rpt_smstr_2">
                                <?php if ($validation->getError('rpt_smstr_2')) { ?>
                                    <div class="alert alert-danger mt-2" role="alert">
                                        <?= $error = $validation->getError('rpt_smstr_2') ?>
                                    </div>
                                <?php } ?>
                            </div>
                            <div class="d-flex justify-content-center align-items-start flex-column mb-3 w-100">
                                <span class="text-black fs-5">Raport Semester 3</span>
                                <input type="file" class="form-control border-info" name="rpt_smstr_3">
                                <?php if ($validation->getError('rpt_smstr_3')) { ?>
                                    <div class="alert alert-danger mt-2" role="alert">
                                        <?= $error = $validation->getError('rpt_smstr_3') ?>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>
                        <div class="d-flex justify-content-center align-items-center w-100 gap-3">
                            <div class="d-flex justify-content-center align-items-start flex-column mb-3 w-100">
                                <span class="text-black fs-5">Raport Semester 4</span>
                                <input type="file" class="form-control border-info" name="rpt_smstr_4">
                                <?php if ($validation->getError('rpt_smstr_4')) { ?>
                                    <div class="alert alert-danger mt-2" role="alert">
                                        <?= $error = $validation->getError('rpt_smstr_4') ?>
                                    </div>
                                <?php } ?>
                            </div>
                            <div class="d-flex justify-content-center align-items-start flex-column mb-3 w-100">
                                <span class="text-black fs-5">Raport Semester 5</span>
                                <input type="file" class="form-control border-info" name="rpt_smstr_5">
                                <?php if ($validation->getError('rpt_smstr_5')) { ?>
                                    <div class="alert alert-danger mt-2" role="alert">
                                        <?= $error = $validation->getError('rpt_smstr_5') ?>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>
                        <div class="d-flex justify-content-end align-items-center w-100">
                            <button type="submit" class="btn btn-info">Simpan Data</button>
                        </div>
                    </div>
                    <!-- End Upload Berkas -->
                </form>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>