<?php

namespace App\Classes;

use Illuminate\Support\Facades\DB;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;

class ProductService
{

    public function CreateProduct(array $data)
    {
        DB::table('products')->insert([
            'name' => $data['AdName'],
            'address' => $data['address'],
            'description' => $data['description'],
            'price' => $data['price'],
            'user_id' => Auth::user()->id,
            'chaild_category_id' => $data['chaild'],
        ]);
    }

    public function getProductId($chaildCategoryId)
    {
        $productId = DB::table('products')
            ->select('id')
            ->where('user_id', '=', session('userdata')['id'])
            ->where('chaild_category_id', '=', $chaildCategoryId)
            ->get();
        return ($productId[$productId->count() - 1])->id;
    }

    public function SaveImages(array $images, $productId)
    {

        foreach ($images as $image) {
            $path = $image->store('products', [
                'disk' => 'ProductImages'
            ]);
            DB::table('product_images')->insert([
                'product_id' => $productId,
                'path' => $path
            ]);
        }
    }

    
}
