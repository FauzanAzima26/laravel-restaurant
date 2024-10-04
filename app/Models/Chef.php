<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Chef extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'position',
        'description',
        'insta_link',
        'linked_link',
        'image'
    ];

    public static function booted(){
        static::creating(function($chef){
            $chef->uuid = Str::uuid();
        });
    }
}
