<?= $this->extend('users/templates/index') ?>

<?= $this->section('user-content') ?>

<div class="container py-4">
<div class="table-responsive">
    <span class="text-black">Edit Nilai Mata Pelajaran Semester 1 s.d 5</span>
    <hr class="hr text-primary" />
    <table class="table table-bordered border-primary">
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
            <?php foreach ($nilai as $item) : ?>
                <form action="<?= base_url('update-nilai/' . $item['id']); ?>" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="_method" value="PUT">
                    <tr>
                        <td>$nilai</td>
                        <td class="text-center">
                            <input class="form-control border-primary" name="bindo_1" required type="number" value="<?= $item['bindo_1'] ?>">
                            <div class="invalid-feedback">
                                field tidak boleh kosong
                            </div>
                        </td>
                        <td class="text-center">
                            <input class="form-control border-primary" name="bindo_2" required type="number" value="<?= $item['bindo_2'] ?>">
                            <div class="invalid-feedback">
                                field tidak boleh kosong
                            </div>
                        </td>
                        <td class="text-center">
                            <input class="form-control border-primary" name="bindo_3" required type="number" value="<?= $item['bindo_3'] ?>">
                            <div class="invalid-feedback">
                                field tidak boleh kosong
                            </div>
                        </td>
                        <td class="text-center">
                            <input class="form-control border-primary" name="bindo_4" required type="number" value="<?= $item['bindo_4'] ?>">
                            <div class="invalid-feedback">
                                field tidak boleh kosong
                            </div>
                        </td>
                        <td class="text-center">
                            <input class="form-control border-primary" name="bindo_5" required type="number" value="<?= $item['bindo_5'] ?>">
                            <div class="invalid-feedback">
                                field tidak boleh kosong
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>Bahasa Inggris</td>
                        <td class="text-center">
                            <input class="form-control border-primary" name="bing_1" required type="number" value="<?= $item['bing_1'] ?>">
                            <div class="invalid-feedback">
                                field tidak boleh kosong
                            </div>
                        </td>
                        <td class="text-center">
                            <input class="form-control border-primary" name="bing_2" required type="number" value="<?= $item['bing_2'] ?>">
                            <div class="invalid-feedback">
                                field tidak boleh kosong
                            </div>
                        </td>
                        <td class="text-center">
                            <input class="form-control border-primary" name="bing_3" required type="number" value="<?= $item['bing_3'] ?>">
                            <div class="invalid-feedback">
                                field tidak boleh kosong
                            </div>
                        </td>
                        <td class="text-center">
                            <input class="form-control border-primary" name="bing_4" required type="number" value="<?= $item['bing_4'] ?>">
                            <div class="invalid-feedback">
                                field tidak boleh kosong
                            </div>
                        </td>
                        <td class="text-center">
                            <input class="form-control border-primary" name="bing_5" required type="number" value="<?= $item['bing_5'] ?>">
                            <div class="invalid-feedback">
                                field tidak boleh kosong
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>Matematika</td>
                        <td class="text-center">
                            <input class="form-control border-primary" name="mtk_1" required type="number" value="<?= $item['mtk_1'] ?>">
                            <div class="invalid-feedback">
                                field tidak boleh kosong
                            </div>
                        </td>
                        <td class="text-center">
                            <input class="form-control border-primary" name="mtk_2" required type="number" value="<?= $item['mtk_2'] ?>">
                            <div class="invalid-feedback">
                                field tidak boleh kosong
                            </div>
                        </td>
                        <td class="text-center">
                            <input class="form-control border-primary" name="mtk_3" required type="number" value="<?= $item['mtk_3'] ?>">
                            <div class="invalid-feedback">
                                field tidak boleh kosong
                            </div>
                        </td>
                        <td class="text-center">
                            <input class="form-control border-primary" name="mtk_4" required type="number" value="<?= $item['mtk_4'] ?>">
                            <div class="invalid-feedback">
                                field tidak boleh kosong
                            </div>
                        </td>
                        <td class="text-center">
                            <input class="form-control border-primary" name="mtk_5" required type="number" value="<?= $item['mtk_5'] ?>">
                            <div class="invalid-feedback">
                                field tidak boleh kosong
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>IPA</td>
                        <td class="text-center">
                            <input class="form-control border-primary" name="ipa_1" required type="number" value="<?= $item['ipa_1'] ?>">
                            <div class="invalid-feedback">
                                field tidak boleh kosong
                            </div>
                        </td>
                        <td class="text-center">
                            <input class="form-control border-primary" name="ipa_2" required type="number" value="<?= $item['ipa_2'] ?>">
                            <div class="invalid-feedback">
                                field tidak boleh kosong
                            </div>
                        </td>
                        <td class="text-center">
                            <input class="form-control border-primary" name="ipa_3" required type="number" value="<?= $item['ipa_3'] ?>">
                            <div class="invalid-feedback">
                                field tidak boleh kosong
                            </div>
                        </td>
                        <td class="text-center">
                            <input class="form-control border-primary" name="ipa_4" required type="number" value="<?= $item['ipa_4'] ?>">
                            <div class="invalid-feedback">
                                field tidak boleh kosong
                            </div>
                        </td>
                        <td class="text-center">
                            <input class="form-control border-primary" name="ipa_5" required type="number" value="<?= $item['ipa_5'] ?>">
                            <div class="invalid-feedback">
                                field tidak boleh kosong
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>IPS</td>
                        <td class="text-center">
                            <input class="form-control border-primary" name="ips_1" required type="number" value="<?= $item['ips_1'] ?>">
                            <div class="invalid-feedback">
                                field tidak boleh kosong
                            </div>
                        </td>
                        <td class="text-center">
                            <input class="form-control border-primary" name="ips_2" required type="number" value="<?= $item['ips_2'] ?>">
                            <div class="invalid-feedback">
                                field tidak boleh kosong
                            </div>
                        </td>
                        <td class="text-center">
                            <input class="form-control border-primary" name="ips_3" required type="number" value="<?= $item['ips_3'] ?>">
                            <div class="invalid-feedback">
                                field tidak boleh kosong
                            </div>
                        </td>
                        <td class="text-center">
                            <input class="form-control border-primary" name="ips_4" required type="number" value="<?= $item['ips_4'] ?>">
                            <div class="invalid-feedback">
                                field tidak boleh kosong
                            </div>
                        </td>
                        <td class="text-center">
                            <input class="form-control border-primary" name="ips_5" required type="number" value="<?= $item['ips_5'] ?>">
                            <div class="invalid-feedback">
                                field tidak boleh kosong
                            </div>
                        </td>
                        <tr>
                            <td colspan="6" class="text-end">
                                <button class="btn btn-primary" type="submit">SUBMIT</button>
                            </td>
                        </tr>
                    </tr>
                </form>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
</div>

<?= $this->endSection(); ?>