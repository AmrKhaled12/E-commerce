<?php

namespace App\Http\Controllers\api\category;

use App\Http\Controllers\Controller;
use App\Models\ParentCategory;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
   public function showCategory(){
    $categories=ParentCategory::all();
    return response()->json($categories);
   }
}
