<?= $this->extend('templates/index'); ?>

<?= $this->section('page-content'); ?>

<div class="container mt-5">
    <h1 class="mb-4">Manage Role Permissions</h1>

    <?php if (session()->getFlashdata('success')): ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <?= session()->getFlashdata('success') ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php endif; ?>

    <?php if (session()->getFlashdata('error')): ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <?= session()->getFlashdata('error') ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php endif; ?>

    <div class="card mb-4 shadow-sm">
        <div class="card-header bg-primary text-white">
            <h5 class="mb-0">Current Role Permissions</h5>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Role Name</th>
                            <th>Permissions</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($groups as $group): ?>
                            <tr>
                                <td><?= esc($group['name']) ?></td>
                                <td>
                                    <?php
                                    if (isset($groupPermissions[$group['id']]) && !empty($groupPermissions[$group['id']])) {
                                        foreach ($groupPermissions[$group['id']] as $permission) {
                                            echo '<span class="badge bg-primary me-1">' . esc($permission['name']) . '</span>';
                                        }
                                    } else {
                                        echo '<span class="badge bg-secondary">No Permissions Assigned</span>';
                                    }
                                    ?>
                                </td>
                                <td>
                                    <form action="<?= base_url('admin/access/remove/' . $group['id']) ?>" method="post">
                                        <select name="permission_id[]" class="form-select permission-select" multiple>
                                            <?php foreach ($permissions as $permission): ?>
                                                <option value="<?= $permission['id'] ?>"><?= esc($permission['name']) ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                        <button type="submit" class="btn btn-danger btn-sm mt-2">Remove</button>
                                    </form>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="card shadow-sm">
        <div class="card-header bg-success text-white">
            <h5 class="mb-0">Assign Permission to Role</h5>
        </div>
        <div class="card-body">
            <form action="<?= base_url('admin/access/assign') ?>" method="post">
                <div class="mb-3">
                    <label for="role_id" class="form-label">Select Role</label>
                    <select name="role_id" id="role_id" class="form-select" required>
                        <option value="">Select Role</option>
                        <?php foreach ($groups as $group): ?>
                            <option value="<?= $group['id'] ?>"><?= esc($group['name']) ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="permission_id" class="form-label">Select Permissions</label>
                    <select name="permission_id[]" id="permission_id" class="form-select permission-select" multiple required>
                        <?php foreach ($permissions as $permission): ?>
                            <option value="<?= $permission['id'] ?>"><?= esc($permission['name']) ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Assign</button>
            </form>
        </div>
    </div>
</div>

<?= $this->endsection(); ?>

<?= $this->section('scripts'); ?>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

<script>
    $(document).ready(function() {
        $('.permission-select').select2({
            placeholder: 'Select permissions',
            allowClear: true,
            width: '100%'
        });
    });
</script>

<?= $this->endSection(); ?>