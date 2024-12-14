<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use App\Modules\Authentication\Domain\AuthRepositoryInterface;
use App\Modules\Category\Domain\CategoryRepositoryInterface;

use App\Modules\Authentication\Infrastructure\AuthRepositoryMySQL;
use App\Modules\Category\Infrastructure\CategoryRepositoryMySQL;

use App\Modules\Authentication\Domain\AuthServiceInterface;
use App\Modules\Category\Domain\CategoryServiceInterface;

use App\Modules\Authentication\Application\AuthServiceGeneric;
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

        $this->app->singleton(AuthRepositoryInterface::class, function() {
            return new AuthRepositoryMySQL();
        });

        /* Services */
        $this->app->singleton(AuthServiceInterface::class, function() {
            return new AuthServiceGeneric();
        });

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
