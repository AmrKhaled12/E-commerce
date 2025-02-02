<?php

namespace App\Http\Controllers\Ads;

use App\Classes\ProductService;
use App\Http\Controllers\Controller;
use App\Http\Requests\AdRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\DB as FacadesDB;

class AdController extends Controller
{
    protected $product;

    public function __construct(ProductService $product)
    {
        $this->product = $product;
    }

    public function PostAd(AdRequest $request)
    {

        $this->product->CreateProduct($request->validated());
        $productId = $this->product->getProductId($request->chaild);
        if ($request->hasFile('images')) {
            $this->product->SaveImages($request->images, $productId);
        }

        return redirect()->route('show-dashboard');
    }
}
