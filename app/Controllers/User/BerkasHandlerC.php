<?php

namespace App\Controllers\User;

use App\Controllers\BaseController;
use App\Models\Data_siswa;
use App\Models\Upload_berkas;
use CodeIgniter\Files\File;

class BerkasHandlerC extends BaseController
{

    public function unduhPDF($id, $field)
    {
        $upload_berkas = new Upload_berkas();
        $siswa = new Data_siswa();
        $file = $upload_berkas->find($id);
        $getSiswaID = $siswa->getIdByNisn(user()->nisn);
        $siswaIDconv = implode($getSiswaID);
        $ID_siswa = intval($siswaIDconv);
        $theSiswa = $siswa->find($ID_siswa);

        $filename = $file[$field];

        $customFilename = $theSiswa['nama_siswa'] . '-' . $field . '.pdf';

        return $this->response->download('uploads/berkas_siswa/' . $filename, null)
            ->setFileName($customFilename);
    }


    public function view_foto($id, $field)
    {
        $upload_berkas = new Upload_berkas();
        $gambar = $upload_berkas->find($id);

        $filename = $gambar[$field];

        $file = 'uploads/berkas_siswa/' . $filename;

        $mime = mime_content_type($file);

        $image = file_get_contents($file);

        $dataUri = 'data:' . $mime . ';base64,' . base64_encode($image);

        return view('users/terdaftar/view_foto', ['dataUri' => $dataUri]);
    }

    public function updateFoto($id)
    {
        $upload_berkas = new Upload_berkas();

        $up_foto = $this->request->getFile('foto');

        if (!$up_foto->isValid() || !in_array($up_foto->getClientMimeType(), ['image/jpeg', 'image/jpg', 'image/png']) || $up_foto->getSize() > 4 * 1024 * 1024) {
            return redirect()->to(base_url('error-berkas'))->with('error', '<span class="text-primary fs-4 fw-bold">Berkas foto harus berupa JPG, JPEG, atau PNG dan maksimal ukuran file 4MB. Silahkan isi ulang </span>');
        }

        $berkasSebelum = $upload_berkas->find($id);

        if ($berkasSebelum['foto'] && file_exists('uploads/berkas_siswa/' . $berkasSebelum['foto'])) {
            unlink('uploads/berkas_siswa/' . $berkasSebelum['foto']);
        }

        $name_foto = $up_foto->getRandomName();

        $data = [
            'foto' => $name_foto,
        ];

        $up_foto->move('uploads/berkas_siswa/', $name_foto);

        $upload_berkas->update($id, $data);

        return redirect()->to(base_url('user-ppdb'))->with('status', '<div class="alert alert-success alert-dismissible mx-4" role="alert">Berkas Berhasil di Update<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>');
    }

    public function updateKK($id)
    {
        $upload_berkas = new Upload_berkas();

        $up_kk = $this->request->getFile('kartu_keluarga');

        if (!$up_kk->isValid() || $up_kk->getClientMimeType() !== 'application/pdf' || $up_kk->getSize() > 10 * 1024 * 1024) {
            return redirect()->to(base_url('error-berkas'))->with('error', '<span class="text-primary fs-4 fw-bold">Berkas kartu keluarga harus berupa PDF dan maksimal ukuran file 10MB. Silahkan isi ulang </span>');
        }

        $berkasSebelum = $upload_berkas->find($id);

        if ($berkasSebelum['kartu_keluarga'] && file_exists('uploads/berkas_siswa/' . $berkasSebelum['kartu_keluarga'])) {
            unlink('uploads/berkas_siswa/' . $berkasSebelum['kartu_keluarga']);
        }

        $name_kk = $up_kk->getRandomName();

        $data = [
            'kartu_keluarga' => $name_kk,
        ];

        $up_kk->move('uploads/berkas_siswa/', $name_kk);

        $upload_berkas->update($id, $data);

        return redirect()->to(base_url('user-ppdb'))->with('status', '<div class="alert alert-success alert-dismissible mx-4" role="alert">Berkas Berhasil di Update<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>');
    }

    public function updateSNisn($id)
    {
        $upload_berkas = new Upload_berkas();

        $up_scnisn = $this->request->getFile('scan_nisn');

        if (!$up_scnisn->isValid() || $up_scnisn->getClientMimeType() !== 'application/pdf' || $up_scnisn->getSize() > 10 * 1024 * 1024) {
            return redirect()->to(base_url('error-berkas'))->with('error', '<span class="text-primary fs-4 fw-bold">Berkas scan NISN harus berupa PDF dan maksimal ukuran file 10MB. Silahkan isi ulang </span>');
        }

        // Mendapatkan data berkas sebelum diupdate
        $berkasSebelum = $upload_berkas->find($id);

        // Hapus file lama
        if ($berkasSebelum['scan_nisn'] && file_exists('uploads/berkas_siswa/' . $berkasSebelum['scan_nisn'])) {
            unlink('uploads/berkas_siswa/' . $berkasSebelum['scan_nisn']);
        }

        // Generate nama berkas dan simpan berkas
        $name_scnisn = $up_scnisn->getRandomName();

        $data = [
            'scan_nisn' => $name_scnisn,
        ];

        $up_scnisn->move('uploads/berkas_siswa/', $name_scnisn);

        $upload_berkas->update($id, $data);

        return redirect()->to(base_url('user-ppdb'))->with('status', '<div class="alert alert-success alert-dismissible mx-4" role="alert">Berkas Berhasil di Update<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>');
    }

    public function updateRPT($id)
    {
        $upload_berkas = new Upload_berkas();

        $up_rpt1sd5 = $this->request->getFile('rpt_smstr_1sd5');

        if (!$up_rpt1sd5->isValid() || $up_rpt1sd5->getClientMimeType() !== 'application/pdf' || $up_rpt1sd5->getSize() > 20 * 1024 * 1024) {
            return redirect()->to(base_url('error-berkas'))->with('error', '<span class="text-primary fs-4 fw-bold">Berkas raport semester 1 sampai 5 harus berupa PDF dan maksimal ukuran file 20MB. Silahkan isi ulang </span>');
        }

        // Mendapatkan data berkas sebelum diupdate
        $berkasSebelum = $upload_berkas->find($id);

        // Hapus file lama
        if ($berkasSebelum['rpt_smstr_1sd5'] && file_exists('uploads/berkas_siswa/' . $berkasSebelum['rpt_smstr_1sd5'])) {
            unlink('uploads/berkas_siswa/' . $berkasSebelum['rpt_smstr_1sd5']);
        }

        // Generate nama berkas dan simpan berkas
        $name_rpt1sd5 = $up_rpt1sd5->getRandomName();

        $data = [
            'rpt_smstr_1sd5' => $name_rpt1sd5,
        ];

        $up_rpt1sd5->move('uploads/berkas_siswa/', $name_rpt1sd5);

        $upload_berkas->update($id, $data);

        return redirect()->to(base_url('user-ppdb'))->with('status', '<div class="alert alert-success alert-dismissible mx-4" role="alert">Berkas Berhasil di Update<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>');
    }

    public function updateKelKurMampu($id)
    {
        $upload_berkas = new Upload_berkas();

        $up_kelkurmampu = $this->request->getFile('kel_kur_mampu');

        if (!$up_kelkurmampu->isValid() || $up_kelkurmampu->getClientMimeType() !== 'application/pdf' || $up_kelkurmampu->getSize() > 10 * 1024 * 1024) {
            return redirect()->to(base_url('error-berkas'))->with('error', '<span class="text-primary fs-4 fw-bold">Berkas keluarga kurang mampu harus berupa PDF dan maksimal ukuran file 10MB. Silahkan isi ulang </span>');
        }

        // Mendapatkan data berkas sebelum diupdate
        $berkasSebelum = $upload_berkas->find($id);

        // Hapus file lama
        if ($berkasSebelum['kel_kur_mampu'] && file_exists('uploads/berkas_siswa/' . $berkasSebelum['kel_kur_mampu'])) {
            unlink('uploads/berkas_siswa/' . $berkasSebelum['kel_kur_mampu']);
        }

        // Generate nama berkas dan simpan berkas
        $name_kelkurmampu = $up_kelkurmampu->getRandomName();

        $data = [
            'kel_kur_mampu' => $name_kelkurmampu,
        ];

        $up_kelkurmampu->move('uploads/berkas_siswa/', $name_kelkurmampu);

        $upload_berkas->update($id, $data);

        return redirect()->to(base_url('user-ppdb'))->with('status', '<div class="alert alert-success alert-dismissible mx-4" role="alert">Berkas Berhasil di Update<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>');
    }

    public function updateSTOrtu($id)
    {
        $upload_berkas = new Upload_berkas();

        $up_stortu = $this->request->getFile('st_ortu');

        if (!$up_stortu->isValid() || $up_stortu->getClientMimeType() !== 'application/pdf' || $up_stortu->getSize() > 10 * 1024 * 1024) {
            return redirect()->to(base_url('error-berkas'))->with('error', '<span class="text-primary fs-4 fw-bold">Berkas surat ortu harus berupa PDF dan maksimal ukuran file 10MB. Silahkan isi ulang </span>');
        }

        // Mendapatkan data berkas sebelum diupdate
        $berkasSebelum = $upload_berkas->find($id);

        // Hapus file lama
        if ($berkasSebelum['st_ortu'] && file_exists('uploads/berkas_siswa/' . $berkasSebelum['st_ortu'])) {
            unlink('uploads/berkas_siswa/' . $berkasSebelum['st_ortu']);
        }

        // Generate nama berkas dan simpan berkas
        $name_stortu = $up_stortu->getRandomName();

        $data = [
            'st_ortu' => $name_stortu,
        ];

        $up_stortu->move('uploads/berkas_siswa/', $name_stortu);

        $upload_berkas->update($id, $data);

        return redirect()->to(base_url('user-ppdb'))->with('status', '<div class="alert alert-success alert-dismissible mx-4" role="alert">Berkas Berhasil di Update<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>');
    }

    public function updateSertif($id)
    {
        $upload_berkas = new Upload_berkas();

        $up_sertifpres = $this->request->getFile('sertif_prestasi');

        if (!$up_sertifpres->isValid() || $up_sertifpres->getClientMimeType() !== 'application/pdf' || $up_sertifpres->getSize() > 10 * 1024 * 1024) {
            return redirect()->to(base_url('error-berkas'))->with('error', '<span class="text-primary fs-4 fw-bold">Berkas sertifikat prestasi harus berupa PDF dan maksimal ukuran file 10MB. Silahkan isi ulang </span>');
        }

        // Mendapatkan data berkas sebelum diupdate
        $berkasSebelum = $upload_berkas->find($id);

        // Hapus file lama
        if ($berkasSebelum['sertif_prestasi'] && file_exists('uploads/berkas_siswa/' . $berkasSebelum['sertif_prestasi'])) {
            unlink('uploads/berkas_siswa/' . $berkasSebelum['sertif_prestasi']);
        }

        $name_sertifpres = $up_sertifpres->getRandomName();

        $data = [
            'sertif_prestasi' => $name_sertifpres,
        ];

        $up_sertifpres->move('uploads/berkas_siswa/', $name_sertifpres);

        $upload_berkas->update($id, $data);

        return redirect()->to(base_url('user-ppdb'))->with('status', '<div class="alert alert-success alert-dismissible mx-4" role="alert">Berkas Berhasil di Update<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>');
    }
}
