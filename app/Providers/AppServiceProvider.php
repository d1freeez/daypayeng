<?php

namespace App\Providers;

use App\Models\Director;
use App\Models\Employee;
use App\Models\LibCompany;
use App\Observers\CompanyObserver;
use App\Observers\DirectorObserver;
use App\Observers\EmployeeObserver;
use Eloquent;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot(): void
    {
        Eloquent::shouldBeStrict(!app()->isProduction());
        Director::observe(DirectorObserver::class);
        Employee::observe(EmployeeObserver::class);
        LibCompany::observe(CompanyObserver::class);
        Paginator::useBootstrap();
    }
}
