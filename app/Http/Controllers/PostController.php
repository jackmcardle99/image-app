<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;

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
        ->withTotalVisitCount()
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
            'title' => 'required|unique:posts|max:30',
            'summary' => 'required|max:250',
            'image_filename' => 'image|required',
            'value' => 'required'
        ]);


        $post = Auth::user()->posts()->create([
            'title'=>$request->title,
            'summary'=>$request->summary,
            'image_filename'=>$this->storeImage($request),
            'is_published'=>$request->is_published === 'on' ?  '1' : '0',
            'value'=>$request->value,
        ]);

//        if ($request->has('image_filename')){
//            $post->image_filename = $this->storeImage($request);
//        }
//        if ($request->has('is_published')){
//            $post->is_published = 1;
//        }
//        else{
//            $post->is_published = 0;
//        }

        return to_route('posts.index', $post)->with('success','Post created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        if(!$post->user->is(Auth::user())){  //if the post doesn't belong to currently authenticated user, then forbidden
            return abort(403);
        }
        $comments = $post->comments()->latest('created_at')->paginate(5);
        $post->visit()->customInterval(now()->addSeconds(30))->withIP()->withUser(); // for post visits
        return view('posts.show', compact('post','comments'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        return view('posts.edit')->with('post',$post);
    }

    public function update(Request $request, Post $post){
        $request->validate([
            'title' => 'required|max:255|unique:posts,title,' . $post->id,
            'summary' => 'required',
            'image_path' => 'image',
            'value' => 'required'
        ]);
        $post->update([
            'title'=>$request->title,
            'summary'=>$request->summary,
            'value'=>$request->value
        ]);

        if ($request->has('image_filename')){
            $post->image_filename = $this->storeImage($request);
        }
        if ($request->has('is_published')){
            $post->is_published = 1;
        }
        else{
            $post->is_published = 0;
        }

        $post->update();
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
        if ($request->hasFile('image_filename'))
        {
            $dbName = $request->file('image_filename');
            //Save Uploaded File
            $image = Image::make($dbName);
            $destinationPath = storage_path('app/public/uploads/');
            $image->save($destinationPath.time().$dbName->getClientOriginalName());
            /**
             * Generate Thumbnail Image to thumbnail Storage Folder
             */
            $destinationPathThumbnail = storage_path('app/public/uploads/thumbnails/');
            $image->resize(1000, 750, function ($constraint) {
                $constraint->aspectRatio();
            });
            $image->save($destinationPathThumbnail.time().$dbName->getClientOriginalName());
            return time().$dbName->getClientOriginalName();
        }
    }



}
