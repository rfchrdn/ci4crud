<?php

namespace App\Controllers;

use App\Models\GroupModel;
use App\Models\PermissionModel;
use App\Models\RolePermissionModel;

class RolePermissionController extends BaseController
{
    protected $groupModel;
    protected $permissionModel;
    protected $rolePermissionModel;

    public function __construct()
    {
        $this->groupModel = new GroupModel();
        $this->permissionModel = new PermissionModel();
        $this->rolePermissionModel = new RolePermissionModel();
    }

    public function index()
    {
        // Menetapkan judul
        $data['title'] = 'Manage Role Permissions';

        // Mengambil grup dan izin
        $groups = $this->groupModel->findAll();
        $permissions = $this->permissionModel->findAll();

        // Mengambil izin grup
        $groupPermissions = [];
        foreach ($groups as $group) {
            $groupPermissions[$group['id']] = $this->rolePermissionModel->getPermissionsByRole($group['id']);
        }

        // Gabungkan semua data ke dalam satu array
        $data['groups'] = $groups;
        $data['permissions'] = $permissions;
        $data['groupPermissions'] = $groupPermissions;

        // Kirim array data lengkap ke tampilan
        return view('admin/role_permission/index', $data);
    }


    public function assignPermission()
    {
        $roleId = $this->request->getPost('role_id');
        $permissionIds = $this->request->getPost('permission_id');

        $assignedCount = 0;
        $existingCount = 0;
        $errors = [];

        if (empty($permissionIds)) {
            return redirect()->to('admin/access')->with('error', 'No permissions selected.');
        }

        foreach ($permissionIds as $permissionId) {
            $result = $this->rolePermissionModel->addPermissionToRole($roleId, $permissionId);
            if ($result === true) {
                $assignedCount++;
            } elseif ($result === 'exists') {
                $existingCount++;
            } else {
                $errors[] = "Failed to assign permission ID $permissionId to role ID $roleId";
            }
        }

        log_message('info', "Assign permissions - Role ID: $roleId, Assigned: $assignedCount, Existing: $existingCount, Errors: " . count($errors));

        if (empty($errors)) {
            $message = "$assignedCount new permissions assigned";
            if ($existingCount > 0) {
                $message .= " and $existingCount permissions were already assigned";
            }
            return redirect()->to('admin/access')->with('success', $message);
        }

        foreach ($errors as $error) {
            log_message('error', $error);
        }

        if ($assignedCount > 0 || $existingCount > 0) {
            $message = "$assignedCount new permissions assigned";
            if ($existingCount > 0) {
                $message .= " and $existingCount permissions were already assigned";
            }
            $message .= ", but some failed. Check error logs for details.";
            return redirect()->to('admin/access')->with('warning', $message);
        } else {
            return redirect()->to('admin/access')->with('error', 'Failed to assign permissions. Check error logs for details.');
        }
    }

    public function removePermission($roleId)
    {
        $permissionIds = $this->request->getPost('permission_id');

        $removedCount = 0;
        $errors = [];

        foreach ($permissionIds as $permissionId) {
            if ($this->rolePermissionModel->removePermissionFromRole($roleId, $permissionId)) {
                $removedCount++;
            } else {
                $errors[] = "Failed to remove permission ID $permissionId from role ID $roleId";
            }
        }

        if (empty($errors)) {
            return redirect()->to('admin/access')->with('success', "$removedCount permissions removed from role successfully.");
        }

        foreach ($errors as $error) {
            log_message('error', $error);
        }

        if ($removedCount > 0) {
            return redirect()->to('admin/access')->with('warning', "$removedCount permissions removed, but some failed. Check error logs for details.");
        } else {
            return redirect()->to('admin/access')->with('error', 'Failed to remove permissions. Check error logs for details.');
        }
    }
}
