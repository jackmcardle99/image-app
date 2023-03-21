<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable =[
        'title',
        'summary',
        'image_path',
        'is_published',
        'value',
        'likes',
        'favourites',
        'created_at',
        'updated_at'
    ];
}
