<?php

namespace App\Modules\Product\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use App\Http\Controllers\Controller;
use App\Modules\Product\Domain\ProductServiceInterface;
use App\Modules\Product\Mappers\SaveProductMapper;
use App\Modules\Product\Mappers\SearchProductMapper;
use App\Modules\Product\Mappers\UpdateProductMapper;

class ProductController extends Controller
{
    private ProductServiceInterface $productService;

    public function __construct()
    {
        $this->productService = App::make(ProductServiceInterface::class);
    }

    public function index(Request $request)
    {
        $mapper = new SearchProductMapper();
        $search = $mapper->map($request);

        return $this->productService->index($search);
    }

    public function save(Request $request)
    {
        $mapper = new SaveProductMapper();
        $product = $mapper->map($request);

        return $this->productService->save($product);
    }

    public function update(Request $request)
    {
        $mapper = new UpdateProductMapper();
        $product = $mapper->map($request);

        $response = $this->productService->update($product);

        return response()->json([
            'product' => $response,
            'success' => true,
            'message' => 'Product updated successfully']
        );
    }
}
