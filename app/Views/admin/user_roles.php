<!-- app/Views/admin/user_roles.php -->
<?= $this->extend('templates/index'); ?>

<?= $this->section('page-content'); ?>
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">User Role Management</h1>

    <div class="card">
        <div class="card-header">
            <h5 class="m-0 font-weight-bold text-primary">Users and Their Roles</h5>
        </div>
        <div class="card-body">
            <!-- Berikan ID pada tabel untuk DataTables -->
            <table id="userRoleTable" class="table table-bordered table-striped table-hover">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Username</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($users as $user): ?>
                        <tr>
                            <th scope="row"><?= $i++ ?></th>
                            <td><?= esc($user->username) ?></td>
                            <td><?= esc($user->email) ?></td>
                            <td>
                                <span class="badge badge-<?= ($user->role == 'admin') ? 'success' : 'warning'; ?>">
                                    <?= esc($user->role) ?>
                                </span>
                            </td>
                            <td>
                                <a href="<?= base_url('admin/user_roles/edit/' . $user->userid) ?>" class="btn btn-warning btn-sm">
                                    <i class="fas fa-edit"></i> Edit Role
                                </a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>

<!-- Tambahkan di bagian bawah untuk inisialisasi DataTables -->
<?= $this->section('scripts'); ?>

<?= $this->endSection(); ?>