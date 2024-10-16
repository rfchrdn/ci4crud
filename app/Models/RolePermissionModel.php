<?php

namespace App\Models;

use CodeIgniter\Model;

class RolePermissionModel extends Model
{
    protected $table = 'auth_groups_permissions';
    protected $primaryKey = 'id';
    protected $allowedFields = ['group_id', 'permission_id'];

    public function getPermissionsByRole($roleId)
    {
        return $this->db->table('auth_groups_permissions gp')
            ->join('auth_permissions p', 'gp.permission_id = p.id')
            ->where('gp.group_id', $roleId)
            ->select('p.id, p.name')
            ->get()->getResultArray();
    }

    public function addPermissionToRole($roleId, $permissionId)
    {
        // Check if the permission is already assigned to the role
        $existingPermission = $this->where('group_id', $roleId)
            ->where('permission_id', $permissionId)
            ->first();

        if ($existingPermission) {
            // Permission already exists, consider this a success
            log_message('info', "Permission ID $permissionId already assigned to role ID $roleId");
            return 'exists';
        }

        try {
            $result = $this->insert(['group_id' => $roleId, 'permission_id' => $permissionId]);
            if ($result === false) {
                // Log the error if insert fails
                log_message('error', 'Failed to insert role permission: ' . print_r($this->errors(), true));
                return false;
            }
            log_message('info', "Successfully assigned permission ID $permissionId to role ID $roleId");
            return true;
        } catch (\Exception $e) {
            // Log any exceptions
            log_message('error', 'Exception when inserting role permission: ' . $e->getMessage());
            return false;
        }
    }

    public function removePermissionFromRole($roleId, $permissionId)
    {
        try {
            $result = $this->where(['group_id' => $roleId, 'permission_id' => $permissionId])->delete();
            if ($result === false) {
                log_message('error', 'Failed to remove role permission: ' . print_r($this->errors(), true));
                return false;
            }
            log_message('info', "Successfully removed permission ID $permissionId from role ID $roleId");
            return true;
        } catch (\Exception $e) {
            log_message('error', 'Exception when removing role permission: ' . $e->getMessage());
            return false;
        }
    }
}
