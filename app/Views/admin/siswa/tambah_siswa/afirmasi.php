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
            <span class="badge bg-label-primary text-center fs-5 fw-bold">JALUR AFIRMASI</span>
            <hr class="hr mx-4" />
            <div class="card-body">
                <?php $validation = \Config\Services::validation(); ?>

                <form action="<?= base_url('siswa-store'); ?>" method="POST" enctype="multipart/form-data">
                    <!-- Data Diri Siswa -->
                    <span class="badge bg-label-primary rounded mb-4 px-3 py-2 fs-6 shadow-sm">Data Diri Siswa</span>
                    <div class="d-flex flex-column justify-content-center align-items-center gap-3">
                        <div
                            class="d-flex justify-content-center align-items-center gap-4 flex-column flex-lg-row w-100">
                            <div class="d-flex flex-column justify-content-center align-items-start w-100">
                                <label class="text-black">Tanggal Pendaftaran</label>
                                <input type="text" class="form-control border-primary" disabled value="<?= $date; ?>">
                                <!-- ERROR -->
                                <?php if ($validation->getError('tanggal_pendaftaran')) { ?>
                                <div class="alert alert-danger mt-2" role="alert">
                                    <b>Tanggal Pendaftaran</b> harus di isi
                                </div>
                                <?php } ?>
                            </div>
                            <div class="d-flex flex-column justify-content-center align-items-start w-100">
                                <label class="text-black">NISN</label>
                                <input class="form-control border-primary" name="nisn" placeholder="Masukkan NISN Anda">
                                <!-- ERROR -->
                                <?php if ($validation->getError('nisn')) { ?>
                                <div class="alert alert-danger mt-2" role="alert">
                                    <b>NISN</b> harus di isi
                                </div>
                                <?php } ?>
                            </div>
                            <div class="d-flex flex-column justify-content-center align-items-start w-100">
                                <label class="text-black">NIK (Nomor Induk Kependudukan)</label>
                                <input class="form-control border-primary" name="nik" placeholder="Masukkan NIK Anda">
                                <!-- ERROR -->
                                <?php if ($validation->getError('nik')) { ?>
                                <div class="alert alert-danger mt-2" role="alert">
                                    <b>NIK</b> harus di isi
                                </div>
                                <?php } ?>
                            </div>
                            <div class="d-flex flex-column justify-content-center align-items-start w-100">
                                <label class="text-black">Jurusan</label>
                                <select aria-label="Default select example" class="form-control border-primary" name="id_jurusan">
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
                        <div
                            class="d-flex justify-content-center align-items-center gap-4 flex-column flex-lg-row w-100">
                            <div class="d-flex flex-column justify-content-center align-items-start w-100">
                                <label class="text-black">Nama Siswa</label>
                                <input class="form-control border-primary" name="nama_siswa"
                                    placeholder="Masukkan Nama Lengkap Anda">
                                <!-- ERROR -->
                                <?php if ($validation->getError('nama_siswa')) { ?>
                                <div class="alert alert-danger mt-2" role="alert">
                                    <b>Nama Siswa</b> harus di isi
                                </div>
                                <?php } ?>
                            </div>
                            <div class="d-flex flex-column justify-content-center align-items-start w-100">
                                <label class="text-black">Jenis Kelamin</label>
                                <select aria-label="Default select example" class="form-control border-primary"
                                    name="jenis_kelamin">
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
                                <input class="form-control border-primary" name="tempat_lahir"
                                    placeholder="Masukkan Tempat Lahir Anda">
                                <!-- ERROR -->
                                <?php if ($validation->getError('tempat_lahir')) { ?>
                                <div class="alert alert-danger mt-2" role="alert">
                                    <b>Tempat Lahir</b> harus di isi
                                </div>
                                <?php } ?>
                            </div>
                        </div>
                        <div
                            class="d-flex justify-content-center align-items-center gap-4 flex-column flex-lg-row w-100">
                            <div class="d-flex flex-column justify-content-center align-items-start w-100">
                                <label class="text-black">Tanggal Lahir</label>
                                <input type="date" class="form-control border-primary" name="tanggal_lahir">
                                <!-- ERROR -->
                                <?php if ($validation->getError('tanggal_lahir')) { ?>
                                <div class="alert alert-danger mt-2" role="alert">
                                    <b>Tanggal Lahir</b> harus di isi
                                </div>
                                <?php } ?>
                            </div>
                            <div class="d-flex flex-column justify-content-center align-items-start w-100">
                                <label class="text-black">Agama</label>
                                <select aria-label="Default select example" class="form-control border-primary"
                                    name="agama">
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
                                <select aria-label="Default select example" class="form-control border-primary" name="status_dlm_kel">
                                    <option selected>-- Pilih Status --</option>
                                    <option value="suami">Suami</option>
                                    <option value="istri">Istri</option>
                                    <option value="anak">Anak</option>
                                </select>
                                <!-- ERROR -->
                                <?php if ($validation->getError('status_dlm_kel')) { ?>
                                <div class="alert alert-danger mt-2" role="alert">
                                    <b>Status dalam Keluarga</b> harus di isi
                                </div>
                                <?php } ?>
                            </div>
                        </div>
                        <div
                            class="d-flex justify-content-center align-items-center gap-4 flex-column flex-lg-row w-100">
                            <div class="d-flex flex-column justify-content-center align-items-start w-100">
                                <label class="text-black">Alamat Tempat Tinggal</label>
                                <textarea class="form-control border-primary" name="alamat" rows="2"
                                    placeholder="Masukkan Alamat Anda"></textarea>
                                <!-- ERROR -->
                                <?php if ($validation->getError('alamat')) { ?>
                                <div class="alert alert-danger mt-2" role="alert">
                                    <b>Alamat</b> harus di isi
                                </div>
                                <?php } ?>
                            </div>
                        </div>
                        <div
                            class="d-flex justify-content-center align-items-center gap-4 flex-column flex-lg-row w-100">
                            <div class="d-flex flex-column justify-content-center align-items-start w-100">
                                <label class="text-black">RT</label>
                                <input class="form-control border-primary" name="rt" placeholder="Masukkan RT">
                                <!-- ERROR -->
                                <?php if ($validation->getError('rt')) { ?>
                                <div class="alert alert-danger mt-2" role="alert">
                                    <b>RT</b> harus di isi
                                </div>
                                <?php } ?>
                            </div>
                            <div class="d-flex flex-column justify-content-center align-items-start w-100">
                                <label class="text-black">RW</label>
                                <input class="form-control border-primary" name="rw" placeholder="Masukkan RW">
                                <!-- ERROR -->
                                <?php if ($validation->getError('rw')) { ?>
                                <div class="alert alert-danger mt-2" role="alert">
                                    <b>RW</b> harus di isi
                                </div>
                                <?php } ?>
                            </div>
                            <div class="d-flex flex-column justify-content-center align-items-start w-100">
                                <label class="text-black">Kelurahan</label>
                                <input class="form-control border-primary" name="kelurahan"
                                    placeholder="Masukkan Kelurahan">
                                <!-- ERROR -->
                                <?php if ($validation->getError('kelurahan')) { ?>
                                <div class="alert alert-danger mt-2" role="alert">
                                    <b>kelurahan</b> harus di isi
                                </div>
                                <?php } ?>
                            </div>
                        </div>
                        <div
                            class="d-flex justify-content-center align-items-center gap-4 flex-column flex-lg-row w-100">
                            <div class="d-flex flex-column justify-content-center align-items-start w-100">
                                <label class="text-black">Kecamatan</label>
                                <input class="form-control border-primary" name="kecamatan"
                                    placeholder="Masukkan Kecamatan">
                                <!-- ERROR -->
                                <?php if ($validation->getError('kecamatan')) { ?>
                                <div class="alert alert-danger mt-2" role="alert">
                                    <b>Kecamatan</b> harus di isi
                                </div>
                                <?php } ?>
                            </div>
                            <div class="d-flex flex-column justify-content-center align-items-start w-100">
                                <label class="text-black">Kabupaten/Kota</label>
                                <input class="form-control border-primary" name="kab_kota"
                                    placeholder="Masukkan Kabupaten/Kota">
                                <!-- ERROR -->
                                <?php if ($validation->getError('kab_kota')) { ?>
                                <div class="alert alert-danger mt-2" role="alert">
                                    <b>Kabupaten/Kota</b> harus di isi
                                </div>
                                <?php } ?>
                            </div>
                            <div class="d-flex flex-column justify-content-center align-items-start w-100">
                                <label class="text-black">Provinsi</label>
                                <input class="form-control border-primary" name="provinsi"
                                    placeholder="Masukkan Provinsi">
                                <!-- ERROR -->
                                <?php if ($validation->getError('provinsi')) { ?>
                                <div class="alert alert-danger mt-2" role="alert">
                                    <b>Provinsi</b> harus di isi
                                </div>
                                <?php } ?>
                            </div>
                        </div>
                        <div
                            class="d-flex justify-content-center align-items-center gap-4 flex-column flex-lg-row w-100">
                            <div class="d-flex flex-column justify-content-center align-items-start w-100">
                                <label class="text-black">Telepon/No. Hp Siswa</label>
                                <input class="form-control border-primary" name="nohp_siswa"
                                    placeholder="Masukkan Telepon/No. Hp Anda">
                                <!-- ERROR -->
                                <?php if ($validation->getError('nohp_siswa')) { ?>
                                <div class="alert alert-danger mt-2" role="alert">
                                    <b>Telepon/No. Hp Siswa</b> harus di isi
                                </div>
                                <?php } ?>
                            </div>
                            <div class="d-flex flex-column justify-content-center align-items-start w-100">
                                <label class="text-black">Nama Ayah</label>
                                <input class="form-control border-primary" name="nama_ayah"
                                    placeholder="Masukkan Nama Ayah Anda">
                                <!-- ERROR -->
                                <?php if ($validation->getError('nama_ayah')) { ?>
                                <div class="alert alert-danger mt-2" role="alert">
                                    <b>Nama Ayah</b> harus di isi
                                </div>
                                <?php } ?>
                            </div>
                            <div class="d-flex flex-column justify-content-center align-items-start w-100">
                                <label class="text-black">No. NIK Ayah</label>
                                <input class="form-control border-primary" name="nik_ayah"
                                    placeholder="Masukkan NIK Ayah Anda">
                                <!-- ERROR -->
                                <?php if ($validation->getError('nik_ayah')) { ?>
                                <div class="alert alert-danger mt-2" role="alert">
                                    <b>No. NIK Ayah</b> harus di isi
                                </div>
                                <?php } ?>
                            </div>
                        </div>
                        <div
                            class="d-flex justify-content-center align-items-center gap-4 flex-column flex-lg-row w-100">
                            <div class="d-flex flex-column justify-content-center align-items-start w-100">
                                <label class="text-black">Nama Ibu</label>
                                <input class="form-control border-primary" name="nama_ibu"
                                    placeholder="Masukkan Nama Ibu Anda">
                                <!-- ERROR -->
                                <?php if ($validation->getError('nama_ibu')) { ?>
                                <div class="alert alert-danger mt-2" role="alert">
                                    <b>Nama Ibu</b> harus di isi
                                </div>
                                <?php } ?>
                            </div>
                            <div class="d-flex flex-column justify-content-center align-items-start w-100">
                                <label class="text-black">No. NIK Ibu</label>
                                <input class="form-control border-primary" name="nik_ibu"
                                    placeholder="Masukkan NIK Ibu Anda">
                                <!-- ERROR -->
                                <?php if ($validation->getError('nik_ibu')) { ?>
                                <div class="alert alert-danger mt-2" role="alert">
                                    <b>No. NIK IBu</b> harus di isi
                                </div>
                                <?php } ?>
                            </div>
                            <div class="d-flex flex-column justify-content-center align-items-start w-100">
                                <label class="text-black">Telepon/No. Hp Ayah/Ibu</label>
                                <input class="form-control border-primary" name="nohp_ortu"
                                    placeholder="Masukkan Telepon/No. Hp Ayah/Ibu Anda">
                                <!-- ERROR -->
                                <?php if ($validation->getError('nohp_ortu')) { ?>
                                <div class="alert alert-danger mt-2" role="alert">
                                    <b>Telepon/No. Hp Ayah/Ibu</b> harus di isi
                                </div>
                                <?php } ?>
                            </div>
                            <input type="hidden" name="jalur" value="afirmasi">
                        </div>
                    </div>
                    <!-- End Data Diri Siswa -->
                    <!-- Upload Berkas -->
                    <span class="badge bg-label-primary rounded my-4 px-3 py-2 fs-6 shadow-sm">Upload Berkas</span>
                    <div class="d-flex flex-column justify-content-center align-items-start gap-3">
                        <div class="d-flex justify-content-center align-items-center w-100 gap-3">
                            <div class="d-flex justify-content-center align-items-start flex-column mb-3 w-100">
                                <span class="text-black fs-5">Foto</span>
                                <input type="file" class="form-control border-primary" name="foto" required>
                                <span class="text-secondary fst-italic mt-2" style="font-size: 14px;">Format file JPG/JPEG/PNG. Max 4MB</span>
                            </div>
                            <div class="d-flex justify-content-center align-items-start flex-column mb-3 w-100">
                                <span class="text-black fs-5">Kartu Keluarga</span>
                                <input type="file" class="form-control border-primary" name="kartu_keluarga" required>
                                <span class="text-secondary fst-italic mt-2" style="font-size: 14px;">Format file PDF. Max 10MB</span>
                            </div>
                            <div class="d-flex justify-content-center align-items-start flex-column mb-3 w-100">
                                <span class="text-black fs-5">Scan Kartu NISN</span>
                                <input type="file" class="form-control border-primary" name="scan_nisn" required>
                                <span class="text-secondary fst-italic mt-2" style="font-size: 14px;">Format file PDF. Max 10MB</span>
                            </div>
                        </div>
                        <div class="d-flex justify-content-center align-items-center w-100 gap-3">
                            <div class="d-flex justify-content-center align-items-start flex-column mb-3 w-100">
                                <span class="text-black fs-5">Raport Semester 1 sampai 5</span>
                                <input type="file" class="form-control border-primary" name="rpt_smstr_1sd5" required>
                                <span class="text-secondary fst-italic mt-2" style="font-size: 14px;">Format file PDF. Max 20MB</span>
                            </div>
                            <div class="d-flex justify-content-center align-items-start flex-column mb-3 w-100">
                                <span class="text-black fs-5">Bukti Keluarga Kurang Mampu</span>
                                <input type="file" class="form-control border-primary" name="kel_kur_mampu" required>
                                <span class="text-secondary fst-italic mt-2" style="font-size: 14px;">Format file PDF. Max 10MB</span>
                            </div>
                        </div>
                        <div class="d-flex justify-content-end align-items-center w-100">
                            <button type="submit" class="btn btn-primary">Simpan Data</button>
                        </div>
                    </div>
                    <!-- End Upload Berkas -->
                </form>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>