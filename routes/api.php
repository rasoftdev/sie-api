<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;


Route::post("login", [AuthController::class, "login"])->name("login");

Route::group([
    "middleware" => ["jwt.verify"]
], function () {
    Route::get("me", [AuthController::class, "me"])->name("me");
    Route::get("refresh", [AuthController::class, "refreshToken"])->name("refresh");
    Route::get("logout", [AuthController::class, "logout"])->name("logout");
});


