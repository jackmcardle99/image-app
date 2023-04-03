<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //show all posts
        $userID = Auth::id();
        $posts = Post::where('user_id', $userID)
        ->where('is_published',true)
        ->latest('updated_at')
        ->paginate(5);

        return view('posts.index')->with('posts',$posts);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        // showing each post
//        $post = Post::where('id',$post)
//        ->where('user_id',Auth::id())
//        ->firstOrFail();

//        if($post->user_id != Auth::id()){
//            return abort(403);
//        }
        if(!$post->user->is(Auth::user())){  //if the post doesn't belong to currently authenticated user, then forbidden
            return abort(403);
        }

        return view('posts.show')->with('post',$post);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        if(!$post->user->is(Auth::user())){
            return abort(403);
        }

        $post->delete();

        return to_route('posts.index');
    }
}
