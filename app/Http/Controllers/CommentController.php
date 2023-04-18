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
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if(!Gate::allows('is_admin') && !Gate::allows('is_user')){
            abort(403)->with('error', "You're not a registered user.");
        }
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
     * Remove the specified resource from storage.
     */
    public function destroy($comment)
    {
        // only admin can destroy comments
        if(!Gate::allows('is_admin')){
            abort(403);
        }
        Comment::destroy($comment);
        return to_route('admin.index')->with('success', 'Comment deleted successfully');
    }
}
