<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;

class PostSeederJSON extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Post::truncate();

        $json = File::get('database/data/posts.json');
        $post = json_decode($json);

        foreach ($post as $key => $value) {
            Post::create([
                "user_id"=>$value->user_id,
                "title"=>$value->title,
                "summary"=>$value->summary,
                "image_path"=>$value->image_path,
                "is_published"=>$value->is_published,
                "value"=>$value->value,
                "likes"=>$value->likes,
                "comments"=>$value->comments,
                "views"=>$value->views,
                "created_at"=>$value->created_at,
                "updated_at"=>$value->updated_at
            ]);
        }
    }
}
