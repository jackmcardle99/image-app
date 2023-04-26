<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable =[
        'topic'
    ];

    public function posts()
    {
        return $this->belongsToMany(Post::class);
    }

    public static function boot(){
        parent::boot();

        static::deleting(function ($category){
            $category->posts()->detach();
        });
    }
}
