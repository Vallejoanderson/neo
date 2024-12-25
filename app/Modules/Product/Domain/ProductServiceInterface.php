<?php

namespace App\Modules\Product\Domain;

use App\Modules\Product\Dtos\ProductDto;
use App\Modules\Product\Dtos\SearchProductDto;

interface ProductServiceInterface {

    public function index(SearchProductDto $request);

    public function save(ProductDto $request);
}
