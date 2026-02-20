<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\PermissionController;
use App\Http\Controllers\Api\RoleController;
use App\Http\Controllers\Api\UserController;
use Illuminate\Support\Facades\Route;

Route::prefix('auth')->group(function () {
    Route::post('login', [AuthController::class, 'login']);

    Route::middleware('jwt.auth')->group(function () {
        Route::post('logout', [AuthController::class, 'logout']);
        Route::post('refresh', [AuthController::class, 'refresh']);
        Route::get('profile', [AuthController::class, 'profile']);
    });
});

Route::middleware('jwt.auth')->group(function () {

    Route::middleware('role:admin')->group(function () {
        Route::apiResource('users', UserController::class);
        Route::post('users/{user}/roles', [UserController::class, 'assignRoles']);
    });

    Route::middleware('role:admin,manager')->group(function () {
        Route::apiResource('roles', RoleController::class);
        Route::post('roles/{role}/permissions', [RoleController::class, 'assignPermissions']);
        Route::apiResource('permissions', PermissionController::class);
    });

    Route::middleware('permission:view-reports')->group(function () {
        Route::get('reports', function () {
            return response()->json([
                'success' => true,
                'message' => 'Reports retrieved successfully',
                'data' => ['report' => 'Sample report data'],
            ]);
        });
    });

    Route::middleware('permission:manage-settings')->group(function () {
        Route::get('settings', function () {
            return response()->json([
                'success' => true,
                'message' => 'Settings retrieved successfully',
                'data' => ['settings' => 'Sample settings data'],
            ]);
        });
    });
});
