<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Services\Categories\ShowCategory;
use App\Models\ParentCategory;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function showDashboard(ShowCategory $category)
    {
        $categories = $category->DashboardCategories();
        return view('dashboard.user')->with(['categories' => $categories]);
    }

    public function GetFillterationCategories()
    {
        $request = request();
        $name = $request->query('name');
        if ($name) {
            $categories = ParentCategory::whereHas('chaild', function ($query) use ($name) {
                $query->where('name', 'LIKE', "%{$name}%");
            })->simplePaginate(6);

            return view('dashboard.user')->with(['categories' => $categories]);
        }
        return redirect()->back();
    }


    public function ShowAdForm($id)
    {
        $categoryName = ParentCategory::select('name')->where('id', $id)->get()->toArray();
        $categoryName = $categoryName[0]['name'];

        $chaildCategories = DB::table('chaild_categories')
            ->select(['id', 'name'])
            ->where('parent_id', '=', $id)
            ->get();

        // $chaildCategories= DB::select("
        // SELECT `p`.`name` AS parent_name, `ch`.`name` AS child_name, `ch`.`id` AS child_id
        // FROM `parent_categories` AS `p`, `chaild_categories` AS `ch`
        // WHERE `ch`.`parent_id` = 2 AND `p`.`id` = $id
        // ");

        if (!$chaildCategories) {
            return abort(404);
        }
        return view('dashboard.ad-form')->with(['chaildCategories' => $chaildCategories, 'categoryName' => $categoryName]);
    }
}
