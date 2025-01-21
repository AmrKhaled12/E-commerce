<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use App\Models\ChaildCategory;
use App\Models\ParentCategory;
use App\Models\Product;
use App\Models\ProductImages;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    public function showProducts($id){
       $products=Product::with(['images'=>function($q){
        $q->select('product_id','path')->limit(1);
       }])
       ->select('id','name','price')
       ->where('user_id','!=',session('userdata')['id'])
       ->where('chaild_category_id','=',$id)
       ->get();
       
       return view('dashboard.products',with(['products'=>$products]));
    }

    public function showCategoryProducts($id)  {
        $chaildIds=ChaildCategory::select('id')->where('parent_id','=',$id)->get();
        $products=Product::with(['images'=>function($q){
            $q->select('product_id','path')->limit(1);
           }])
           ->select('id','name','price')
           ->where('user_id','!=',session('userdata')['id'])
           ->whereIn('chaild_category_id',$chaildIds)
           ->get();
           return view('dashboard.products',with(['products'=>$products]));
       
    }

    public function showUserProducts(){
        $products=Product::with(['images'=>function($q){
            $q->select('product_id','path')->limit(1);
           }])
           ->select('id','name','price')
           ->where('user_id','=',session('userdata')['id'])
           ->get();
           return view('dashboard.products',with(['products'=>$products]));
    }
}
