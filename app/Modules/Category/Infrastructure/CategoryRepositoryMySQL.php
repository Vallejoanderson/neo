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
}
