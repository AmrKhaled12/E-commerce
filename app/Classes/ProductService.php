<?php

namespace App\Classes;
use Illuminate\Support\Facades\DB;

class ProductService
{

    public function CreateProduct(array $data){
        DB::table('products')->insert([
            'name'=>$data['AdName'],
            'address'=>$data['address'],
            'description'=>$data['description'],
            'price'=>$data['price'],
            'user_id'=>session('userdata')['id'],
            'chaild_category_id'=>$data['chaild'],
        ]);
    }

    public function SaveImages(array $images,$productId){

        foreach($images as $image){
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $path=$image->store('products', [
                'disk'=>'ProductImages'
            ]);
            DB::table('product_images')->insert([
                'product_id'=>$productId,
                'path'=>$path
            ]);
        }

    }

}