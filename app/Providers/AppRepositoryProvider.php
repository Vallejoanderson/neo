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

use App\Modules\Purchase\Domain\PurchaseRepositoryInterface;
use App\Modules\Purchase\Infrastructure\PurchaseRepositoryMySQL;

class AppRepositoryProvider extends ServiceProvider
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

        $this->app->singleton(PurchaseRepositoryInterface::class, function() {
            return new PurchaseRepositoryMySQL();
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {

    }
}
