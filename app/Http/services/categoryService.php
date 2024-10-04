<?php

namespace App\Http\services;

use App\Models\Category;
use Illuminate\Support\Facades\Storage;

class categoryService{
    public function select($colomn = null, $value = null){
        if($colomn){
            return Category::where($colomn, $value)->select('id', 'uuid', 'title', 'slug')->firstOrFail();
        }
        return Category::latest()->get(['id', 'uuid', 'title', 'slug']);
    }
}
