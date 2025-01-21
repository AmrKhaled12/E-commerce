<?php

namespace App\Http\Controllers\dashboard;

use App\Classes\CategoryService;
use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use App\Models\ChaildCategory;
use App\Models\ParentCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    protected $category;
    public function __construct()
    {
        $this->category=new CategoryService();
    }

    public function showCategoryForm(){
        return view('dashboard.category');
    }

    public function createCategory(CategoryRequest $request){
     
        $path=$this->category->storeCategoryImage($request->image);
        $this->category->storeParentCategory($path,$request->name);
       $id=ParentCategory::select('id')->where('name','=',$request->name)->get();
       $parentId=$id[0]->id;
       $chaildren=$this->category->getChaildCategory($request->chaildren);
       $this->category->storeChaildCategory($chaildren,$parentId);


        return "done"

    }
}