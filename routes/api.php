<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\UserController;



Route::prefix('user')->group(function () {
    Route::post('/login', [AuthController::class, 'login'])->name('login');
    Route::group(['middleware' => ['auth:sanctum']],function () {
        Route::post('/logout', [AuthController::class, 'logout']);
        Route::post('/signup', [UserController::class, 'store']);
        Route::get('/{id}', [UserController::class, 'show']);
        Route::post('/{id}', [UserController::class, 'update']);
    });
});