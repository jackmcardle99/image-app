<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class DraftController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $posts = Post::where([
                    ['is_published',false]
                ])
                ->withTotalVisitCount()
                ->paginate(6);

        $count = Post::where('is_published',false)->count();

        return view('posts.drafts', compact('posts','count'));
    }
}
