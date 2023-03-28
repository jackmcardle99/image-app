<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PriorityViewController extends Controller
{
    public function __invoke(){
        $posts = Post::where([
            ['likes','=',5],['is_published',true]
        ])
        ->limit(4)
        ->latest('updated_at')
        ->get();

        return view('welcome',compact('posts'));
    }
}
