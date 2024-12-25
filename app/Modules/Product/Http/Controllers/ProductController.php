<?php

namespace App\Modules\Product\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use App\Http\Controllers\Controller;
use App\Modules\Product\Domain\ProductServiceInterface;
use App\Modules\Product\Mappers\SaveProductMapper;

class ProductController extends Controller
{
    private ProductServiceInterface  $productService;

    public function __construct()
    {
        $this->productService = App::make(ProductServiceInterface::class);
    }

    public function index(Request $request)
    {
        return $this->productService->index($request);
    }

    public function save(Request $request)
    {
        $mapper = new SaveProductMapper();
        $product = $mapper->map($request);

        return $this->productService->save($product);
    }
}
