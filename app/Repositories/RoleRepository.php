<?php

namespace App\Repositories;

use App\Data\RoleData;
use App\Models\Role;

class RoleRepository
{
    public function getRoleById(int $id, $relations = []): Role
    {
        return Role::with($relations)->findOrFail($id);
    }

    public function storeRole(array $rolesData): Role
    {
        $role = new Role;
        $role->fill($rolesData);
        $role->save();

        return $role;
    }

    public function updateRole(RoleData $rolesData, Role $role)
    {
        $role->fill($rolesData->except('id')->toArray());
        $role->update();

        return $role;
    }

    public function deleteRole(Role $role): bool
    {
        return $role->delete();
    }
}
