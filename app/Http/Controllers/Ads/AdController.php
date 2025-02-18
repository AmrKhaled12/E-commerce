<?php

namespace App\Http\Controllers\Ads;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdRequest;
use App\Http\Services\Products\ProductService;

class AdController extends Controller
{
    public function PostAd(AdRequest $request, ProductService $product)
    {

        $product->CreateProduct($request->validated());
        $productId = $product->getProductId($request->chaild);
        if ($request->hasFile('images')) {
            $product->SaveImages($request->images, $productId);
        }

        return redirect()->route('show-dashboard');
    }
}
