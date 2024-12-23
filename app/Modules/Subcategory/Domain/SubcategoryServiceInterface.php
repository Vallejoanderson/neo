<?php

namespace App\Modules\Subcategory\Domain;

use App\Modules\Subcategory\Dtos\CategoryDto;
use Illuminate\Http\Request;

interface SubcategoryServiceInterface {
    public function findAll();

    public function findByParams(CategoryDto $category);

    public function save(Request $request);
}
