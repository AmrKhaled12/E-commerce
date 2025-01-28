<?php
namespace App\Classes;

use App\Models\ParentCategory;

class showCategory {

    public static function DashboardCategories(){
        return ParentCategory::with('chaild')->simplePaginate(6);
    }



}