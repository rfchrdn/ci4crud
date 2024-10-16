<?= $this->extend('templates/index'); ?>

<?= $this->section('page-content'); ?>
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">User List</h1>

    <div class="row">
        <div class="col-lg-12">
            <!-- Tabel dengan DataTables -->
            <table id="userTable" class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Username</th>
                        <th scope="col">Email</th>
                        <th scope="col">Role</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($users as $user) : ?>
                        <tr>
                            <th scope="row"><?= $i++ ?></th>
                            <td><?= esc($user->username); ?></td>
                            <td><?= esc($user->email); ?></td>
                            <td><?= esc($user->name); ?></td>
                            <td>
                                <a href="<?= base_url('admin/' . $user->userid); ?>" class="btn btn-info btn-sm">
                                    <i class="fas fa-info-circle"></i> Detail
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