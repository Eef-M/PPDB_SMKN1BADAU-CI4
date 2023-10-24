<div class="row justify-content-center">
    <div class="col-md-4">
        <div class="form-group">
            <label for="tanggal_pendaftaran" class="form-label">Tanggal
                Pendaftaran:</label>
            <input type="date" id="tanggal_pendaftaran" name="tanggal_pendaftaran" class="form-control border-primary"
                required>
            <div class="invalid-feedback">
                Tanggal pendaftaran harus diisi.
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            <label for="nisn" class="form-label">NISN:</label>
            <input type="text" id="nisn" name="nisn" class="form-control border-primary" required
                placeholder="Masukkan NISN Anda">
            <div class="invalid-feedback">
                NISN harus diisi.
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            <label for="nik" class="form-label">NIK (Nomor Induk Kependudukan):</label>
            <input type="text" id="nik" name="nik" class="form-control border-primary" required
                placeholder="Masukkan NIK Anda">
            <div class="invalid-feedback">
                NIK harus diisi.
            </div>
        </div>
    </div>
</div>
<div class="row justify-content-center">
    <div class="col-md-3">
        <div class="form-group">
            <label for="nama_siswa" class="form-label">Nama Siswa:</label>
            <input type="text" id="nama_siswa" name="nama_siswa" class="form-control border-primary" required
                placeholder="Masukkan Nama Lengkap Anda">
            <div class="invalid-feedback">
                Nama Siswa harus diisi.
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            <label for="jurusan" class="form-label">Jurusan:</label>
            <select id="jurusan" name="jurusan" class="form-control border-primary" required>
                <option selected>-- Pilih Jurusan --</option>
                <option value="MULTIMEDIA">MULTIMEDIA</option>
                <option value="PEMASARAN">PEMASARAN</option>
                <option value="AKUNTANSI">AKUNTANSI</option>
            </select>
            <div class="invalid-feedback">
                Jurusan harus dipilih.
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            <label for="gender" class="form-label">Jenis Kelamin:</label>
            <select id="gender" name="gender" class="form-control border-primary" required>
                <option value="">-- Pilih Jenis Kelamin --</option>
                <option value="laki-laki">Laki-laki</option>
                <option value="perempuan">Perempuan</option>
            </select>
            <div class="invalid-feedback">
                Jenis Kelamin harus dipilih.
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            <label for="tempat_lahir" class="form-label">Tempat Lahir:</label>
            <input type="text" id="tempat_lahir" name="tempat_lahir" class="form-control border-primary" required
                placeholder="Masukkan Tempat Lahir Anda">
            <div class="invalid-feedback">
                Tempat Lahir harus diisi.
            </div>
        </div>
    </div>
</div>
<div class="row justify-content-center">
    <div class="col-md-4">
        <div class="form-group">
            <label for="tanggal_lahir" class="form-label">Tanggal Lahir:</label>
            <input type="date" id="tanggal_lahir" name="tanggal_lahir" class="form-control border-primary" required>
            <div class="invalid-feedback">
                Tanggal Lahir harus diisi.
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            <label for="agama" class="form-label">Agama:</label>
            <select id="agama" name="agama" class="form-control border-primary" required>
                <option selected>-- Pilih Agama --</option>
                <option value="islam">Islam</option>
                <option value="kristen">Kristen</option>
                <option value="hindu">Hindu</option>
                <option value="budha">Budha</option>
            </select>
            <div class="invalid-feedback">
                Agama harus dipilih.
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            <label for="status_dlm_kel" class="form-label">Status dalam keluarga:</label>
            <input type="text" id="status_dlm_kel" name="status_dlm_kel" class="form-control border-primary" required
                placeholder="Masukkan Status Anda dalam Keluarga">
            <div class="invalid-feedback">
                Status dalam keluarga harus diisi.
            </div>
        </div>
    </div>
</div>
<div class="row justify-content-center">
    <div class="col-md-12">
        <div class="form-group">
            <label for="alamat" class="form-label">Alamat:</label>
            <textarea id="alamat" name="alamat" class="form-control border-primary" required
                placeholder="Masukkan Alamat Tempat Tinggal Anda"></textarea>
            <div class="invalid-feedback">
                Alamat harus diisi.
            </div>
        </div>
    </div>
</div>
<div class="row justify-content-center">
    <div class="col-md-4">
        <div class="form-group">
            <label for="rt" class="form-label">RT:</label>
            <input type="text" id="rt" name="rt" class="form-control border-primary" required placeholder="Masukkan RT">
            <div class="invalid-feedback">
                RT harus diisi.
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            <label for="rw" class="form-label">RW:</label>
            <input type="text" id="rw" name="rw" class="form-control border-primary" required placeholder="Masukkan RW">
            <div class="invalid-feedback">
                RW harus diisi.
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            <label for="kelurahan" class="form-label">Kelurahan:</label>
            <input type="text" id="kelurahan" name="kelurahan" class="form-control border-primary" required
                placeholder="Masukkan Kelurahan">
            <div class="invalid-feedback">
                Kelurahan harus diisi.
            </div>
        </div>
    </div>
</div>
<div class="row justify-content-center">
    <div class="col-md-4">
        <div class="form-group">
            <label for="kecamatan" class="form-label">Kecamatan:</label>
            <input type="text" id="kecamatan" name="kecamatan" class="form-control border-primary" required
                placeholder="Masukkan Kecamatan">
            <div class="invalid-feedback">
                Kecamatan harus diisi.
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            <label for="kab_kota" class="form-label">Kabupaten/Kota:</label>
            <input type="text" id="kab_kota" name="kab_kota" class="form-control border-primary" required
                placeholder="Masukkan Kabupaten/Kota">
            <div class="invalid-feedback">
                Kabupaten/Kota harus diisi.
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            <label for="provinsi" class="form-label">Provinsi:</label>
            <input type="text" id="provinsi" name="provinsi" class="form-control border-primary" required
                placeholder="Masukkan Provinsi">
            <div class="invalid-feedback">
                Provinsi harus diisi.
            </div>
        </div>
    </div>
</div>
<div class="row justify-content-center">
    <div class="col-md-4">
        <div class="form-group">
            <label for="nohp_siswa" class="form-label">Telepon/No. HP Siswa:</label>
            <input type="text" id="nohp_siswa" name="nohp_siswa" class="form-control border-primary" required
                placeholder="Masukkan Telepon/No. HP Siswa">
            <div class="invalid-feedback">
                Telepon/No. HP Siswa harus diisi.
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            <label for="nama_ayah" class="form-label">Nama Ayah:</label>
            <input type="text" id="nama_ayah" name="nama_ayah" class="form-control border-primary" required
                placeholder="Masukkan Nama Ayah">
            <div class="invalid-feedback">
                Nama Ayah harus diisi.
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            <label for="nik_ayah" class="form-label">No. NIK AYAH:</label>
            <input type="text" id="nik_ayah" name="nik_ayah" class="form-control border-primary" required
                placeholder="Masukkan No. NIK Ayah">
            <div class="invalid-feedback">
                No. NIK Ayah harus diisi.
            </div>
        </div>
    </div>
</div>
<div class="row justify-content-center">
    <div class="col-md-4">
        <div class="form-group">
            <label for="nama_ibu" class="form-label">Nama Ibu:</label>
            <input type="text" id="nama_ibu" name="nama_ibu" class="form-control border-primary" required
                placeholder="Masukkan Nama Ibu">
            <div class="invalid-feedback">
                Nama Ibu harus diisi.
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            <label for="nik_ibu" class="form-label">No. NIK Ibu:</label>
            <input type="text" id="nik_ibu" name="nik_ibu" class="form-control border-primary" required
                placeholder="Masukkan No. NIK Ibu">
            <div class="invalid-feedback">
                No. NIK Ibu harus diisi.
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            <label for="nohp_siswa" class="form-label">Telepon/No. Ayah/Ibu:</label>
            <input type="text" id="nohp_siswa" name="nohp_siswa" class="form-control border-primary" required
                placeholder="Masukkan Telepon/No. HP Ayah/Ibu Siswa">
            <div class="invalid-feedback">
                Telepon/No. HP Ayah/Ibu harus diisi.
            </div>
        </div>
    </div>
</div>