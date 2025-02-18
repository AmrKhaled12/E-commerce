<?php

namespace App\Http\Controllers\Api\Category;

use App\Http\Controllers\Controller;
use App\Models\ParentCategory;


class CategoryController extends Controller
{
   public function showCategory()
   {
      $categories = ParentCategory::all();
      return response()->json($categories);
   }
}
