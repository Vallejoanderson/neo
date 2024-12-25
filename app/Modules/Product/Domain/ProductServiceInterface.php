<?php

namespace App\Modules\Product\Domain;

use App\Modules\Product\Dtos\ProductDto;
use App\Modules\Product\Dtos\SearchProductDto;
use App\Modules\Product\Dtos\UpdateProductDto;

interface ProductServiceInterface {

    public function index(SearchProductDto $request);

    public function save(ProductDto $request);

    public function update(UpdateProductDto $request);

    public function delete(int $id);
}
