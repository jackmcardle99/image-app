<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PostsVisitedSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = User::all();
        $posts = Post::inRandomOrder()
//            ->limit(rand(6,15))
            ->get();

        foreach($posts as $post){
            $post->visit()
                ->customInterval(now()->addSeconds(30))
                ->withData([
                    'ip' => '192.168.0.2','user_id'=> $users->random(1)->pluck('id'),'region'=>'UK'
                ])
                ->attach([
                    'visitable_type'=>'App\Models\Post',
                    'visitable_id'=> $post->id
            ]);
        }
    }
}
