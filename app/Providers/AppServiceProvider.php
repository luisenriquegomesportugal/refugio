<?php

namespace App\Providers;

use App\Repositories\Interfaces\MembroRepositoryInterface;
use App\Repositories\Interfaces\RedeRepositoryInterface;
use App\Repositories\Interfaces\RefukidsRepositoryInterface;
use App\Repositories\Interfaces\UserRepositoryInterface;
use App\Repositories\Providers\Mysql\MembroRepository;
use App\Repositories\Providers\Mysql\RedeRepository;
use App\Repositories\Providers\Mysql\RefukidsRepository;
use App\Repositories\Providers\Mysql\UserRepository;
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
        $this->app->bind(UserRepositoryInterface::class, UserRepository::class);
        $this->app->bind(MembroRepositoryInterface::class, MembroRepository::class);
        $this->app->bind(RedeRepositoryInterface::class, RedeRepository::class);
        $this->app->bind(RefukidsRepositoryInterface::class, RefukidsRepository::class);
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
