<?php

namespace App\Modules\Product\Infrastructure;

use App\Modules\Product\Domain\Product;
use App\Modules\Product\Dtos\ProductDto;
use App\Modules\Product\Domain\ProductRepositoryInterface;

class ProductRepositoryMySQL implements ProductRepositoryInterface
{
    public function index($request)
    {
        return Product::where('subcategory_id', $request->subcategory_id)->get();
    }

    public function save(ProductDto $product)
    {
        try {
            return Product::create([
                'name' => $product->name,
                'subcategory_id' => $product->subcategory_id,
                'created_at' => now(),
                'updated_at' => now()
            ]);
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
