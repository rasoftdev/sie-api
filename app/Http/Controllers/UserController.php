<?php

namespace App\Http\Controllers;

use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\Http\Resources\RoleResource;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function model()
    {
        return app()->make(User::class);
    }

    public function index(Request $request)
    {
        try {
            $page = $request->query('page', 1);
            $perPage = $request->query('per_page', 10);
            $users = $this->model()->paginate($perPage, ['*'], 'page', $page);

            return response()->json([
                "status" => true,
                "message" => "You are viewing users",
                "data" => UserResource::collection($users),
                "metadata" => [
                    "total_registers" => $users->total(),
                    "pages" => $users->lastPage()
                ]
            ]);
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return response()->json([
                "status" => false,
                "message" => "An error occurred while retrieving users",
                "error" => $e->getMessage()
            ], 500);
        }
    }
}
