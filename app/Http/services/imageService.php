<?php

namespace App\Http\services;

use Illuminate\Support\Str;
use App\Models\Gallery\image;
use Illuminate\Support\Facades\Storage;

class imageService{

    public function select($paginate = null){

        if($paginate){
            return image::latest()->paginate($paginate);
        }
        return image::latest()->get();
    }

    public function selectBy($column, $value){
        return image::where($column, $value)->firstOrFail();
    }

    public function create($data){

        $data['slug'] = Str::slug($data['name']);

        return image::create($data);
    }

    public function update($data, $uuid){

        $data['slug'] = Str::slug($data['name']);

        return image::where('uuid', $uuid)->update($data);
    }
}

