<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use HasFactory;
    use SoftDeletes; //for trash feature

    protected $fillable =[
        'user_id',
        'title',
        'summary',
        'image_path',
        'is_published',
        'value',
        'comments',
        'views',
        'created_at',
        'updated_at'
    ];

    public function user(){ // for defining relationship in db
        return $this->belongsTo(User::class);
    }

    public function categories(){
        return $this->belongsToMany(Category::class);
    }

    public static function boot(){
        parent::boot();

        static::deleting(function ($post){
            $post->categories()->detach();
        });
    }
    //this code changes the url

//    public function getRouteKeyName(): string
//    {
//        return 'title';
//    }
}
