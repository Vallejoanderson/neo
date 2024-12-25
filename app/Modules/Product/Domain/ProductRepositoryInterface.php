<?php

namespace App\Modules\Product\Domain;

use Illuminate\Http\Request;
use App\Modules\Product\Dtos\ProductDto;

interface ProductRepositoryInterface
{
    public function index(Request $request);
    public function save(ProductDto $request);
}
