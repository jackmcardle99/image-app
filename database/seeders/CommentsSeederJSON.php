<?php

namespace Database\Seeders;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;

class CommentsSeederJSON extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Comment::truncate();

        $json = File::get('database/data/comments.json');
        $comment = json_decode($json);

        foreach ($comment as $key => $value) {
            Comment::create([
                "id" => $value->id,
                "post_id" => $value->post_id,
                "user_id" => $value->user_id,
                "body" => $value->body,
                "created_at" => $value->created_at,
                "updated_at" => $value->updated_at
            ]);
        }
    }
}
