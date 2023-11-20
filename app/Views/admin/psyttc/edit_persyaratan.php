<?= $this->extend('admin/templates/index') ?>

<?= $this->section('admin-content') ?>
<div class="container-fluid flex-grow-1 container-p-y">

    <div class="d-flex justify-content-start align-items-center w-100 gap-2">
        <a href="<?= base_url('psyttc') ?>" class="btn btn-dark d-flex justify-content-center align-items-center gap-1">
            <i class='bx bx-left-arrow-alt'></i>
            <span>Kembali</span>
        </a>
        <div class="w-100 bg-secondary rounded" style="height: 2px;"></div>
    </div>
    <!-- Form -->
    <div class="d-flex justify-content-center align-items-center my-3">
        <div class="card w-100 bg-white">
            <span class="badge bg-label-dark text-center mt-4 fs-3 fw-bold text-dark">EDIT PERSYARATAN</span>
            <hr class="hr mx-4" />
            <div class="card-body">

                <form action="<?= base_url('persyaratan/update/' . $persyaratan['id']); ?>" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="_method" value="PUT">
                    <?= csrf_field() ?>
                    <div class="d-flex flex-column justify-content-center align-items-center gap-3">
                        <div class="d-flex justify-content-center align-items-center gap-4 flex-column flex-lg-row w-100">
                            <div class="d-flex flex-column justify-content-center align-items-start w-100">
                                <label class="text-black fs-5">Deskripsi:</label>
                                <textarea required name="deskripsi" class="form-control summernote border-secondary w-100"><?= $persyaratan['deskripsi'] ?></textarea>
                            </div>
                        </div>
                        <div class="d-flex justify-content-end align-items-center w-100">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!--/ Form -->
</div>

<script>
    $('.summernote').summernote({
        placeholder: 'Masukkan Deskripsi',
        tabsize: 2,
        width: '100%',
        height: 200,
        toolbar: [
            ['style', ['style']],
            ['font', ['bold', 'underline', 'clear']],
            ['color', ['color']],
            ['para', ['ul', 'ol', 'paragraph']],
            // ['table', ['table']],
            // ['insert', ['link', 'picture', 'video']],
            // ['view', ['fullscreen', 'codeview', 'help']]
        ]
    });
</script>
<?= $this->endSection(); ?>