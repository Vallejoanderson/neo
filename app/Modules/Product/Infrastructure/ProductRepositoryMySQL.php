<?php

namespace App\Modules\Product\Infrastructure;

use App\Modules\Product\Domain\Product;
use App\Modules\Product\Dtos\ProductDto;
use App\Modules\Product\Dtos\SearchProductDto;
use App\Modules\Product\Dtos\UpdateProductDto;
use App\Modules\Product\Domain\ProductRepositoryInterface;

class ProductRepositoryMySQL implements ProductRepositoryInterface
{
    public function index(SearchProductDto $search)
    {
        $categoryId = $search->subcategory_id;
        $searchText = $search->search_text;

        try {
            return Product::when($categoryId, function ($query, $categoryId) {
                                    $query->where('subcategory_id', $categoryId);
                                })
                          ->when($searchText, function ($query, $searchText) {
                                    $query->where('name', 'like', '%' . $searchText . '%');
                                })
                            ->get();
        } catch (\Throwable $th) {
            throw $th;
        }
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

    public function update(UpdateProductDto $request)
    {
        $id = $request->id;
        $name = $request->name;
        $subcategoryId = $request->subcategory_id;
        try {
            Product::where('id', $id)
                   ->when($name, function ($query, $name) {
                       $query->update(['name' => $name]);
                   })
                   ->when($subcategoryId, function ($query, $subcategoryId) {
                       $query->update(['subcategory_id' => $subcategoryId]);
                   })
                   ->update(['updated_at' => now()]);

            return Product::find($id);
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
