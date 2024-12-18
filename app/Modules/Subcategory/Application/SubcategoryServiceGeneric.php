<?php

namespace App\Modules\Subcategory\Application;

use App\Modules\Subcategory\Domain\SubcategoryServiceInterface;
use App\Modules\Subcategory\Domain\SubcategoryRepositoryInterface;
use Illuminate\Support\Facades\App;

class SubcategoryServiceGeneric implements SubcategoryServiceInterface
{
    private SubcategoryRepositoryInterface $repository;

    public function __construct()
    {
        $this->repository = App::make(SubcategoryRepositoryInterface::class);
    }

    public function findAll() {
        $response = $this->repository->findAll();
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
