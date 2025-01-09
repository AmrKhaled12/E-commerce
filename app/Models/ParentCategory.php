<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ParentCategory extends Model
{
    protected $table='parent_categories';
    
    public function chaild(){
        return $this->hasMany(ChaildCategory::class,'parent_id');
    }
}
