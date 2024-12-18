<?php

namespace App\Modules\Category\Infrastructure;

use App\Modules\Category\Domain\Category;
use App\Modules\Category\Domain\CategoryRepositoryInterface;

class CategoryRepositoryMySQL implements CategoryRepositoryInterface
{
    public function get()
    {
        try {
            return Category::all();
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function save($request)
    {
        try {
            return Category::create([
                'name' => $request->name,
                'created_at' => now(),
                'updated_at' => now()
            ]);
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
