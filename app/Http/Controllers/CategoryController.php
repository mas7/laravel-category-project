<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(): View
    {
        $categories = Category::query()
            ->whereNull('parent_id')
            ->get();

        return view('categories.index', compact('categories'));
    }

    public function getSubcategories(Request $request): JsonResponse
    {
        $parent_id = $request->input('parent_id');

        $subcategories = Category::query()
            ->where('parent_id', $parent_id)
            ->get();

        return response()->json($subcategories);
    }
}
