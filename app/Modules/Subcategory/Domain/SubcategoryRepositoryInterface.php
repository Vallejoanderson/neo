<?php

namespace App\Modules\Subcategory\Domain;

use Illuminate\Http\Request;

interface SubcategoryRepositoryInterface {
    public function findAll();

    public function save(Request $request);
}
