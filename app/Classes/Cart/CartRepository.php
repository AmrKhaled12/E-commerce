<?php

namespace App\Classes\Cart;

use App\Models\Product;

interface CartRepository{

   public function get() ;

   public function add($productId,$quantity=1);

   public function update(Product $product,$quantity);

   public function delete($productId);

   public function empty();

   public function total();


}