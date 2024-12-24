<?php

namespace App\Modules\Subcategory\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use App\Http\Controllers\Controller;
use App\Modules\Subcategory\Domain\SubcategoryServiceInterface;
use App\Modules\Subcategory\Mappers\CategoryMapper;

class SubcategoryController extends Controller
{
    private SubcategoryServiceInterface  $subcategoryService;

    public function __construct()
    {
        $this->subcategoryService = App::make(SubcategoryServiceInterface::class);
    }

    public function findAll()
    {
        $subcategories = $this->subcategoryService->findAll();
        return response()->json([
            'data' => $subcategories,
            'message' => 'Subcategories retrieved successfully',
            'status' => 200
        ]);
    }

    public function findByCategory(Request $request)
    {
        $mapper = new CategoryMapper();
        $category = $mapper->map($request);

        $subcategories = $this->subcategoryService->findByCategory($category);
        return response()->json([
            'data' => $subcategories,
            'message' => 'Subcategories retrieved successfully',
            'status' => 200
        ]);
    }

    public function save(Request $request)
    {
        return $this->subcategoryService->save($request);
    }
}
