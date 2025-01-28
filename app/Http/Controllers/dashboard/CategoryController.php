<?php

namespace App\Http\Controllers\dashboard;

use App\Classes\CreateCategory;
use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use App\Models\ChaildCategory;
use App\Models\ParentCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
