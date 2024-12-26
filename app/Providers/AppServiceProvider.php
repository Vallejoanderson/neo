<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;


use App\Modules\Authentication\Domain\AuthServiceInterface;
use App\Modules\Category\Domain\CategoryServiceInterface;

use App\Modules\Authentication\Application\AuthServiceGeneric;
use App\Modules\Category\Application\CategoryServiceGeneric;

use App\Modules\Subcategory\Domain\SubcategoryServiceInterface;
use App\Modules\Subcategory\Application\SubcategoryServiceGeneric;

use App\Modules\Product\Domain\ProductServiceInterface;
use App\Modules\Product\Application\ProductServiceGeneric;

use App\Modules\Purchase\Domain\PurchaseServiceInterface;
use App\Modules\Purchase\Application\PurchaseServiceGeneric;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
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

        $this->app->singleton(PurchaseServiceInterface::class, function() {
            return new PurchaseServiceGeneric();
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {

    }
}
