<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable =[
        'user_id',
        'title',
        'summary',
        'image_path',
        'is_published',
        'value',
        'likes',
        'comments',
        'views',
        'created_at',
        'updated_at'
    ];

    //this code changes the url

//    public function getRouteKeyName(): string
//    {
//        return 'title';
//    }
}
