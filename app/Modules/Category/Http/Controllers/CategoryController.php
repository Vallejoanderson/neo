<?php

namespace App\Modules\Category\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use App\Http\Controllers\Controller;
use App\Modules\Category\Domain\CategoryServiceInterface;

class CategoryController extends Controller
{
    private CategoryServiceInterface $categoryService;

    public function __construct()
    {
        $this->categoryService = App::make(CategoryServiceInterface::class);
    }

    public function get(Request $request)
    {
        $categories = $this->categoryService->get();
        return response()->json([
            'data' => $categories,
            'message' => 'Categories retrieved successfully',
            'status' => 200
        ]);
    }

    public function save(Request $request)
    {
        return $this->categoryService->save($request);
    }
}
