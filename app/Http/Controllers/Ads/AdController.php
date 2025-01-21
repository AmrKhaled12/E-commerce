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
        $this->product=$product;
    }

   public function PostAd(AdRequest $request){

    $this->product->CreateProduct($request->validated());
    
        $productId=DB::table('products')->select('id')
                    ->where('user_id','=',session('userdata')['id'])
                    ->where('chaild_category_id','=',$request->chaild)->get();
        $productId=($productId[$productId->count()-1])->id;
        if ($request->hasFile('images')) {
            $this->product->SaveImages($request->images,$productId);
            
        }
       
   }
}
