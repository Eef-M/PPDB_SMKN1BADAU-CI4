<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title_pdf;?></title>
    <style>
    * {
        font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
    }

    #table {
        border-collapse: collapse;
        margin-top: 10px;
    }

    #table td,
    #table th {
        border: 1px solid #ddd;
        padding: 8px;
    }

    #table tr:nth-child(even) {
        background-color: #f2f2f2;
    }

    #table tr:hover {
        background-color: #ddd;
    }

    #table th {
        padding-top: 10px;
        padding-bottom: 10px;
        text-align: left;
        background-color: #214252;
        color: white;
    }

    #logo {
        width: 100px;
        height: auto;
    }

    #header {
        width: 100%;
        border-collapse: collapse;
        background-color: #214252;
        color: white;
    }

    #header_tr td {
        padding: 10px;
        text-align: center;
    }

    #school-info {
        text-align: left;
    }

    #school-name {
        font-size: 28px;
        font-weight: bold;
        margin-bottom: 10px;
    }

    #school-address {
        font-size: 14px;
    }

    #divider {
        height: 1px;
        background-color: #fff;
        flex-grow: 1;
    }

    table {
        width: 100%;
        border-collapse: collapse;
    }

    /* Data */
    .container {
        display: flex;
        justify-content: center;
        align-items: flex-start;
    }

    .data-siswa {
        width: 50%;
        padding: 20px;
        background-color: #f1f1f1;
    }

    .foto-siswa {
        width: 50%;
        padding: 20px;
        background-color: #e1e1e1;
        text-align: center;
    }

    h2 {
        color: #333;
    }

    .siswa-info {
        margin-bottom: 10px;
        display: flex;
        justify-content: center;
        align-items: center;
        gap: 10px;
    }

    .siswa-info span {
        font-weight: bold;
    }
    </style>
</head>

<body>
    <table id="header">
        <tr id="header_tr">
            <td>
                <img src="<?= $logo ?>" alt="Logo Sekolah" id="logo">
            </td>
            <td id="school-info" style="text-align: left;">
                <h1 id="school-name">SMK NEGERI 1 BADAU</h1>
                <div id="divider"></div>
                <p id="school-address">JL. PESANTREN BADAU KM. 22, Badau, Kec. Badau, Kab. Belitung Prov. Kepulauan
                    Bangka Belitung</p>
            </td>
        </tr>
    </table>
    <hr>
    <table style="margin: 20px 0;">
        <tr>
            <th style="font-size: 24px;">KARTU BUKTI PENDAFTARAN</th>
        </tr>
    </table>
    <hr>
    <table>
        <tr>
            <td style="width: 200px; padding: 4px;">Nama Siswa</td>
            <td style="width: auto; padding: 4px; font-weight: bold;"><?= $profile['nama_siswa'] ?></td>
            <td rowspan="9" style="width: 500px; text-align: center;"><img src="<?= $foto_siswa ?>" alt="Logo Sekolah"
                    width="200">
            </td>
        </tr>
        <tr>
            <td style="width: 200px; padding: 4px;">NISN</td>
            <td style="width: auto; padding: 4px; font-weight: bold;"><?= $profile['nisn'] ?></td>
        </tr>
        <tr>
            <td style="width: 200px; padding: 4px;">Tanggal Pendaftaran</td>
            <td style="width: auto; padding: 4px; font-weight: bold;"><?= $profile['tanggal_pendaftaran'] ?></td>
        </tr>
        <tr>
            <td style="width: 200px; padding: 4px;">NIK</td>
            <td style="width: auto; padding: 4px; font-weight: bold;"><?= $profile['nik'] ?></td>
        </tr>
        <tr>
            <td style="width: 200px; padding: 4px;">Jurusan</td>
            <td style="width: auto; padding: 4px; font-weight: bold;"><?= $jurusan ?></td>
        </tr>
        <tr>
            <td style="width: 200px; padding: 4px;">Jenis Kelamin</td>
            <td style="width: auto; padding: 4px; font-weight: bold;"><?= $profile['jenis_kelamin'] ?></td>
        </tr>
        <tr>
            <td style="width: 200px; padding: 4px;">Tempat Lahir</td>
            <td style="width: auto; padding: 4px; font-weight: bold;"><?= $profile['tempat_lahir'] ?></td>
        </tr>
        <tr>
            <td style="width: 200px; padding: 4px;">Tanggal Lahir</td>
            <td style="width: auto; padding: 4px; font-weight: bold;"><?= $profile['tanggal_lahir'] ?></td>
        </tr>
        <tr>
            <td style="width: 200px; padding: 4px;">Agama</td>
            <td style="width: auto; padding: 4px; font-weight: bold;"><?= $profile['agama'] ?></td>
        </tr>
        <tr>
            <td style="width: 200px; padding: 4px;">Status Dalam Keluarga</td>
            <td style="width: auto; padding: 4px; font-weight: bold;"><?= $profile['status_dlm_kel'] ?></td>
        </tr>
        <tr>
            <td style="width: 200px; padding: 4px;">Alamat</td>
            <td style="width: auto; padding: 4px; font-weight: bold;"><?= $profile['alamat'] ?></td>
        </tr>
        <tr>
            <td style="width: 200px; padding: 4px;">RT</td>
            <td style="width: auto; padding: 4px; font-weight: bold;"><?= $profile['rt'] ?></td>
        </tr>
        <tr>
            <td style="width: 200px; padding: 4px;">RW</td>
            <td style="width: auto; padding: 4px; font-weight: bold;"><?= $profile['rw'] ?></td>
        </tr>
        <tr>
            <td style="width: 200px; padding: 4px;">Kelurahan</td>
            <td style="width: auto; padding: 4px; font-weight: bold;"><?= $profile['kelurahan'] ?></td>
        </tr>
        <tr>
            <td style="width: 200px; padding: 4px;">Kecamatan</td>
            <td style="width: auto; padding: 4px; font-weight: bold;"><?= $profile['kecamatan'] ?></td>
        </tr>
        <tr>
            <td style="width: 200px; padding: 4px;">Kabupaten/Kota</td>
            <td style="width: auto; padding: 4px; font-weight: bold;"><?= $profile['kab_kota'] ?></td>
        </tr>
        <tr>
            <td style="width: 200px; padding: 4px;">Provinsi</td>
            <td style="width: auto; padding: 4px; font-weight: bold;"><?= $profile['provinsi'] ?></td>
        </tr>
        <tr>
            <td style="width: 200px; padding: 4px;">No. HP/Telepon</td>
            <td style="width: auto; padding: 4px; font-weight: bold;"><?= $profile['nohp_siswa'] ?></td>
        </tr>
        <tr>
            <td style="width: 200px; padding: 4px;">Nama Ayah</td>
            <td style="width: auto; padding: 4px; font-weight: bold;"><?= $profile['nama_ayah'] ?></td>
        </tr>
        <tr>
            <td style="width: 200px; padding: 4px;">NIK Ayah</td>
            <td style="width: auto; padding: 4px; font-weight: bold;"><?= $profile['nik_ayah'] ?></td>
        </tr>
        <tr>
            <td style="width: 200px; padding: 4px;">Nama Ibu</td>
            <td style="width: auto; padding: 4px; font-weight: bold;"><?= $profile['nama_ibu'] ?></td>
        </tr>
        <tr>
            <td style="width: 200px; padding: 4px;">NIK Ibu</td>
            <td style="width: auto; padding: 4px; font-weight: bold;"><?= $profile['nik_ibu'] ?></td>
        </tr>
        <tr>
            <td style="width: 200px; padding: 4px;">Jalur Daftar</td>
            <td style="width: auto; padding: 4px; font-weight: bold;"><?= $profile['jalur'] ?></td>
        </tr>
    </table>
    <table id="table">
        <thead>
            <tr>
                <th>Mata Pelajaran</th>
                <th style="text-align: center;">Semester 1</th>
                <th style="text-align: center;">Semester 2</th>
                <th style="text-align: center;">Semester 3</th>
                <th style="text-align: center;">Semester 4</th>
                <th style="text-align: center;">Semester 5</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Bahasa Indonesia</td>
                <?php foreach ($nilai as $item) : ?>
                <td style="text-align: center;"><?= $item['bindo_1'] ?></td>
                <td style="text-align: center;"><?= $item['bindo_2'] ?></td>
                <td style="text-align: center;"><?= $item['bindo_3'] ?></td>
                <td style="text-align: center;"><?= $item['bindo_4'] ?></td>
                <td style="text-align: center;"><?= $item['bindo_5'] ?></td>
                <?php endforeach; ?>
            </tr>
            <tr>
                <td>Bahasa Inggris</td>
                <?php foreach ($nilai as $item) : ?>
                <td style="text-align: center;"><?= $item['bing_1'] ?></td>
                <td style="text-align: center;"><?= $item['bing_2'] ?></td>
                <td style="text-align: center;"><?= $item['bing_3'] ?></td>
                <td style="text-align: center;"><?= $item['bing_4'] ?></td>
                <td style="text-align: center;"><?= $item['bing_5'] ?></td>
                <?php endforeach; ?>
            </tr>
            <tr>
                <td>Matematika</td>
                <?php foreach ($nilai as $item) : ?>
                <td style="text-align: center;"><?= $item['mtk_1'] ?></td>
                <td style="text-align: center;"><?= $item['mtk_2'] ?></td>
                <td style="text-align: center;"><?= $item['mtk_3'] ?></td>
                <td style="text-align: center;"><?= $item['mtk_4'] ?></td>
                <td style="text-align: center;"><?= $item['mtk_5'] ?></td>
                <?php endforeach; ?>
            </tr>
            <tr>
                <td>IPA</td>
                <?php foreach ($nilai as $item) : ?>
                <td style="text-align: center;"><?= $item['ipa_1'] ?></td>
                <td style="text-align: center;"><?= $item['ipa_2'] ?></td>
                <td style="text-align: center;"><?= $item['ipa_3'] ?></td>
                <td style="text-align: center;"><?= $item['ipa_4'] ?></td>
                <td style="text-align: center;"><?= $item['ipa_5'] ?></td>
                <?php endforeach; ?>
            </tr>
            <tr>
                <td>IPS</td>
                <?php foreach ($nilai as $item) : ?>
                <td style="text-align: center;"><?= $item['ips_1'] ?></td>
                <td style="text-align: center;"><?= $item['ips_2'] ?></td>
                <td style="text-align: center;"><?= $item['ips_3'] ?></td>
                <td style="text-align: center;"><?= $item['ips_4'] ?></td>
                <td style="text-align: center;"><?= $item['ips_5'] ?></td>
                <?php endforeach; ?>
            </tr>
        </tbody>
    </table>
</body>

</html>