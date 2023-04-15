<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Comment;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;
use Intervention\Image\Facades\Image;

class PostController extends Controller
{

    public function __construct(){
//        $this->middleware('auth')->only(['create','edit','update','destroy']);
//        $this->middleware('can:is_admin')->only(['create','edit','update','destroy']);
    }

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

        $count = Cache::remember(
            'count.posts.' . $userID,
            now()->addSeconds(60),
            function () use ($posts){
                return Post::count();
            }
        );
        return view('posts.index',['posts'=>$posts, 'count' =>$count]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('posts.create')->with('categories',$categories);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|unique:posts|max:30',
            'summary' => 'required|max:250',
            'image_filename' => 'image|required|mimes:jpeg,png,jpg,gif',
            'value' => 'required'
        ]);

        $post = Auth::user()->posts()->create([
            'title'=>$request->title,
            'summary'=>$request->summary,
            'image_filename'=>$this->storeImage($request),
            'is_published'=>$request->is_published === 'on' ?  '1' : '0',
            'value'=>$request->value,
        ]);

//        DB::table('category_post')->insert([
//            ['category_id'=>1, 'post_id'=>],
//        ]);


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
        $users = User::all();
        $comments = $post->comments()->latest('created_at')->paginate(5);
        $post->visit()->customInterval(now()->addSeconds(30))->withIP()->withUser(); // for post visits
        return view('posts.show', compact('post','comments','users'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        if(!$post->user->is(Auth::user()) && !Gate::allows('is_admin')){
            return abort(403);
        }
        return view('posts.edit')->with('post',$post);
    }

    public function update(Request $request, Post $post){
        $request->validate([
            'title' => 'required|max:255|unique:posts,title,' . $post->id,
            'summary' => 'required',
            'image_path' => 'nullable|sometimes|image',
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

        if(Gate::allows('is_admin')){
            return to_route('admin.index', $post)->with('success','Post updated successfully.');
        }
        return to_route('posts.show', $post)->with('success','Post updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        //this code allows admin to delete post, despite not owning it
        if(Gate::allows('is_admin')){
            $post->delete();
            return to_route('admin.index')->with('success', 'Post deleted successfully');
        }

        // this code gives forbidden 403 error to anyone trying to access post who isnt Auth
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
