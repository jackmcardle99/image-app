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
        ->paginate(6);

        return view('posts.index')->with('posts',$posts);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|unique:posts|max:255',
            'summary' => 'required',
            //'image_path' => 'image',  // NEED TO ADD MORE VALIDATION HERE F
            'value' => 'required'
        ]);

        Auth::user()->posts()->create([
            'title'=>$request->title,
            'summary'=>$request->summary,
            'image_path'=>$request->image_path,
            'is_published'=>1,
            'value'=>$request->value,
            'comments'=>0,
            'views'=>0
        ]);
        return to_route('posts.index')->with('success','Post created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        if(!$post->user->is(Auth::user())){  //if the post doesn't belong to currently authenticated user, then forbidden
            return abort(403);
        }
        return view('posts.show')->with('post',$post);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        return view('posts.edit')->with('post',$post);
    }

    /**
     * Update the specified resource in storage.
     */
//    public function update(Request $request)
//    {
////        if(!$post->user->is(Auth::user())){
////            return abort(403);
////        }
//        $request->validate([
//            'title' => 'required|unique:posts|max:255',
//            'body' => 'required',
//            'image_path' => 'required',  // NEED TO ADD MORE VALIDATION HERE F
//            'value' => 'required'
//        ]);
//
//        $post->title = $request->input('title');
//        $post->body = $request->input('body');
//        if ($request->has('image_path'))
//        {
//            $post->image_path = $this->storeImage($request);
//        }
//        $post->time_to_read = $request->input('time_to_read');
//        if ($request->has('is_published'))
//        {
//            $post->is_published = 1;
//        }
//        else{
//            $post->is_published = 0;
//        }
//        $post->priority = $request->input('priority');
//        $post->update();
//
//        return to_route('posts.show');
//    }

    public function update(Request $request, Post $post){
        $request->validate([
            'title' => 'required|max:255|unique:posts,title,' . $post->id,
            'summary' => 'required',
           // 'image_path' => 'image',
            'value' => 'required'
        ]);
        $post->update([
            'title'=>$request->title,
            'summary'=>$request->summary
        ]);

//        if ($request->has('image_path'))
//        {
//            $post->image_path = $this->storeImage($request);
//        }
//        if ($request->has('is_published'))
//        {
//            $post->is_published = 1;
//        }
//        else{
//            $post->is_published = 0;
//        }
//        //$post->priority = $request->input('priority');
//        $post->update();
        return to_route('posts.show', $post)->with('success','Post updated successfully.');
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

        return to_route('posts.index')->with('success', 'Post deleted successfully');
    }

    /*
     * This method is for selecting an image from localdisk, uploading to site
     * */
    private function storeImage(Request $request)
    {
        if ($request->hasFile('image_path'))
        {
            $originalFileName = $request->file('image_path')->getClientOriginalName();
            $fileName = pathinfo($originalFileName, PATHINFO_FILENAME);
            $extension = $request->file('image_path')->getClientOriginalExtension();
            $requester = auth()->user()->email;
            $fileName = $requester.'_'.$fileName.'_'.time().'.'.$extension;

            //Upload File
            $request->file('image_path')->storeAs('public/uploads', $fileName);
            $url = asset('storage/uploads/'.$fileName);
            return $url;
        }
    }


}
