<?php

namespace App\Classes;
use Illuminate\Support\Facades\DB;
class CategoryService {

    public function storeParentCategory($path,$name){
        DB::table('parent_categories')->insert([
            'name'=>$name,
            'image'=>$path,
        ]);

        
    }

    public function getChaildCategory(string $chaildren) :array{
        return explode(',',$chaildren);
        
    }

    public function storeCategoryImage($image) {
        return $image->store('category',[
            'disk' => 'ProductImages'
        ]);
        //return path for category Image
    }

    public function storeChaildCategory($chaildren,$parentId)  {
        foreach($chaildren as $chaild){
            DB::table('chaild_categories')->insert([
                'name' => $chaild,
                'parent_id' => $parentId,//$id[0]->id
            ]);
        }
    }

}