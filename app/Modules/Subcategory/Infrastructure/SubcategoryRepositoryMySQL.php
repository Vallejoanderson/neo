<?php

namespace App\Modules\Subcategory\Infrastructure;

use App\Modules\Subcategory\Domain\Subcategory;
use App\Modules\Subcategory\Domain\SubcategoryRepositoryInterface;

class SubcategoryRepositoryMySQL implements SubcategoryRepositoryInterface
{
    public function findAll()
    {
        try {
            return Subcategory::all();
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function save($request)
    {
        try {
            return Subcategory::create([
                'name' => $request->name,
                'category_id' => $request->category_id,
                'created_at' => now(),
                'updated_at' => now()
            ]);
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
