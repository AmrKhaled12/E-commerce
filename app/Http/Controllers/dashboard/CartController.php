<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Services\Carts\CreateCart;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CartController extends Controller
{
  public function storeToCart(Request $request,CreateCart $cart)
  {

    $cart->add($request->product_id, $request->quantity);
    return redirect()->route('show-cart');
  }

  public function showCart(CreateCart $carts)
  {
    $cart = $carts->get();
    
    if (!$cart) {
      return redirect()->route('show-dashboard');
    }
    $total = $carts->total();

    return view('dashboard.cart', ['carts' => $cart, 'total' => $total]);
  }

  public function deleteItem($id,CreateCart $cart)
  {
    $cart->delete($id);
    return redirect()->route('show-cart');
  }
}
