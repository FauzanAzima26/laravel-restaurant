<?php

namespace App\Http\services;

use App\Models\Video;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class VideoService{

    public function select($paginate = null){

        if($paginate){
            return Video::latest()->paginate($paginate);
        }
        return Video::latest()->get();
    }

    public function selectBy($column, $value){
        return Video::where($column, $value)->firstOrFail();
    }

    public function create($data){

        $data['slug'] = Str::slug($data['title']);

        return Video::create($data);
    }

    public function update($data, $uuid){

        $data['slug'] = Str::slug($data['title']);

        return Video::where('uuid', $uuid)->update($data);
    }
}

