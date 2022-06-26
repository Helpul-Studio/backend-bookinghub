<?php

namespace App\Providers;

use App\Interface\OutletInterface;
use App\Interface\UserInterface;
use App\Repository\OutletRepository;
use Illuminate\Support\ServiceProvider;
use App\Repository\UserRepository;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(UserInterface::class, UserRepository::class);
        $this->app->bind(OutletInterface::class, OutletRepository::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
