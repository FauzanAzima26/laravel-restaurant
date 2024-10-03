<?php

namespace App\Models\Gallery;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class image extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'file',
        'uuid',
        'slug',
    ]; 

    public static function booted(){
        static::creating(function ($model) {
            $model->uuid = Str::uuid();
        });
    }
}
