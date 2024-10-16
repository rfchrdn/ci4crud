<?= $this->extend('templates/index'); ?>

<?= $this->Section('page-content'); ?>
<div class="container">
    <div class="row">
        <div class="col">
            <a href="/komik/create" class="btn btn-primary mt-3">Add Book</a>
            <h1 class="mt-2">Book List</h1>
            <?php if (session()->getFlashdata('pesan')) : ?>
                <div class="alert alert-success" role="alert">
                    <?= session()->getFlashdata('pesan'); ?>
                </div>
            <?php endif; ?>
            <table class="table table-striped mt-3">
                <thead class="table">
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Cover</th>
                        <th scope="col">Title</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($komik as $index => $k) : ?>
                        <tr>
                            <th scope="row"><?= $index + 1; ?></th>
                            <td><img src="/img/<?= $k['sampul']; ?>" alt="Sampul <?= $k['judul']; ?>" class="sampul" style="width: 100px; height: auto;"></td>
                            <td><?= $k['judul']; ?></td>
                            <td>
                                <a href="/komik/<?= $k['slug']; ?>" class="btn btn-info">Details</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?= $this->endSection('page-content'); ?>