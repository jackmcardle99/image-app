<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;

class DraftController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $userID = Auth::id();
        $posts = Post::where('user_id',$userID) // only show unpublished posts from user
                ->where('is_published',false)
                ->with('user') // eager loading
                ->withTotalVisitCount()
                ->paginate(6);

        $count = Cache::remember(
            'count.posts.' . $userID,
            now()->addSeconds(60),
            function () use ($posts){
                return Post::where('is_published',false)
                    ->where('user_id', Auth::id())
                    ->count();
            }
        );
        return view('posts.drafts', compact('posts','count'));
    }
}
