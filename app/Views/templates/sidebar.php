<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= base_url('user'); ?>">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-code"></i>
        </div>
        <div class="sidebar-brand-text mx-3">BOOKS <sup>2</sup></div>
    </a>

    <?php if (in_groups('admin')) : ?>
        <!-- Divider -->
        <hr class="sidebar-divider">

        <!-- Heading -->
        <div class="sidebar-heading">
            User Management
        </div>

        <!-- Nav Item - User Management -->
        <li class="nav-item">
            <a class="nav-link" href="<?= base_url('admin'); ?>">
                <i class="fas fa-user"></i>
                <span>User List</span>
            </a>
        </li>

        <!-- Nav Item - Role Management Dropdown -->
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="roleManagementDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-user-tag"></i>
                <span>Role Management</span>
            </a>
            <div class="dropdown-menu" aria-labelledby="roleManagementDropdown">
                <a class="dropdown-item" href="<?= base_url('admin/user_roles'); ?>">Assign User Roles</a>
                <a class="dropdown-item" href="<?= base_url('admin/roles'); ?>">Manage Roles</a>
            </div>
        </li>

        <!-- Nav Item - Permission Management Dropdown -->
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="permissionManagementDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-key"></i>
                <span>Permission Management</span>
            </a>
            <div class="dropdown-menu" aria-labelledby="permissionManagementDropdown">
                <a class="dropdown-item" href="<?= base_url('admin/permissions'); ?>">Manage Permissions</a>
                <a class="dropdown-item" href="<?= base_url('admin/role_permission'); ?>">Assign Role Permissions</a>
            </div>
        </li>

    <?php endif ?>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        User Profile
    </div>

    <!-- Nav Item - My Profile -->
    <li class="nav-item">
        <a class="nav-link" href="<?= base_url('user'); ?>">
            <i class="fas fa-user"></i>
            <span>My Profile</span></a>
    </li>

    <?php if (in_groups('admin')) : ?>
        <!-- Divider -->
        <hr class="sidebar-divider">

        <!-- Heading for Book Management -->
        <div class="sidebar-heading">
            Book Management
        </div>

        <!-- Nav Item - Book List -->
        <li class="nav-item">
            <a class="nav-link" href="<?= base_url('komik'); ?>">
                <i class="fas fa-book"></i>
                <span>Book List</span></a>
        </li>

    <?php endif ?>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Nav Item - Logout -->
    <li class="nav-item">
        <a class="nav-link" href="#" data-toggle="modal" data-target="#logoutModal">
            <i class="fas fa-sign-out-alt"></i>
            <span>Logout</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>