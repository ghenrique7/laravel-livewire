<?php

namespace App\Providers;

use App\Repositories\{IndicatorRepositoryInterface,
    ObjectiveRepositoryInterface,
    PDIRepositoryInterface,
    PDURepositoryInterface,
    SectorRepositoryInterface};
use App\Repositories\Support\SectorRepository;
use App\Repositories\Plans\{IndicatorRepository, ObjectiveRepository, PDIRepository, PDURepository};
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        $this->app->bind(
            PDIRepositoryInterface::class,
            PDIRepository::class
        );

        $this->app->bind(
            ObjectiveRepositoryInterface::class,
            ObjectiveRepository::class
        );

        $this->app->bind(
            IndicatorRepositoryInterface::class,
            IndicatorRepository::class
        );

        $this->app->bind(
            PDURepositoryInterface::class,
            PDURepository::class
        );
    }
}
