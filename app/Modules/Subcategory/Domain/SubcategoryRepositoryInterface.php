<?php

namespace App\Modules\Subcategory\Domain;

use Illuminate\Http\Request;
use App\Modules\Subcategory\Dtos\CategoryDto;

interface SubcategoryRepositoryInterface {
    public function findAll();

    public function findByParams(CategoryDto $category);

    public function save(Request $request);
}
