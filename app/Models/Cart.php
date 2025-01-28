<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Cart extends Model
{
    protected $fillable=[
        'user_id',
        'cookie_id',
        'product_id',
        'id',
        'quantity'
    ];

    public function user(){
        return $this->belongsTo(User::class,'user_id');
    }

    public function product(){
        return $this->hasMany(Product::class,'product_id');
    }

}
