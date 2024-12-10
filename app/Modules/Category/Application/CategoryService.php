<?php

namespace App\Modules\Category\Application;

use App\Modules\Category\Infrastructure\CategoryRepository;
use Illuminate\Support\Facades\App;

class CategoryService
{
    private CategoryRepository $repository;

    public function __construct()
    {
        $this->repository = App::make(CategoryRepository::class);
    }

    public function get() {
        $response = $this->repository->get();
        return $response;
    }
}
