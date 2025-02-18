<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Services\Categories\CreateCategory;
use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;


class CategoryController extends Controller
{

    public function showCategoryForm()
    {
        return view('dashboard.category');
    }

    public function createCategory(CategoryRequest $request)
    {

        $category = new CreateCategory($request->name, $request->image, $request->chaildren);
        $category->Create_category();
        return redirect()->route('show-dashboard');

    }
}
