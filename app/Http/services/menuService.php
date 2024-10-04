<?php

namespace App\Http\services;

use Illuminate\Support\Str;
use App\Models\menu;
use Illuminate\Support\Facades\Storage;

class menuService{

    public function select($paginate = null){

        if ($paginate) {
            return menu::with('categories:id,title')->latest()->select('id', 'uuid', 'name', 'categories_id', 'price', 'status', 'image')->paginate($paginate);
        }
        return menu::latest()->get();
    }

    public function selectBy($column, $value){
        return menu::with('categories:id,title')->where($column, $value)->firstOrFail();
    }

    public function create($data){

        $data['slug'] = Str::slug($data['name']);

        return menu::create($data);
    }

    public function update($data, $uuid){

        $data['slug'] = Str::slug($data['name']);

        return menu::where('uuid', $uuid)->update($data);
    }
}

