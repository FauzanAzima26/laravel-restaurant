<?php

namespace App\Http\services;

use Illuminate\Support\Facades\Storage;

class fileService{
    public function upload($file, $path){

        $uploaded = $file;
        $fileName = $uploaded->hashName();

        return $uploaded->storeAs($path, $fileName, 'public');
    }

    public function delete($file){

        $deleted = Storage::disk('public')->delete($file);
        return $deleted;
    }
}

