<?php

namespace App\Http\Controllers\Dashboard;


use App\Http\Controllers\Controller;
use App\Models\ChaildCategory;
use App\Http\Services\Products\ShowProduct;


class ProductController extends Controller
{

    public function showProducts($id,ShowProduct $product)
    {
        
        $products = $product->productsForSubCategory($id);
        return view('dashboard.products', with(['products' => $products]));
    }

    public function showCategoryProducts($id,ShowProduct $product)
    {
        $chaildIds = ChaildCategory::select('id')->where('parent_id', '=', $id)->get();
        $products=$product->productsForMainCategory($chaildIds);
        return view('dashboard.products', with(['products' => $products]));
    }

    public function showUserProducts(ShowProduct $product)
    {
        $products=$product->UserProduct();        
        return view('dashboard.products', with(['products' => $products]));
    }

    public function showItem($id,ShowProduct $product){
        $product=$product->showItem($id);
        return view('dashboard.item',['product'=>$product]);
    }
}
