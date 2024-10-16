<?= $this->extend('templates/index'); ?>

<?= $this->section('page-content'); ?>

<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800">Role List</h1>

    <!-- Notifikasi Success -->
    <?php if (session()->getFlashdata('success')) : ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <i class="fas fa-check-circle"></i> <?= session()->getFlashdata('success'); ?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    <?php endif; ?>

    <!-- Notifikasi Error -->
    <?php if (session()->getFlashdata('error')) : ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <i class="fas fa-exclamation-circle"></i> <?= session()->getFlashdata('error'); ?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    <?php endif; ?>

    <!-- Tombol untuk Menambahkan Role -->
    <a href="<?= base_url('admin/roles/create'); ?>" class="btn btn-primary mb-3">
        <i class="fas fa-plus"></i> Add Role
    </a>

    <!-- Tabel Daftar Roles -->
    <table class="table table-striped table-bordered">
        <thead class="thead-light">
            <tr>
                <th>No</th>
                <th>Name</th>
                <th>Description</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($roles) && is_array($roles)): ?>
                <?php $i = 1; ?>
                <?php foreach ($roles as $role) : ?>
                    <tr>
                        <th scope="row"><?= $i++ ?></th>
                        <td><?= esc($role['name']); ?></td>
                        <td><?= esc($role['description']); ?></td>
                        <td>
                            <a href="<?= base_url('admin/roles/edit/' . $role['id']); ?>" class="btn btn-warning">
                                <i class="fas fa-edit"></i> Edit
                            </a>
                            <form action="<?= base_url('admin/roles/delete/' . $role['id']); ?>" method="post" style="display:inline;">
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this role?');">
                                    <i class="fas fa-trash"></i> Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="4" class="text-center">No roles found.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>

<?= $this->endsection(); ?>