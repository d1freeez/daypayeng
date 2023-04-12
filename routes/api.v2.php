<?php

use App\Http\Controllers\API\V2;

Route::prefix('v2')->group(function() {
    Route::prefix('auth')->group(function() {
        Route::post('login', [V2\Auth\LoginController::class, 'store']);

        Route::post('reset-password', [V2\Auth\ResetPasswordController::class, 'store']);
    });

    Route::middleware('auth:sanctum')->group(function () {
        Route::delete('auth/logout', [V2\Auth\LoginController::class, 'destroy']);

        Route::get('profile', [V2\User\ProfileController::class, 'show']);
        Route::put('profile/update', [V2\User\ProfileController::class, 'update']);

        Route::get('advance-accounts', [V2\AdvanceAccount\MainController::class, 'index']);
        Route::post('advance-accounts', [V2\AdvanceAccount\MainController::class, 'store']);
    });
});
