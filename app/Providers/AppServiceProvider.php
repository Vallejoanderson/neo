<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use App\Modules\Authentication\Domain\AuthRepositoryInterface;
use App\Modules\Category\Domain\CategoryRepositoryInterface;

use App\Modules\Authentication\Infrastructure\AuthRepositoryMySQL;
use App\Modules\Category\Infrastructure\CategoryRepositoryMySQL;

use App\Modules\Subcategory\Domain\SubcategoryRepositoryInterface;
use App\Modules\Subcategory\Infrastructure\SubcategoryRepositoryMySQL;

use App\Modules\Product\Domain\ProductRepositoryInterface;
use App\Modules\Product\Infrastructure\ProductRepositoryMySQL;

use App\Modules\Authentication\Domain\AuthServiceInterface;
use App\Modules\Category\Domain\CategoryServiceInterface;

use App\Modules\Authentication\Application\AuthServiceGeneric;
use App\Modules\Category\Application\CategoryServiceGeneric;

use App\Modules\Subcategory\Domain\SubcategoryServiceInterface;
use App\Modules\Subcategory\Application\SubcategoryServiceGeneric;

use App\Modules\Product\Domain\ProductServiceInterface;
use App\Modules\Product\Application\ProductServiceGeneric;

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

        $this->app->singleton(SubcategoryRepositoryInterface::class, function() {
            return new SubcategoryRepositoryMySQL();
        });

        $this->app->singleton(ProductRepositoryInterface::class, function() {
            return new ProductRepositoryMySQL();
        });

        /* Services */
        $this->app->singleton(AuthServiceInterface::class, function() {
            return new AuthServiceGeneric();
        });

        $this->app->singleton(CategoryServiceInterface::class, function() {
            return new CategoryServiceGeneric();
        });

        $this->app->singleton(SubcategoryServiceInterface::class, function() {
            return new SubcategoryServiceGeneric();
        });

        $this->app->singleton(ProductServiceInterface::class, function() {
            return new ProductServiceGeneric();
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
