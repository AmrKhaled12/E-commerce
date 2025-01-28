<?php

namespace App\Classes\Cart;

use App\Models\Product;

interface CartRepository{

   public function get() ;

   public function add(Product $product,$quantity=1);

   public function update(Product $product,$quantity);

   public function delete(Product $product);


}