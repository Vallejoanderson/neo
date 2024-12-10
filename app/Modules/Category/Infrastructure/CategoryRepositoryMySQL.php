<?php

namespace App\Modules\Category\Infrastructure;

use Illuminate\Support\Facades\DB;
use App\Modules\Category\Domain\Category;
use App\Modules\Category\Infrastructure\CategoryRepository;

class CategoryRepositoryMySQL implements CategoryRepository
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
