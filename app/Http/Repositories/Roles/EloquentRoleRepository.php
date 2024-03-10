<?php

namespace App\Http\Repositories\Roles;

use App\Http\Repositories\Roles\RoleRepositoryInterface;
use Illuminate\Support\Collection;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class EloquentRoleRepository implements RoleRepositoryInterface
{
    public function all(): Collection
    {
        return Role::all();
    }

    public function find(int $id)
    {
        return Role::find($id);
    }

    public function store(array $data)
    {
        return Role::create($data);
    }

    public function update(int $id, array $data)
    {
        $role = $this->find($id);
        $role->update($data);
        return $role;
    }

    public function delete(int $id)
    {
        $role = $this->find($id);
        $role->delete();
    }

    public function assignPermissions(int $roleId, array $permissionIds)
    {
        $role = $this->find($roleId);
        $permissions = Permission::whereIn('id', $permissionIds)->get();
        $role->givePermissionTo($permissions);
    }

    public function syncPermissions(int $roleId, array $permissionIds)
    {
        $role = $this->find($roleId);
        $permissions = Permission::whereIn('id', $permissionIds)->get();
        $role->syncPermissions($permissions);
    }
}
