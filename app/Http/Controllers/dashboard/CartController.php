<?php

namespace App\Http\Controllers\dashboard;

use App\Classes\Cart\CreateCart;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CartController extends Controller
{
  protected $cart;
  public function __construct()
  {
    $this->cart=new CreateCart();
  }
  public function storeToCart(Request $request){

    $this->cart->add($request->product_id,$request->quantity);
    return redirect()->route('show-cart');
  }

  public function showCart(){
    $cart=$this->cart->get();
    if(!$cart){
      return redirect()->route('show-dashboard');
    }
    $total=$this->cart->total();
    return view('dashboard.cart',['carts'=>$cart,'total'=>$total]);
  }

  public function deleteItem($id){
    $this->cart->delete($id);
    return redirect()->route('show-cart');
  }
}
