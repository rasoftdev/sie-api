<?php

namespace App\Http\Repositories\Roles;

use Illuminate\Support\Collection;

interface RoleRepositoryInterface
{
    public function all(): Collection;

    public function find(int $id);

    public function store(array $data);

    public function update(int $id, array $data);

    public function delete(int $id);

    public function assignPermissions(int $roleId, array $permissionIds);

    public function syncPermissions(int $roleId, array $permissionIds);
}
