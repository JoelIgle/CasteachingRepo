<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    use HasFactory;

        protected  $guarded = [];
        protected $dates = ['published_at'];
//        protected $casts = [
//            'published_at' => 'datetime',
//        ];
//    protected $fillable = [
//        'title',
//        'description',
//        'url',
//        'published_at',
//        'previous',
//        'next',
//        'series_id',
//    ];
}


