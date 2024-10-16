<?= $this->extend('templates/index'); ?>

<?= $this->Section('page-content'); ?>
<div class="container">
    <div class="row">
        <div class="col">
            <h2 class="mt-2">Book Details</h2>
            <div class="card mb-3" style="max-width: 540px;">
                <div class="row g-0">
                    <div class="col-md-4">
                        <img src="/img/<?= $komik['sampul']; ?>" class="img-fluid rounded-start" alt="...">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title"><?= $komik['judul']; ?></h5>
                            <p class="card-text"><b>Writer : <?= $komik['penulis']; ?></b></p>
                            <p class="card-text"><small class="text-body-secondary"><b>Publisher : <?= $komik['penerbit']; ?></b></small></p>

                            <a href="/komik/edit/<?= $komik['slug']; ?>" class="btn btn-warning">Edit</a>
                            <form action="/komik/<?= $komik['id']; ?>" method="post" class="d-inline" onsubmit="return confirm('Apakah Anda yakin ingin menghapus?');">
                                <input type="hidden" name="_method" value="DELETE">
                                <?= csrf_field(); ?>
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                            <br><br>
                            <a href="/komik">Back to book list</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection('page-content'); ?>