<?php

namespace Clin\Providers;

use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(\Clin\Repositories\HealthCareRepository::class, \Clin\Repositories\HealthCareRepositoryEloquent::class);
        $this->app->bind(\Clin\Repositories\ClinicRepository::class, \Clin\Repositories\ClinicRepositoryEloquent::class);
        $this->app->bind(\Clin\Repositories\ClinicHealthCareRepository::class, \Clin\Repositories\ClinicHealthCareRepositoryEloquent::class);
        $this->app->bind(\Clin\Repositories\UserRepository::class, \Clin\Repositories\UserRepositoryEloquent::class);
        //:end-bindings:
    }
}
