<?php

namespace App\Http\Controllers\dashboard;

use App\Classes\ProductService;
use App\Classes\showProduct;
use App\Http\Controllers\Controller;
use App\Models\ChaildCategory;
use App\Models\ParentCategory;
use App\Models\Product;
use App\Models\ProductImages;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{

    public function showProducts($id)
    {
        $products = showProduct::productsForSubCategory($id);
        return view('dashboard.products', with(['products' => $products]));
    }

    public function showCategoryProducts($id)
    {
        $chaildIds = ChaildCategory::select('id')->where('parent_id', '=', $id)->get();
        $products=showProduct::productsForMainCategory($chaildIds);
        return view('dashboard.products', with(['products' => $products]));
    }

    public function showUserProducts()
    {
        $products=showProduct::UserProduct();        
        return view('dashboard.products', with(['products' => $products]));
    }

    public function showItem($id){
        $product=showProduct::showItem($id);
        return view('dashboard.item',['product'=>$product]);
    }
}
