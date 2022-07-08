<?php

namespace App\Providers;

use App\Interface\OutletFacilityInterface;
use App\Interface\OutletInterface;
use App\Interface\OutletRoomInterface;
use App\Interface\UserInterface;
use App\Models\OutletFacility;
use App\Repository\OutletFacilityRepository;
use App\Repository\OutletRepository;
use App\Repository\OutletRoomRepository;
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
        $this->app->bind(OutletRoomInterface::class, OutletRoomRepository::class);
        $this->app->bind(OutletFacilityInterface::class, OutletFacilityRepository::class);
        $this->app->bind(UserInterface::class, UserRepository::class);
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
