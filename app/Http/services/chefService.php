<?php

namespace App\Http\services;

use App\Models\Chef;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class chefService{

    public function select($paginate = null){

        if ($paginate) {
            return Chef::latest()->paginate($paginate);
        }
        return Chef::latest()->get();
    }

    public function selectBy($column, $value){
        return Chef::where($column, $value)->firstOrFail();
    }

    public function create($data){

        return Chef::create($data);
    }

    public function update($data, $uuid){

        return Chef::where('uuid', $uuid)->update($data);
    }

    public function detail($data, $uuid){
        
    }
}

