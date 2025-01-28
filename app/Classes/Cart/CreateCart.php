<?php

namespace App\Classes\Cart;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class CreateCart implements CartRepository{

    public function get(){

        return Cart::all();
    }

    public function add(Product $product, $quantity = 1)
    {
        Cart::create([
            'user_id' => Auth::id(),
            'product_id' => $product->id,
            'quantity' => $quantity,
            'cookie_id' => Str::uuid(),
        ]);
    }

    public function update(Product $product, $quantity)
    {
        Cart::where('product_id','=',$product->id)
        ->update([
            'quantity' => $quantity
        ]);
    }

    public function delete(Product $product)
    {
        Cart::where('product_id','=',$product->id)->delete();
    }

    public function empty()
    {
        Cart::where('cookie_id','=','')->destroy();    
    }



}