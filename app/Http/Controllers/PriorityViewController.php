<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Barryvdh\Debugbar\Facades\Debugbar;
use Illuminate\Support\Facades\Redis;

class PriorityViewController extends Controller
{
    public function __invoke(){
        DebugBar::info('Showing the message!');
        $total_visits_to_home_page = Redis::incr('visits_to_home_page');
        $posts = Post::where([
            ['value','>',200],['is_published',true]
        ])
        ->limit(4)
        ->with('user') // eager loading
        ->withTotalVisitCount()
        ->get();

        return view('welcome',compact('posts', 'total_visits_to_home_page'));
    }
}
