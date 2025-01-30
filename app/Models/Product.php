<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table="products";

    protected $fillable=[
        'name',
        'description',
        'image',
        'adress',
        'price',
        'user_id',
        'chaild_category_id',
        'created_at',
        'updated_at'
    ];


    public function user(){
        return $this->belongsTo(User::class,'user_id','id');
    }

    public function chaild(){
        return $this->belongsTo(ChaildCategory::class,'chaild_category_id','id');
    }

    public function images(){
        return $this->hasMany(ProductImages::class,'product_id','id');
    }

    public function cart(){
        return $this->hasMany(Cart::class,'product_id');
    }
    
}
