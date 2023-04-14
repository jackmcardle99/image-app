<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class TrashedPostController extends Controller
{
    public function index(){
        $userID = Auth::id();
        $posts = Post::where([
            ['user_id', $userID]
        ])
        ->latest('updated_at')
        ->onlyTrashed()
        ->withTotalVisitCount()
        ->paginate(5);
        return view('trashed.index')->with('posts',$posts);
    }

    public function show(Post $post){
        if(!$post->user->is(Auth::user())){
            return abort(403);
        }
        return view('trashed.show')->with('post', $post);
    }

    public function update(Post $post){
        if(!$post->user->is(Auth::user())){
            return abort(403);
        }
        $post->restore();
        return to_route('trashed.index')->with('success','Post restored successfully');
    }

    public function destroy(Post $post) {
        if(!$post->user->is(Auth::user())){
            return abort(403);
        }

        $destinationPath = 'public/uploads/';
        $image = $destinationPath.$post->image_filename;
        $thumbnail = $destinationPath.'thumbnails/'.$post->image_filename;

        if(Storage::exists($image)){
            Storage::delete($image);
        }
        if(Storage::exists($thumbnail)){
            Storage::delete($thumbnail);
        }
        $post->categories()->detach();
        $post->comments()->delete();
        $post->forceDelete();
        return to_route('posts.index')->with('success','Permanently deleted successfully');
    }


}
