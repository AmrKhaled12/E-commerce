<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ChaildCategory extends Model
{
    protected $table='chaild_categories';

    public function parentCategory(){
        return $this->belongsTo(ParentCategory::class,'parent_id');
    }
}
