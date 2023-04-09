<?php

namespace App\Models;

use Coderflex\Laravisit\Concerns\HasVisits;
use Coderflex\Laravisit\Concerns\CanVisit;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Usamamuneerchaudhary\Commentify\Traits\Commentable;

class Post extends Model implements CanVisit
{
    use HasFactory;
    use SoftDeletes; //for trash feature
    use Commentable; //for comments feature
    use HasVisits; // for views


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
