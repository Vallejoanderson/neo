<?php

namespace App\Modules\Product\Application;

use App\Modules\Product\Domain\ProductServiceInterface;
use App\Modules\Product\Domain\ProductRepositoryInterface;
use App\Modules\Product\Dtos\ProductDto;
use Illuminate\Support\Facades\App;

class ProductServiceGeneric implements ProductServiceInterface
{
    private ProductRepositoryInterface $productRepository;

    public function __construct()
    {
        $this->productRepository = App::make(ProductRepositoryInterface::class);
    }

    public function index($request) {
        return $this->productRepository->index($request);
    }

    public function save(ProductDto $product) {
        return $this->productRepository->save($product);
    }
}
