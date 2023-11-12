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
                                <input class="form-control border-primary" name="bindo_1" id="bindo_1" required type="text" value="<?= $item['bindo_1'] ?>">
                                <div class="invalid-feedback">
                                    field tidak boleh kosong
                                </div>
                            </td>
                            <td class="text-center">
                                <input class="form-control border-primary" name="bindo_2" id="bindo_2" required type="text" value="<?= $item['bindo_2'] ?>">
                                <div class="invalid-feedback">
                                    field tidak boleh kosong
                                </div>
                            </td>
                            <td class="text-center">
                                <input class="form-control border-primary" name="bindo_3" id="bindo_3" required type="text" value="<?= $item['bindo_3'] ?>">
                                <div class="invalid-feedback">
                                    field tidak boleh kosong
                                </div>
                            </td>
                            <td class="text-center">
                                <input class="form-control border-primary" name="bindo_4" id="bindo_4" required type="text" value="<?= $item['bindo_4'] ?>">
                                <div class="invalid-feedback">
                                    field tidak boleh kosong
                                </div>
                            </td>
                            <td class="text-center">
                                <input class="form-control border-primary" name="bindo_5" id="bindo_5" required type="text" value="<?= $item['bindo_5'] ?>">
                                <div class="invalid-feedback">
                                    field tidak boleh kosong
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>Bahasa Inggris</td>
                            <td class="text-center">
                                <input class="form-control border-primary" name="bing_1" id="bing_1" required type="text" value="<?= $item['bing_1'] ?>">
                                <div class="invalid-feedback">
                                    field tidak boleh kosong
                                </div>
                            </td>
                            <td class="text-center">
                                <input class="form-control border-primary" name="bing_2" id="bing_2" required type="text" value="<?= $item['bing_2'] ?>">
                                <div class="invalid-feedback">
                                    field tidak boleh kosong
                                </div>
                            </td>
                            <td class="text-center">
                                <input class="form-control border-primary" name="bing_3" id="bing_3" required type="text" value="<?= $item['bing_3'] ?>">
                                <div class="invalid-feedback">
                                    field tidak boleh kosong
                                </div>
                            </td>
                            <td class="text-center">
                                <input class="form-control border-primary" name="bing_4" id="bing_4" required type="text" value="<?= $item['bing_4'] ?>">
                                <div class="invalid-feedback">
                                    field tidak boleh kosong
                                </div>
                            </td>
                            <td class="text-center">
                                <input class="form-control border-primary" name="bing_5" id="bing_5" required type="text" value="<?= $item['bing_5'] ?>">
                                <div class="invalid-feedback">
                                    field tidak boleh kosong
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>Matematika</td>
                            <td class="text-center">
                                <input class="form-control border-primary" name="mtk_1" id="mtk_1" required type="text" value="<?= $item['mtk_1'] ?>">
                                <div class="invalid-feedback">
                                    field tidak boleh kosong
                                </div>
                            </td>
                            <td class="text-center">
                                <input class="form-control border-primary" name="mtk_2" id="mtk_2" required type="text" value="<?= $item['mtk_2'] ?>">
                                <div class="invalid-feedback">
                                    field tidak boleh kosong
                                </div>
                            </td>
                            <td class="text-center">
                                <input class="form-control border-primary" name="mtk_3" id="mtk_3" required type="text" value="<?= $item['mtk_3'] ?>">
                                <div class="invalid-feedback">
                                    field tidak boleh kosong
                                </div>
                            </td>
                            <td class="text-center">
                                <input class="form-control border-primary" name="mtk_4" id="mtk_4" required type="text" value="<?= $item['mtk_4'] ?>">
                                <div class="invalid-feedback">
                                    field tidak boleh kosong
                                </div>
                            </td>
                            <td class="text-center">
                                <input class="form-control border-primary" name="mtk_5" id="mtk_5" required type="text" value="<?= $item['mtk_5'] ?>">
                                <div class="invalid-feedback">
                                    field tidak boleh kosong
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>IPA</td>
                            <td class="text-center">
                                <input class="form-control border-primary" name="ipa_1" id="ipa_1" required type="text" value="<?= $item['ipa_1'] ?>">
                                <div class="invalid-feedback">
                                    field tidak boleh kosong
                                </div>
                            </td>
                            <td class="text-center">
                                <input class="form-control border-primary" name="ipa_2" id="ipa_2" required type="text" value="<?= $item['ipa_2'] ?>">
                                <div class="invalid-feedback">
                                    field tidak boleh kosong
                                </div>
                            </td>
                            <td class="text-center">
                                <input class="form-control border-primary" name="ipa_3" id="ipa_3" required type="text" value="<?= $item['ipa_3'] ?>">
                                <div class="invalid-feedback">
                                    field tidak boleh kosong
                                </div>
                            </td>
                            <td class="text-center">
                                <input class="form-control border-primary" name="ipa_4" id="ipa_4" required type="text" value="<?= $item['ipa_4'] ?>">
                                <div class="invalid-feedback">
                                    field tidak boleh kosong
                                </div>
                            </td>
                            <td class="text-center">
                                <input class="form-control border-primary" name="ipa_5" id="ipa_5" required type="text" value="<?= $item['ipa_5'] ?>">
                                <div class="invalid-feedback">
                                    field tidak boleh kosong
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>IPS</td>
                            <td class="text-center">
                                <input class="form-control border-primary" name="ips_1" id="ips_1" required type="text" value="<?= $item['ips_1'] ?>">
                                <div class="invalid-feedback">
                                    field tidak boleh kosong
                                </div>
                            </td>
                            <td class="text-center">
                                <input class="form-control border-primary" name="ips_2" id="ips_2" required type="text" value="<?= $item['ips_2'] ?>">
                                <div class="invalid-feedback">
                                    field tidak boleh kosong
                                </div>
                            </td>
                            <td class="text-center">
                                <input class="form-control border-primary" name="ips_3" id="ips_3" required type="text" value="<?= $item['ips_3'] ?>">
                                <div class="invalid-feedback">
                                    field tidak boleh kosong
                                </div>
                            </td>
                            <td class="text-center">
                                <input class="form-control border-primary" name="ips_4" id="ips_4" required type="text" value="<?= $item['ips_4'] ?>">
                                <div class="invalid-feedback">
                                    field tidak boleh kosong
                                </div>
                            </td>
                            <td class="text-center">
                                <input class="form-control border-primary" name="ips_5" id="ips_5" required type="text" value="<?= $item['ips_5'] ?>">
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
    <script>
        // Fungsi untuk memastikan hanya angka yang diterima dan mengganti koma (,) menjadi titik (.)
        function setupInput(inputId) {
            document.getElementById(inputId).addEventListener("input", function() {
                this.value = this.value.replace(/[^0-9.]/g, ""); // Hanya angka dan titik yang diizinkan
                this.value = this.value.replace(/,/, "."); // Mengganti koma (,) menjadi titik (.)
            });
        }

        // Set up input untuk masing-masing semester
        for (let i = 1; i <= 5; i++) {
            setupInput("bindo_" + i);
            setupInput("bing_" + i);
            setupInput("mtk_" + i);
            setupInput("ipa_" + i);
            setupInput("ips_" + i);
            // Tambahkan setupInput() untuk mata pelajaran dan semester lainnya di sini
        }
    </script>
</div>

<?= $this->endSection(); ?>