<?php

namespace App\Models\Gallery;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class image extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'desc',
        'file',
        'uuid',
        'slug',
    ]; 
}
