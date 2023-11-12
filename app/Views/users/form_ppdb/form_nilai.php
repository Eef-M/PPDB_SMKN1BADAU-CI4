<form action="<?= base_url('user-store-nilai'); ?>" class="w-100 mt-3" method="POST" enctype="multipart/form-data">
    <div>
        <div class="table-responsive">
            <span class="text-black">Isi Nilai Mata Pelajaran Semester 1 s.d 5</span>
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
                    <tr>
                        <td>Bahasa Indonesia</td>
                        <td class="text-center">
                            <input class="form-control border-primary" name="bindo_1" required id="bindo_1" type="text">
                            <div class="invalid-feedback">
                                field tidak boleh kosong
                            </div>
                        </td>
                        <td class="text-center">
                            <input class="form-control border-primary" name="bindo_2" required id="bindo_2" type="text">
                            <div class="invalid-feedback">
                                field tidak boleh kosong
                            </div>
                        </td>
                        <td class="text-center">
                            <input class="form-control border-primary" name="bindo_3" required id="bindo_3" type="text">
                            <div class="invalid-feedback">
                                field tidak boleh kosong
                            </div>
                        </td>
                        <td class="text-center">
                            <input class="form-control border-primary" name="bindo_4" required id="bindo_4" type="text">
                            <div class="invalid-feedback">
                                field tidak boleh kosong
                            </div>
                        </td>
                        <td class="text-center">
                            <input class="form-control border-primary" name="bindo_5" required id="bindo_5" type="text">
                            <div class="invalid-feedback">
                                field tidak boleh kosong
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>Bahasa Inggris</td>
                        <td class="text-center">
                            <input class="form-control border-primary" name="bing_1" required id="bing_1" type="text">
                            <div class="invalid-feedback">
                                field tidak boleh kosong
                            </div>
                        </td>
                        <td class="text-center">
                            <input class="form-control border-primary" name="bing_2" required id="bing_2" type="text">
                            <div class="invalid-feedback">
                                field tidak boleh kosong
                            </div>
                        </td>
                        <td class="text-center">
                            <input class="form-control border-primary" name="bing_3" required id="bing_3" type="text">
                            <div class="invalid-feedback">
                                field tidak boleh kosong
                            </div>
                        </td>
                        <td class="text-center">
                            <input class="form-control border-primary" name="bing_4" required id="bing_4" type="text">
                            <div class="invalid-feedback">
                                field tidak boleh kosong
                            </div>
                        </td>
                        <td class="text-center">
                            <input class="form-control border-primary" name="bing_5" required id="bing_5" type="text">
                            <div class="invalid-feedback">
                                field tidak boleh kosong
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>Matematika</td>
                        <td class="text-center">
                            <input class="form-control border-primary" name="mtk_1" required id="mtk_1" type="text">
                            <div class="invalid-feedback">
                                field tidak boleh kosong
                            </div>
                        </td>
                        <td class="text-center">
                            <input class="form-control border-primary" name="mtk_2" required id="mtk_2" type="text">
                            <div class="invalid-feedback">
                                field tidak boleh kosong
                            </div>
                        </td>
                        <td class="text-center">
                            <input class="form-control border-primary" name="mtk_3" required id="mtk_3" type="text">
                            <div class="invalid-feedback">
                                field tidak boleh kosong
                            </div>
                        </td>
                        <td class="text-center">
                            <input class="form-control border-primary" name="mtk_4" required id="mtk_4" type="text">
                            <div class="invalid-feedback">
                                field tidak boleh kosong
                            </div>
                        </td>
                        <td class="text-center">
                            <input class="form-control border-primary" name="mtk_5" required id="mtk_5" type="text">
                            <div class="invalid-feedback">
                                field tidak boleh kosong
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>IPA</td>
                        <td class="text-center">
                            <input class="form-control border-primary" name="ipa_1" required id="ipa_1" type="text">
                            <div class="invalid-feedback">
                                field tidak boleh kosong
                            </div>
                        </td>
                        <td class="text-center">
                            <input class="form-control border-primary" name="ipa_2" required id="ipa_2" type="text">
                            <div class="invalid-feedback">
                                field tidak boleh kosong
                            </div>
                        </td>
                        <td class="text-center">
                            <input class="form-control border-primary" name="ipa_3" required id="ipa_3" type="text">
                            <div class="invalid-feedback">
                                field tidak boleh kosong
                            </div>
                        </td>
                        <td class="text-center">
                            <input class="form-control border-primary" name="ipa_4" required id="ipa_4" type="text">
                            <div class="invalid-feedback">
                                field tidak boleh kosong
                            </div>
                        </td>
                        <td class="text-center">
                            <input class="form-control border-primary" name="ipa_5" required id="ipa_5" type="text">
                            <div class="invalid-feedback">
                                field tidak boleh kosong
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>IPS</td>
                        <td class="text-center">
                            <input class="form-control border-primary" name="ips_1" required id="ips_1" type="text">
                            <div class="invalid-feedback">
                                field tidak boleh kosong
                            </div>
                        </td>
                        <td class="text-center">
                            <input class="form-control border-primary" name="ips_2" required id="ips_2" type="text">
                            <div class="invalid-feedback">
                                field tidak boleh kosong
                            </div>
                        </td>
                        <td class="text-center">
                            <input class="form-control border-primary" name="ips_3" required id="ips_3" type="text">
                            <div class="invalid-feedback">
                                field tidak boleh kosong
                            </div>
                        </td>
                        <td class="text-center">
                            <input class="form-control border-primary" name="ips_4" required id="ips_4" type="text">
                            <div class="invalid-feedback">
                                field tidak boleh kosong
                            </div>
                        </td>
                        <td class="text-center">
                            <input class="form-control border-primary" name="ips_5" required id="ips_5" type="text">
                            <div class="invalid-feedback">
                                field tidak boleh kosong
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div class="d-flex justify-content-between">
            <button type="submit" class="btn btn-primary">Selanjutnya</button>
        </div>
    </div>
</form> 

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