<?= $this->extend('templates/index'); ?>

<?= $this->section('page-content'); ?>
<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800"><?= esc($title); ?></h1>

    <form action="<?= base_url('admin/user_roles/update'); ?>" method="post">
        <?php if ($user): ?>
            <input type="hidden" name="user_id" value="<?= esc($user->userid); ?>">

            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" class="form-control" id="username" value="<?= esc($user->username); ?>" disabled>
            </div>

            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" value="<?= esc($user->email); ?>" disabled>
            </div>

            <div class="form-group">
                <label for="role">Role</label>
                <select class="form-control" name="role_id" id="role">
                    <?php foreach ($roles as $role): ?>
                        <option value="<?= esc($role['id']); ?>" <?= ($role['id'] == $user->role_id) ? 'selected' : ''; ?>>
                            <?= esc($role['name']); ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Update Role</button>
            <a href="<?= base_url('admin/user_roles'); ?>" class="btn btn-secondary">Cancel</a>
        <?php else: ?>
            <p>User not found.</p>
            <a href="<?= base_url('admin/user_roles'); ?>" class="btn btn-secondary">Back to User Roles</a>
        <?php endif; ?>
    </form>
</div>
<?= $this->endSection(); ?>