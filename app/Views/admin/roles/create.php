<?= $this->extend('templates/index'); ?>

<?= $this->section('page-content'); ?>

<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800">Add Role</h1>

    <!-- Stylish link to go back to roles list -->
    <a href="<?= base_url('admin/roles'); ?>" class="text-primary mb-3" style="text-decoration: none;">
        <i class="fas fa-arrow-left"></i> Back to Roles
    </a>
    <form action="<?= base_url('admin/roles/store'); ?>" method="post">
        <div class="form-group">
            <label for="name">Role Name</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>
        <div class="form-group">
            <label for="description">Description</label>
            <textarea class="form-control" id="description" name="description"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Create Role</button>
    </form>
</div>

<?= $this->endsection(); ?>