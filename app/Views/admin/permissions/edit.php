<?= $this->extend('templates/index'); ?>

<?= $this->section('page-content'); ?>

<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800">Edit Permission</h1>

    <form action="<?= base_url('admin/permissions/update/' . $permission['id']); ?>" method="post">
        <div class="form-group">
            <label for="name">Permission Name</label>
            <input type="text" class="form-control" id="name" name="name" value="<?= esc($permission['name']); ?>" required>
        </div>
        <div class="form-group">
            <label for="description">Description</label>
            <textarea class="form-control" id="description" name="description"><?= esc($permission['description']); ?></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Update Permission</button>
    </form>
</div>

<?= $this->endsection(); ?>