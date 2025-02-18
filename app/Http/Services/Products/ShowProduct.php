<?php

namespace App\Http\Services\Products;

use App\Models\Product;
use Illuminate\Support\Facades\Auth;

class ShowProduct
{
    public function UserProduct()
    {
        return Product::with(['images' => function ($q) {
            $q->select('product_id', 'path')->limit(1);
        }])
            ->select('id', 'name', 'price')
            ->where('user_id', '=', Auth::user()->id)
            ->simplePaginate(15);
    }


    public function productsForMainCategory($chaildCategoriesIds)
    {

        return Product::with(['images' => function ($q) {
            $q->select('product_id', 'path')->limit(1);
        }])
            ->select('id', 'name', 'price')
            ->where('user_id', '!=', Auth::user()->id)
            ->whereIn('chaild_category_id', $chaildCategoriesIds)
            ->simplePaginate(15);
    }

    public function productsForSubCategory($chaildCategoryId)
    {
        return Product::with(['images' => function ($q) {
            $q->select('product_id', 'path')->limit(1);
        }])
            ->select('id', 'name', 'price')
            ->where('user_id', '!=', Auth::user()->id)
            ->where('chaild_category_id', '=', $chaildCategoryId)
            ->simplePaginate(15);
    }

    public function showItem($productId)
    {
        return Product::with(['images', 'user:id,name', 'chaild:id,name'])
            ->where('id', $productId)
            ->first();
    }
}
