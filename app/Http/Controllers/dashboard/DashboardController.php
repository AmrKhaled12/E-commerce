<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use App\Models\ParentCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Query\JoinClause;
class DashboardController extends Controller
{
    public function GetFillterationCategories(){
        $request=request();
        $name=$request->query('name');
        $user=Auth::user();
        if($name){
            $category= ParentCategory::whereHas('chaild', function ($query) use($name) {
                $query->where('name', 'LIKE', "%{$name}%");
            })->get();
            
            return view('dashboard.user')->with(['user'=>$user,'categories'=>$category]);
        }
        $category=ParentCategory::with('chaild')->paginate(6);
  
        return view('dashboard.user')->with(['user'=>$user,'categories'=>$category]);
    }
}
