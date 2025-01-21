<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ParentCategory extends Model
{
    protected $table='parent_categories';

    protected $fillable=['id','name','image'];
    
    public function chaild(){
        return $this->hasMany(ChaildCategory::class,'parent_id');
    }
    public function product(){
        return $this->hasManyThrough(Product::class,ChaildCategory::class,'parent_id','chaild_category_id');
    }
}
