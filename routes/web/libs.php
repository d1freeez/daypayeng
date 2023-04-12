<?php

use App\Http\Controllers\Pages\Lib\Location\CityController;
use App\Http\Controllers\Pages\Lib\Location\CountryController;
use App\Http\Controllers\Pages\Lib\Location\RegionController;
use App\Http\Controllers\Pages\Lib\ProductionCalendar\HolidayController;
use App\Http\Controllers\Pages\Lib\ProductionCalendar\MonthController;

Route::prefix('lib')->group(function () {
    /** Location library routes */
    Route::prefix('location')->group(function () {
        Route::resource('country', CountryController::class)
            ->except('create', 'edit');

        Route::resource('region', RegionController::class)
            ->except('edit', 'create');

        Route::resource('city', CityController::class)
            ->except('edit', 'create');
    });

    /** Production calendar library routes. */
    Route::prefix('calendar')->group(function () {
        Route::resource('month', MonthController::class)
            ->except('create', 'edit');

        Route::resource('holiday', HolidayController::class)
            ->except('create', 'edit');
    });
});
