<?php

/*
|--------------------------------------------------------------------------
| User's dashboards
|--------------------------------------------------------------------------
*/

use App\Http\Controllers\Pages\Dashboard\RedirectController;
use App\Http\Controllers\Pages\Dashboard\DirectorController as DirectorsDashboardController;
use App\Http\Controllers\Pages\Dashboard\Employee\IndexController as EmployeesDashboardController;
use App\Http\Controllers\Pages\Dashboard\Employee\DocumentsController as EmployeesDashboardDocumentsController;
use App\Http\Controllers\Pages\Profile\EmployeeCardController as ProfileEmployeeCardsController;
use App\Http\Controllers\Pages\Profile\EmployeeController as EmployeesProfileController;
use App\Http\Controllers\Pages\Application\CardController as CardApplicationsController;
use App\Http\Controllers\Pages\Profile\MainController as ProfileMainController;

Route::middleware('auth')->group(function () {
    Route::get('dashboard/redirect', RedirectController::class)->name('dashboard.redirect');

    Route::get('dashboard/director', DirectorsDashboardController::class)
        ->name('directors.dashboard');

    Route::prefix('dashboard/employee')->group(function () {
        Route::get('', EmployeesDashboardController::class)
            ->name('employees.dashboard');
        Route::get('documents', EmployeesDashboardDocumentsController::class)
            ->name('employees.dashboard.documents');
        Route::get('cards', [ProfileEmployeeCardsController::class, 'index'])
            ->name('employees.dashboard.cards');
        Route::post('cards', [ProfileEmployeeCardsController::class, 'store'])
            ->name('employees.dashboard.cards.store');
    });

    Route::prefix('employee/profile')->group(function () {
        Route::get('', EmployeesProfileController::class)
            ->name('employees.profile');
        Route::post('applications', [CardApplicationsController::class, 'store'])
            ->name('employees.profile.cards.applications.store');
    });

    Route::group(['prefix' => 'profile'], function () {
        Route::get('account', [ProfileMainController::class, 'index'])->name(
            'profile_account'
        );
        Route::post('account', [ProfileMainController::class, 'update'])->name(
            'profile_account_save'
        );
    });
});
