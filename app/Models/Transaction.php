<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Transaction extends Model
{
    use HasFactory;

    protected $guarded = [
        'uuid',
        'type',
        'code',
        'name',
        'email',
        'phone',
        'date',
        'time',
        'people',
        'file',
        'amount',
        'status',
        'message',
    ];

    public static function boot()
    {
        Transaction::creating(function ($model) {
            $model->uuid = Str::uuid();
        });
    }
}
