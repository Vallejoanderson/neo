<?php

namespace App\Modules\Product\Application;

use Illuminate\Support\Facades\App;
use App\Modules\Product\Domain\ProductServiceInterface;
use App\Modules\Product\Domain\ProductRepositoryInterface;
use App\Modules\Product\Dtos\ProductDto;
use App\Modules\Product\Dtos\SearchProductDto;
use App\Modules\Product\Dtos\UpdateProductDto;

class ProductServiceGeneric implements ProductServiceInterface
{
    private ProductRepositoryInterface $productRepository;

    public function __construct()
    {
        $this->productRepository = App::make(ProductRepositoryInterface::class);
    }

    public function index(SearchProductDto $request) {
        return $this->productRepository->index($request);
    }

    public function save(ProductDto $product) {
        return $this->productRepository->save($product);
    }

    public function update(UpdateProductDto $request) {
        return $this->productRepository->update($request);
    }

    public function delete(int $id) {
        return $this->productRepository->delete($id);
    }
}
