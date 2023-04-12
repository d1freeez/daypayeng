<?php

use App\Http\Controllers\Pages\Auth\LoginController;
use App\Http\Controllers\Pages\Auth\RegisterController;
use App\Http\Controllers\Pages\Auth\ResetPassword\MainController as ResetPasswordController;
use App\Http\Controllers\Pages\Auth\ResetPassword\FinishController as ResetPasswordFinishController;
use App\Http\Controllers\Pages\Auth\ResetPassword\SetPasswordController;
use App\Http\Controllers\Pages\Auth\Verification\EmailSentController;
use App\Http\Controllers\Pages\Auth\Verification\FinishController as VerificationFinishController;

Route::group(
    ['middleware' => 'guest'],
    routes: function () {
        /**
         * Registration
         */
        Route::get('register/{token?}', [
            RegisterController::class,
            'index'
        ])->name('register.index');
        Route::post('register', [RegisterController::class, 'store'])->name(
            'register.store'
        );

        /**
         * Authentication
         */
        Route::get('login', [LoginController::class, 'index'])->name('login');
        Route::post('login', [LoginController::class, 'store'])->name(
            'login.post'
        );

        /**
         * Reset password
         */
        Route::get('reset-password', [
            ResetPasswordController::class,
            'index'
        ])->name('reset_password');
        Route::post('reset-password', [
            ResetPasswordController::class,
            'store'
        ])->name('reset_password_post');
        Route::get('reset-password-finish', [
            ResetPasswordFinishController::class,
            'index'
        ])->name('reset_password_finish');
        Route::post('reset-password-finish', [
            ResetPasswordFinishController::class,
            'store'
        ])->name('reset_password_finish_post');

        /**
         * Creating a password
         */
        Route::get('set-password', [
            SetPasswordController::class,
            'index'
        ])->name('set-password');
        Route::post('set-password', [
            SetPasswordController::class,
            'store'
        ])->name('set-password-save');

        /**
         * Email Verification
         */
        Route::group(['prefix' => 'verify'], function () {
            Route::get('email', EmailSentController::class)->name(
                'verify-email-sent'
            );
            Route::get('finish', VerificationFinishController::class)->name(
                'verify-finish'
            );
        });
    }
);
