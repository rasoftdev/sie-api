<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\PermissionResource;
use Spatie\Permission\Models\Permission;

class RoleResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $permissions = $this->name === 'Super Admin' ? Permission::all() : $this->permissions;

        return [
            'id' => $this->id,
            'name' => $this->name,
            'not_deleted' => $this->name === 'Super Admin',
            'permissions' => PermissionResource::collection($permissions),
        ];
    }
}
