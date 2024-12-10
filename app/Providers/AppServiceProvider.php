<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Modules\Category\Infrastructure\CategoryRepository;
use App\Modules\Category\Infrastructure\CategoryRepositoryMySQL;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->singleton(CategoryRepository::class, function() {
            return new CategoryRepositoryMySQL();
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
