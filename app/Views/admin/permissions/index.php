<?= $this->extend('templates/index'); ?>

<?= $this->section('page-content'); ?>

<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800">Permissions</h1>

    <?php if (session()->getFlashdata('success')) : ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <?= session()->getFlashdata('success') ?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    <?php endif; ?>

    <a href="<?= base_url('admin/permissions/create'); ?>" class="btn btn-primary mb-3">
        <i class="fas fa-plus"></i> Add Permission
    </a>

    <table class="table table-striped table-bordered shadow-sm">
        <thead>
            <tr>
                <th>No</th>
                <th>Name</th>
                <th>Description</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php $i = 1; ?>
            <?php foreach ($permissions as $permission) : ?>
                <tr>
                    <th scope="row"><?= $i++ ?></th>
                    <td><?= esc($permission['name']); ?></td>
                    <td><?= esc($permission['description']); ?></td>
                    <td>
                        <a href="<?= base_url('admin/permissions/edit/' . $permission['id']); ?>" class="btn btn-warning btn-sm">
                            <i class="fas fa-edit"></i> Edit
                        </a>
                        <a href="<?= base_url('admin/permissions/delete/' . $permission['id']); ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this permission?');">
                            <i class="fas fa-trash-alt"></i> Delete
                        </a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<?= $this->endsection(); ?>