<?php

namespace App\Modules\Category\Application;

use App\Modules\Category\Domain\CategoryServiceInterface;
use App\Modules\Category\Domain\CategoryRepositoryInterface;
use Illuminate\Support\Facades\App;

class CategoryServiceGeneric implements CategoryServiceInterface
{
    private CategoryRepositoryInterface $repository;

    public function __construct()
    {
        $this->repository = App::make(CategoryRepositoryInterface::class);
    }

    public function get() {
        $response = $this->repository->get();
        return $response;
    }
}
