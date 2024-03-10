<?php

namespace App\Http\Controllers;

use App\Http\Repositories\Roles\RoleRepositoryInterface;
use App\Http\Requests\RoleRequest;
use App\Http\Resources\PermissionResource;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\Http\Resources\RoleResource;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;

class RoleController extends Controller
{
    public function index()
    {
        try {
            $roles = Role::all();
            return response()->json([
                "status" => true,
                "message" => "You are viewing roles",
                "data" => RoleResource::collection($roles)
            ]);
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return response()->json([
                "status" => false,
                "message" => "An error occurred while retrieving roles",
                "error" => $e->getMessage()
            ], 500);
        }
    }

    public function store(RoleRequest $request, RoleRepositoryInterface $roleRepository)
    {
        DB::beginTransaction();

        try {
            $role = $roleRepository->store(['name' => $request->input('name')]);

            $permission_ids = $request->input('permissions');
            $roleRepository->assignPermissions($role->id, $permission_ids);

            DB::commit();

            return response()->json([
                "status" => true,
                "message" => "Role created successfully",
                "data" => new RoleResource($role)
            ]);
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error($e->getMessage());
            return response()->json([
                "status" => false,
                "message" => "An error occurred while creating the role",
                "error" => $e->getMessage()
            ], 500);
        }
    }

    public function show($role)
    {
        try {
            $role = Role::find($role);
            return response()->json([
                "status" => true,
                "message" => "You are viewing role with id: $role->id",
                "data" => new RoleResource($role)
            ]);
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return response()->json([
                "status" => false,
                "message" => "An error occurred while retrieving role with id: $role->id",
                "error" => $e->getMessage()
            ], 500);
        }
    }

    public function update(RoleRequest $request, RoleRepositoryInterface $roleRepository, $role)
    {
        DB::beginTransaction();

        try {
            $role = $roleRepository->update($role, ['name' => $request->input('name')]);

            $permission_ids = $request->input('permissions');
            $roleRepository->syncPermissions($role->id, $permission_ids);

            DB::commit();

            return response()->json([
                "status" => true,
                "message" => "Role updated successfully",
                "data" => new RoleResource($role)
            ]);
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error($e->getMessage());
            return response()->json([
                "status" => false,
                "message" => "An error occurred while updating the role",
                "error" => $e->getMessage()
            ], 500);
        }
    }

    public function destroy(RoleRepositoryInterface $roleRepository, $role)
    {
        $existRole = $roleRepository->find($role);
        try {
            if ($existRole) {
                $roleRepository->delete($role);
            } else {
                throw new \Exception('Role not found');
            }
            return response()->json([
                "status" => true,
                "message" => "Role deleted successfully",
            ]);
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return response()->json([
                "status" => false,
                "message" => "An error occurred while deleting the role",
                "error" => $e->getMessage()
            ], 500);
        }
    }

    public function permissions()
    {
        try {
            $permissions = Permission::all();
            return response()->json([
                "status" => true,
                "message" => "You are viewing permissions",
                "data" => PermissionResource::collection($permissions)
            ]);
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return response()->json([
                "status" => false,
                "message" => "An error occurred while retrieving permissions",
                "error" => $e->getMessage()
            ], 500);
        }
    }
}
