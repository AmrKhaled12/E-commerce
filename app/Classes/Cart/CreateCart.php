<?php

namespace App\Classes\Cart;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

use function Laravel\Prompts\select;
use function Laravel\Prompts\table;

class CreateCart implements CartRepository
{

    public function get()
    {

        return DB::table('carts')
            ->select('carts.quantity', 'carts.product_id', 'products.price', 'products.name')
            ->join('products', 'products.id', '=', 'carts.product_id')
            ->addSelect(DB::raw('(products.price * carts.quantity) as total'))
            ->where('cookie_id', '=', $this->getCookieId())
            ->get();


        // return Cart::with(['product:id,name,price'])
        // ->select('carts.id', 'carts.quantity', 'carts.product_id')
        // ->addSelect(DB::raw('(products.price * carts.quantity) as total'))
        // ->join('products', 'products.id', '=', 'carts.product_id')
        // ->where('cookie_id', $this->getCookieId())
        // ->get();
    }

    public function add($productId, $quantity = 1)
    {
        $items = Cart::where('product_id', '=', $productId)
            ->where('cookie_id', '=', $this->getCookieId())
            ->first();
        if (!$items) {
            $cookie_id = $this->getCookieId();
            Cart::create([
                'user_id' => Auth::id(),
                'product_id' => $productId,
                'quantity' => $quantity,
                'cookie_id' => $cookie_id,
            ]);
        }
        return $items->increment('quantity', $quantity);
    }

    public function update(Product $product, $quantity)
    {
        Cart::where('product_id', '=', $product->id)
            ->where('cookie_id', '=', $this->getCookieId())
            ->update([
                'quantity' => $quantity
            ]);
    }

    public function delete($productId)
    {
        Cart::where('product_id', '=', $productId)
            ->where('cookie_id', '=', $this->getCookieId())
            ->delete();
    }

    public function empty()
    {
        Cart::where('cookie_id', '=', $this->getCookieId())->destroy();
    }

    public function getCookieId()
    {
        $cookie_id = Cookie::get('cart_id');
        if (!$cookie_id) {
            $cookie_id = Str::uuid();
            Cookie::queue('cart_id', $cookie_id, 30 * 24 * 60);
        }
        return $cookie_id;
    }

    public function total()
    {
        return DB::table('carts')
            ->join('products', 'products.id', '=', 'carts.product_id')
            ->selectRaw('SUM(products.price * carts.quantity) as total')
            ->value('total');
    }
}
