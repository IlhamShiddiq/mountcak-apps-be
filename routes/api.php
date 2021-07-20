<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\UserController;
use App\Http\Controllers\API\MountainController;
use App\Http\Controllers\API\TeamController;

Route::get('/welcome', function() {
    return response()->json(['body' => 'welcome']);
});

Route::prefix('user')->group(function () {
    Route::post('/login', [AuthController::class, 'login'])->name('login');
    Route::group(['middleware' => ['auth:sanctum']],function () {
        Route::post('/logout', [AuthController::class, 'logout']);
        Route::post('/signup', [UserController::class, 'store']);
        Route::get('/{id}', [UserController::class, 'show']);
        Route::put('/data/{id}', [UserController::class, 'update']);
        Route::post('/picture/{id}', [UserController::class, 'updatePicture']);
        Route::put('/password/{id}', [UserController::class, 'updatePassword']);
    });
});

Route::prefix('mountain')->group(function () {
    Route::group(['middleware' => ['auth:sanctum']],function () {
        Route::get('/', [MountainController::class, 'index']);
        Route::get('/{id}', [MountainController::class, 'show']);
        Route::get('/{id}/teams', [TeamController::class, 'index']);
        Route::get('/{id}/teams/{team_id}', [TeamController::class, 'show']);
    });
});
