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

    public function save($request) {
        $response = $this->repository->save($request);
        return response()->json([
            'data' => $response,
            'message' => 'Category created successfully',
            'status' => 201
        ]);
    }
}
