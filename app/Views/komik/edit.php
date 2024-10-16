<?= $this->extend('templates/index'); ?>

<?= $this->section('page-content'); ?>
<div class="container">
    <div class="row">
        <div class="col-8">
            <h2 class="my-3">Book Data Change Form</h2>
            <!-- Stylish link to go back to roles list -->
            <a href="<?= base_url('komik'); ?>" class="text-primary mb-3" style="text-decoration: none;">
                <i class="fas fa-arrow-left"></i> Back to book list
            </a>
            <form action="/komik/update/<?= $komik['id']; ?>" method="post" enctype="multipart/form-data">
                <?= csrf_field(); ?>
                <input type="hidden" name="slug" value="<?= $komik['slug']; ?>">
                <input type="hidden" name="sampulLama" value="<?= $komik['sampul']; ?>">

                <div class="row mb-3">
                    <label for="judul" class="col-sm-2 col-form-label">Title</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control <?= ($validation->hasError('judul')) ? 'is-invalid' : ''; ?>" id="judul" name="judul" value="<?= (old('judul')) ? old('judul') : $komik['judul']; ?>" autofocus>
                        <?php if ($validation->hasError('judul')): ?>
                            <div class="invalid-feedback">
                                <?= $validation->getError('judul'); ?>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="penulis" class="col-sm-2 col-form-label">Writer</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control <?= ($validation->hasError('penulis')) ? 'is-invalid' : ''; ?>" id="penulis" name="penulis" value="<?= (old('penulis')) ? old('penulis') : $komik['penulis']; ?>">
                        <?php if ($validation->hasError('penulis')): ?>
                            <div class="invalid-feedback">
                                <?= $validation->getError('penulis'); ?>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="penerbit" class="col-sm-2 col-form-label">Publisher</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control <?= ($validation->hasError('penerbit')) ? 'is-invalid' : ''; ?>" id="penerbit" name="penerbit" value="<?= (old('penerbit')) ? old('penerbit') : $komik['penerbit']; ?>">
                        <?php if ($validation->hasError('penerbit')): ?>
                            <div class="invalid-feedback">
                                <?= $validation->getError('penerbit'); ?>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="sampul" class="col-sm-2 col-form-label">Cover</label>
                    <div class="col-sm-2">
                        <img src="/img/<?= $komik['sampul']; ?>" class="img-thumbnail img-preview" alt="Preview Sampul">
                    </div>
                    <div class="col-sm-8">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input <?= ($validation->hasError('sampul')) ? 'is-invalid' : ''; ?>" id="sampul" name="sampul" onchange="previewImg(); updateFileName();">
                            <label class="custom-file-label" for="sampul">
                                <?= $komik['sampul']; // Menampilkan nama file yang ada sebelumnya 
                                ?>
                            </label>
                        </div>
                        <?php if ($validation->hasError('sampul')): ?>
                            <div class="invalid-feedback">
                                <?= $validation->getError('sampul'); ?>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary">Change</button>
            </form>
        </div>
    </div>
</div>

<script>
    function previewImg() {
        const sampul = document.querySelector('#sampul');
        const imgPreview = document.querySelector('.img-preview');

        const oFReader = new FileReader();
        oFReader.readAsDataURL(sampul.files[0]);

        oFReader.onload = function(oFREvent) {
            imgPreview.src = oFREvent.target.result;
        }
    }

    function updateFileName() {
        const sampul = document.querySelector('#sampul');
        const fileLabel = document.querySelector('.custom-file-label');

        fileLabel.textContent = sampul.files[0] ? sampul.files[0].name : '<?= $komik['sampul']; ?>'; // Tampilkan nama file lama jika tidak ada file baru
    }
</script>
<?= $this->endSection('page-content'); ?>