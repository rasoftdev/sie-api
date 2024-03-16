<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;

Route::prefix('v1')->group(function () {
    Route::post("login", [AuthController::class, "login"]);
    Route::post("register", [AuthController::class, "register"]);
    Route::post("register2", [AuthController::class, "register2"]);
    Route::post("forgot-password", [AuthController::class, "forgotPassword"]);
    Route::post("reset-password", [AuthController::class, "resetPassword"]);

    Route::group([
        "middleware" => ["auth"]
    ], function () {
        Route::get("me", [AuthController::class, "me"]);
        Route::get("refresh", [AuthController::class, "refreshToken"]);
        Route::get("logout", [AuthController::class, "logout"]);
    });
    Route::group([
        "middleware" => ["auth"],
        "prefix" => "permissions"
    ], function () {
        Route::get("/", [RoleController::class, "permissions"])->middleware('roleOrPermission:view_roles');
    });
    Route::group([
        "middleware" => ["auth"],
        "prefix" => "roles"
    ], function () {
        Route::get("/", [RoleController::class, "index"])->middleware('roleOrPermission:view_roles');
        Route::get("/permissions", [RoleController::class, "permissions"])->middleware('roleOrPermission:create_roles');
        Route::post("/", [RoleController::class, "store"])->middleware('roleOrPermission:create_roles');
        Route::get("{role}", [RoleController::class, "show"])->middleware('roleOrPermission:view_roles');
        Route::put("{role}", [RoleController::class, "update"])->middleware('roleOrPermission:edit_roles');
        Route::delete("{role}", [RoleController::class, "destroy"])->middleware('roleOrPermission:delete_roles');
    });
    Route::group([
        "middleware" => ["auth"],
        "prefix" => "users"
    ], function () {
        Route::get("/", [UserController::class, "index"])->middleware('roleOrPermission:view_users');
    });
});

