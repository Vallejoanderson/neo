<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Modules\Category\Domain\CategoryRepositoryInterface;
use App\Modules\Category\Infrastructure\CategoryRepositoryMySQL;

use App\Modules\Category\Domain\CategoryServiceInterface;
use App\Modules\Category\Application\CategoryServiceGeneric;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        /* Repositories */
        $this->app->singleton(CategoryRepositoryInterface::class, function() {
            return new CategoryRepositoryMySQL();
        });

        /* Services */
        $this->app->singleton(CategoryServiceInterface::class, function() {
            return new CategoryServiceGeneric();
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
