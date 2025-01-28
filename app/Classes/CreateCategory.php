<?php

namespace App\Classes;

use Illuminate\Support\Facades\DB;
use App\Models\ParentCategory;

class CreateCategory
{
    protected $name;
    protected $image;
    protected $chaildCategories;

    public function __construct(string $name,string $image, string $chaildCategories)
    {
        $this->name = $name;
        $this->image = $image;
        $this->chaildCategories = $chaildCategories;
    }

    private function getParentId($name)
    {
        $id = ParentCategory::select('id')->where('name', '=', $name)->get(); //name is unique
        return $id[0]->id;
    }

    public function Create_category()
    {

        $path = $this->storeCategoryImage($this->image);
        $this->storeParentCategory($path, $this->name);
        $parentId = $this->getParentId($this->name);
        $chaildren = $this->getChaildCategory($this->chaildCategories);
        $this->storeChaildCategory($chaildren, $parentId);
    }

    public function storeParentCategory($path, $name)
    {

        DB::table('parent_categories')->insert([
            'name' => $name,
            'image' => $path,
        ]);
    }

    public function getChaildCategory(string $chaildren): array
    {
        return explode(',', $chaildren);
    }

    private function storeCategoryImage($image)
    {
        return $image->store('category', [
            'disk' => 'ProductImages'
        ]);
        //return path for category Image
    }

    public function storeChaildCategory($chaildren, $parentId)
    {
        foreach ($chaildren as $chaild) {
            DB::table('chaild_categories')->insert([
                'name' => $chaild,
                'parent_id' => $parentId,
            ]);
        }
    }
}
