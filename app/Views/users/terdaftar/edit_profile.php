<?= $this->extend('users/templates/index') ?>

<?= $this->section('user-content') ?>

<div class="container py-4">
    <div class="row">
        <div class="col-md-12">
            <h4 class="text-dark">EDIT PROFILE</h4>
            <hr>
            <?php $validation = \Config\Services::validation(); ?>
            <form action="<?= base_url('update-profile/' . $profile['id']); ?>" class="w-100 mt-3" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="_method" value="PUT">
                <div>
                    <input type="hidden" name="jalur" value="<?= $profile['jalur'] ?>">
                    <input type="hidden" name="status" value="<?= $profile['status'] ?>">
                    <input type="hidden" name="verif" value="<?= $profile['verif'] ?>">
                    <div class="row justify-content-center">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="tanggal_pendaftaran" class="form-label">Tanggal
                                    Pendaftaran:</label>
                                <input type="date" readonly name="tanggal_pendaftaran" value="<?= $profile['tanggal_pendaftaran']; ?>" class="form-control border-primary">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="nisn" class="form-label">NISN:</label>
                                <input type="number" id="nisn" name="nisn" class="form-control border-primary" required placeholder="Masukkan NISN Anda" value="<?= $profile['nisn'] ?>" readonly>
                                <!-- ERROR -->
                                <?php if ($validation->getError('nisn')) { ?>
                                    <div class="alert alert-danger mt-2" role="alert">
                                        <b>NISN</b> harus di isi dan berupa angka. min 10 karakter
                                    </div>
                                <?php } ?>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="nik" class="form-label">NIK (Nomor Induk Kependudukan):</label>
                                <input type="number" id="nik" name="nik" class="form-control border-primary" required placeholder="Masukkan NIK Anda" value="<?= $profile['nik'] ?>">
                                <!-- ERROR -->
                                <?php if ($validation->getError('nik')) { ?>
                                    <div class="alert alert-danger mt-2" role="alert">
                                        <b>NIK</b> harus di isi dan berupa angka. min 16 karakter
                                    </div>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                    <div class="row justify-content-center">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="nama_siswa" class="form-label">Nama Siswa:</label>
                                <input type="text" id="nama_siswa" name="nama_siswa" class="form-control border-primary" required placeholder="Masukkan Nama Lengkap Anda" value="<?= $profile['nama_siswa'] ?>" readonly>
                                <!-- ERROR -->
                                <?php if ($validation->getError('nama_siswa')) { ?>
                                    <div class="alert alert-danger mt-2" role="alert">
                                        <b>Nama Siswa</b> harus di isi dan berupa huruf
                                    </div>
                                <?php } ?>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="id_jurusan" class="form-label">Jurusan:</label>
                                <select id="id_jurusan" name="id_jurusan" class="form-control border-primary" required>
                                    <?php if (empty($jurusan)) { ?>
                                        <option selected>Jurusan Belum Tersedia</option>
                                    <?php } else { ?>
                                        <option disabled>-- Pilih Jurusan --</option>
                                        <?php foreach ($jurusan as $row) : ?>
                                            <option value="<?= $row['id'] ?>" <?php if ($profile['id_jurusan'] == $row['id']) echo 'selected' ?>>
                                                <?= $row['jurusan'] ?>
                                            </option>
                                    <?php endforeach;
                                    }
                                    ?>
                                </select>
                                <!-- ERROR -->
                                <?php if ($validation->getError('id_jurusan')) { ?>
                                    <div class="alert alert-danger mt-2" role="alert">
                                        <b>Jurusan</b> harus di isi
                                    </div>
                                <?php } ?>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="jenis_kelamin" class="form-label">Jenis Kelamin:</label>
                                <select id="jenis_kelamin" name="jenis_kelamin" class="form-control border-primary" required>
                                    <option <?php if ($profile['jenis_kelamin'] == '') echo 'selected' ?> disabled>-- Pilih Jenis Kelamin --</option>
                                    <option value="laki-laki" <?php if ($profile['jenis_kelamin'] == 'laki-laki') echo 'selected' ?>>Laki-laki</option>
                                    <option value="perempuan" <?php if ($profile['jenis_kelamin'] == 'perempuan') echo 'selected' ?>>Perempuan</option>
                                </select>
                                <!-- ERROR -->
                                <?php if ($validation->getError('jenis_kelamin')) { ?>
                                    <div class="alert alert-danger mt-2" role="alert">
                                        <b>Jenis Kelamin</b> harus di isi
                                    </div>
                                <?php } ?>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="tempat_lahir" class="form-label">Tempat Lahir:</label>
                                <input type="text" id="tempat_lahir" name="tempat_lahir" class="form-control border-primary" required placeholder="Masukkan Tempat Lahir Anda" value="<?= $profile['tempat_lahir'] ?>">
                                <?php if ($validation->getError('tempat_lahir')) { ?>
                                    <div class="alert alert-danger mt-2" role="alert">
                                        <b>Tempat Lahir</b> harus di isi
                                    </div>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                    <div class="row justify-content-center">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="tanggal_lahir" class="form-label">Tanggal Lahir:</label>
                                <input type="date" id="tanggal_lahir" name="tanggal_lahir" class="form-control border-primary" required value="<?= $profile['tanggal_lahir'] ?>">
                                <?php if ($validation->getError('tanggal_lahir')) { ?>
                                    <div class="alert alert-danger mt-2" role="alert">
                                        <b>Tanggal Lahir</b> harus di isi
                                    </div>
                                <?php } ?>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="agama" class="form-label">Agama:</label>
                                <select id="agama" name="agama" class="form-control border-primary" required>
                                    <option disabled>-- Pilih Agama --</option>
                                    <option value="islam" <?php if ($profile['agama'] == 'islam') echo 'selected' ?>>Islam</option>
                                    <option value="kristen" <?php if ($profile['agama'] == 'kristen') echo 'selected' ?>>Kristen</option>
                                    <option value="hindu" <?php if ($profile['agama'] == 'hindu') echo 'selected' ?>>Hindu</option>
                                    <option value="budha" <?php if ($profile['agama'] == 'budha') echo 'selected' ?>>Budha</option>
                                </select>
                                <?php if ($validation->getError('agama')) { ?>
                                    <div class="alert alert-danger mt-2" role="alert">
                                        <b>Agama</b> harus di isi
                                    </div>
                                <?php } ?>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="status_dlm_kel" class="form-label">Status dalam keluarga:</label>
                                <select id="status_dlm_kel" name="status_dlm_kel" class="form-control border-primary" required>
                                    <option disabled>-- Pilih Status --</option>
                                    <option value="suami" <?php if ($profile['status_dlm_kel'] == 'suami') echo 'selected' ?>>Suami</option>
                                    <option value="istri" <?php if ($profile['status_dlm_kel'] == 'istri') echo 'selected' ?>>Istri</option>
                                    <option value="anak" <?php if ($profile['status_dlm_kel'] == 'anak') echo 'selected' ?>>Anak</option>
                                </select>
                                <?php if ($validation->getError('status_dlm_kel')) { ?>
                                    <div class="alert alert-danger mt-2" role="alert">
                                        <b>Status dalam keluarga</b> harus di isi
                                    </div>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                    <div class="row justify-content-center">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="alamat" class="form-label">Alamat:</label>
                                <textarea id="alamat" name="alamat" class="form-control border-primary" required placeholder="Masukkan Alamat Tempat Tinggal Anda"><?= $profile['alamat'] ?></textarea>
                                <?php if ($validation->getError('alamat')) { ?>
                                    <div class="alert alert-danger mt-2" role="alert">
                                        <b>Alamat</b> harus di isi
                                    </div>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                    <div class="row justify-content-center">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="rt" class="form-label">RT:</label>
                                <input type="number" id="rt" name="rt" class="form-control border-primary" required placeholder="Masukkan RT" value="<?= $profile['rt'] ?>">
                                <?php if ($validation->getError('rt')) { ?>
                                    <div class="alert alert-danger mt-2" role="alert">
                                        <b>RT</b> harus di isi
                                    </div>
                                <?php } ?>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="rw" class="form-label">RW:</label>
                                <input type="number" id="rw" name="rw" class="form-control border-primary" required placeholder="Masukkan RW" value="<?= $profile['rw'] ?>">
                                <?php if ($validation->getError('rw')) { ?>
                                    <div class="alert alert-danger mt-2" role="alert">
                                        <b>RW</b> harus di isi
                                    </div>
                                <?php } ?>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="kelurahan" class="form-label">Kelurahan:</label>
                                <input type="text" id="kelurahan" name="kelurahan" class="form-control border-primary" required placeholder="Masukkan Kelurahan" value="<?= $profile['kelurahan'] ?>">
                                <?php if ($validation->getError('kelurahan')) { ?>
                                    <div class="alert alert-danger mt-2" role="alert">
                                        <b>Kelurahan</b> harus di isi
                                    </div>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                    <div class="row justify-content-center">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="kecamatan" class="form-label">Kecamatan:</label>
                                <input type="text" id="kecamatan" name="kecamatan" class="form-control border-primary" required placeholder="Masukkan Kecamatan" value="<?= $profile['kecamatan'] ?>">
                                <?php if ($validation->getError('kecamatan')) { ?>
                                    <div class="alert alert-danger mt-2" role="alert">
                                        <b>Kecamatan</b> harus di isi
                                    </div>
                                <?php } ?>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="kab_kota" class="form-label">Kabupaten/Kota:</label>
                                <input type="text" id="kab_kota" name="kab_kota" class="form-control border-primary" required placeholder="Masukkan Kabupaten/Kota" value="<?= $profile['kab_kota'] ?>">
                                <?php if ($validation->getError('kab_kota')) { ?>
                                    <div class="alert alert-danger mt-2" role="alert">
                                        <b>Kabupaten/Kota</b> harus di isi
                                    </div>
                                <?php } ?>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="provinsi" class="form-label">Provinsi:</label>
                                <input type="text" id="provinsi" name="provinsi" class="form-control border-primary" required placeholder="Masukkan Provinsi" value="<?= $profile['provinsi'] ?>">
                                <?php if ($validation->getError('provinsi')) { ?>
                                    <div class="alert alert-danger mt-2" role="alert">
                                        <b>Provinsi</b> harus di isi
                                    </div>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                    <div class="row justify-content-center">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="nohp_siswa" class="form-label">Telepon/No. HP Siswa:</label>
                                <input type="number" id="nohp_siswa" name="nohp_siswa" class="form-control border-primary" required placeholder="Masukkan Telepon/No. HP Siswa" value="<?= $profile['nohp_siswa'] ?>">
                                <?php if ($validation->getError('nohp_siswa')) { ?>
                                    <div class="alert alert-danger mt-2" role="alert">
                                        <b>Telepon/No. HP Siswa</b> harus di isi
                                    </div>
                                <?php } ?>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="nama_ayah" class="form-label">Nama Ayah:</label>
                                <input type="text" id="nama_ayah" name="nama_ayah" class="form-control border-primary" required placeholder="Masukkan Nama Ayah" value="<?= $profile['nama_ayah'] ?>">
                                <?php if ($validation->getError('nama_ayah')) { ?>
                                    <div class="alert alert-danger mt-2" role="alert">
                                        <b>Nama Ayah</b> harus di isi
                                    </div>
                                <?php } ?>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="nik_ayah" class="form-label">No. NIK Ayah:</label>
                                <input type="number" id="nik_ayah" name="nik_ayah" class="form-control border-primary" required placeholder="Masukkan No. NIK Ayah" value="<?= $profile['nik_ayah'] ?>">
                                <?php if ($validation->getError('nik_ayah')) { ?>
                                    <div class="alert alert-danger mt-2" role="alert">
                                        <b>No. NIK Ayah</b> harus di isi
                                    </div>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                    <div class="row justify-content-center">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="nama_ibu" class="form-label">Nama Ibu:</label>
                                <input type="text" id="nama_ibu" name="nama_ibu" value="<?= $profile['nama_ibu'] ?>" class="form-control border-primary" required placeholder="Masukkan Nama Ibu">
                                <?php if ($validation->getError('nama_ibu')) { ?>
                                    <div class="alert alert-danger mt-2" role="alert">
                                        <b>Nama Ibu</b> harus di isi
                                    </div>
                                <?php } ?>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="nik_ibu" class="form-label">No. NIK Ibu:</label>
                                <input type="number" id="nik_ibu" name="nik_ibu" value="<?= $profile['nik_ibu'] ?>" class="form-control border-primary" required placeholder="Masukkan No. NIK Ibu">
                                <?php if ($validation->getError('nik_ibu')) { ?>
                                    <div class="alert alert-danger mt-2" role="alert">
                                        <b>No. NIK Ibu</b> harus di isi
                                    </div>
                                <?php } ?>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="nohp_ortu" class="form-label">Telepon/No. Ayah/Ibu:</label>
                                <input type="number" id="nohp_ortu" name="nohp_ortu" value="<?= $profile['nohp_ortu'] ?>" class="form-control border-primary" required placeholder="Masukkan Telepon/No. HP Ayah/Ibu Siswa">
                                <?php if ($validation->getError('nohp_ortu')) { ?>
                                    <div class="alert alert-danger mt-2" role="alert">
                                        <b>Telepon/No. Ayah/Ibu</b> harus di isi
                                    </div>
                                <?php } ?>
                            </div>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary mt-2">Update Data</button>
                </div>
            </form>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>