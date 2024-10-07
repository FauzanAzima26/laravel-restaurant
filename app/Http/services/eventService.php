<?php

namespace App\Http\services;

use App\Models\Chef;
use App\Models\Event;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class eventService{

    public function select($paginate = null){

        if ($paginate) {
            return Event::latest()->paginate($paginate);
        }
        return Event::latest()->get();
    }

    public function selectBy($column, $value){
        return Event::where($column, $value)->firstOrFail();
    }

    public function create($data){

        return Event::create($data);
    }

    public function update($data, $uuid){

        return Event::where('uuid', $uuid)->update($data);
    }
}

