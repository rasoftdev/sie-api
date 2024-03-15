<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;

Route::prefix('v1')->group(function () {
    Route::post("login", [AuthController::class, "login"])->name("login");
    Route::post("register", [AuthController::class, "register"])->name("register");
    Route::post("register2", [AuthController::class, "register2"])->name("register2");
    Route::post("forgot-password", [AuthController::class, "forgotPassword"])->name("forgot-password");
    Route::post("reset-password", [AuthController::class, "resetPassword"])->name("reset-password");

    Route::group([
        "middleware" => ["auth"]
    ], function () {
        Route::get("me", [AuthController::class, "me"])->name("me");
        Route::get("refresh", [AuthController::class, "refreshToken"])->name("refresh");
        Route::get("logout", [AuthController::class, "logout"])->name("logout");
    });
    Route::group([
        "middleware" => ["auth"],
        "prefix" => "permissions"
    ], function () {
        Route::get("/", [RoleController::class, "permissions"])->middleware('roleOrPermission:view_roles')->name("permissions.index");
    });
    Route::group([
        "middleware" => ["auth"],
        "prefix" => "roles"
    ], function () {
        Route::get("/", [RoleController::class, "index"])->middleware('roleOrPermission:view_roles')->name("roles.index");
        Route::get("/permissions", [RoleController::class, "permissions"])->middleware('roleOrPermission:create_roles')->name("roles.create");
        Route::post("/", [RoleController::class, "store"])->middleware('roleOrPermission:create_roles')->name("roles.store");
        Route::get("{role}", [RoleController::class, "show"])->middleware('roleOrPermission:view_roles')->name("roles.show");
        Route::put("{role}", [RoleController::class, "update"])->middleware('roleOrPermission:edit_roles')->name("roles.update");
        Route::delete("{role}", [RoleController::class, "destroy"])->middleware('roleOrPermission:delete_roles')->name("roles.destroy");
    });
    Route::group([
        "middleware" => ["auth"],
        "prefix" => "users"
    ], function () {
        Route::get("/", [UserController::class, "index"])->middleware('roleOrPermission:view_users')->name("users.index");
    });
});

