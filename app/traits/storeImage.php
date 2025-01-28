<?php

namespace App\traits;

trait storeImage 
{

public static function storeImageForCategory($image){
    return $image->store('category',[
        'disk' => 'ProductImages'
    ]);
    // return path for this image
}





}