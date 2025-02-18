<?php
namespace App\Http\Services\Categories;

use App\Models\ParentCategory;

class ShowCategory {

    public function DashboardCategories(){
        return ParentCategory::with('chaild')->simplePaginate(6);
    }



}