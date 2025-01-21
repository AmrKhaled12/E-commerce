<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class ChaildCategory extends Model
{
    protected $table='chaild_categories';

    protected $guarded=[];

    public function parentCategory(){
        return $this->belongsTo(ParentCategory::class,'parent_id');
    }

    public function product(){
        return $this->hasMany(Product::class,'chaild_category_id','id');
    }
}
