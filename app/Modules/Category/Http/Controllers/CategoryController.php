<?php

namespace App\Modules\Category\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Modules\Category\Application\CategoryService;

class CategoryController extends Controller
{
    private CategoryService $categoryService;

    public function __construct()
    {
        $this->categoryService = new CategoryService();
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
}
