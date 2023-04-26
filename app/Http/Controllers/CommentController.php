<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class CommentController extends Controller
{
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if(!Gate::allows('is_admin') && !Gate::allows('is_user')){
            abort(403)->with('error', "You're not a registered user.");
        }
        $request->validate([
            'body'=>'required|max:255',
        ]);
        $input = $request->all();
        $input['user_id'] = auth()->user()->id;
        Comment::create($input);
        return back()->with('success','Comment posted successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Comment $comment)
    {
        if(!Gate::allows('is_admin')){
            abort(403);
        }
        $comment->delete();
        return to_route('admin.index')->with('success', 'Comment deleted successfully');
    }
}
