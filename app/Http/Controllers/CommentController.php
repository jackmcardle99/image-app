<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Post $post)
    {
        $comments = Comment::where('post_id',$post->id)->orderBy('created_at','desc')
            ->with('post')
            ->paginate(5);
        return view('comments.index',compact('comments','post'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
      return view('comments.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //dump($request->post_id);
        $request->validate([
            'body'=>'required|max:255',
        ]);

        $input = $request->all();
        //$input['post_id'] = 1;
        $input['user_id'] = auth()->user()->id;


        Comment::create($input);

        return back()->with('success','Comment posted successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
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
    public function destroy(Comment $comment)
    {
        // only admin can destroy comments
        if(!Gate::allows('is_admin')){
            abort(403);
        }
        $comment->delete();
    }
}
