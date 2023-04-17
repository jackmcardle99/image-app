<?php

namespace App\Models;

use Coderflex\Laravisit\Concerns\HasVisits;
use Coderflex\Laravisit\Concerns\CanVisit;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;
use Laravel\Scout\Searchable;


class Post extends Model implements CanVisit
{
    use HasFactory;
    use SoftDeletes; //for trash feature
    use HasVisits; // for views
    use Searchable; //for meillisearch
    use Sluggable;


    protected $fillable =[
        'user_id',
        'title',
        'summary',
        'image_filename',
        'is_published',
        'value',
        'created_at',
        'updated_at'
    ];

    public function shouldBeSearchable():bool{
        return $this->is_published === 1;
    }

    public function searchableAs():string{
        return 'posts';
    }

    public function toSearchableArray(){
        return [
            'title' => $this->title,
            'summary' => $this->summary,
        ];
    }

    public function user(){ // for defining relationship in db
        return $this->belongsTo(User::class);
    }

    public function categories(){
        return $this->belongsToMany(Category::class);
    }

    public function comments(){
        return $this->hasMany(Comment::class);
    }

    public static function boot(){
        parent::boot();

        static::deleting(function ($post){
            $post->categories()->detach();
//            $post->comments()->detach();
        });
    }
    //this code changes the url


      public function sluggable(): array
      {
          // TODO: Implement sluggable() method.
          return [
              'slug' => ['title'
              ]
          ];
      }

        public function getRouteKeyName(): string
        {
            return 'slug';
        }


}
