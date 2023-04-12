<?php

namespace App\Providers;

use App\Repositories\Employee\EmployeeRepository;
use App\Repositories\Employee\EmployeeRepositoryInterface;
use App\Repositories\Users\UsersRepository;
use App\Repositories\Users\UsersRepositoryInterface;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    protected array $repositories = [
        EmployeeRepositoryInterface::class => EmployeeRepository::class,
        UsersRepositoryInterface::class => UsersRepository::class
    ];

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        foreach ($this->repositories as $interface => $repository) {
            $this->app->singleton($interface, $repository);
        }
    }
}
