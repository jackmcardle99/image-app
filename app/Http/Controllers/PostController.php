<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Gate;
use Intervention\Image\Facades\Image;

class PostController extends Controller
{
        /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // If the admin is viewing index, show all posts, published or not,
        // belonging to all users
        if(Gate::allows('is_admin')){
            $posts = Post::with('user')->withTotalVisitCount()->paginate(6); // eager loading
            $count = Cache::remember(
                'count.posts.',
                now()->addSeconds(60),
                function () use ($posts){
                    return Post::where('is_published',true)
                        ->count();
                }
            );
            return view('posts.index',['posts'=>$posts, 'count' =>$count]);
        }

        //show all posts belonging to user
        $userID = Auth::id();
        $posts = Post::where('user_id', $userID)
            ->where('is_published',true)
            ->with('user') // eager loading
            ->latest('updated_at')
            ->withTotalVisitCount()
            ->paginate(6);
        $count = Cache::remember(
            'count.posts.' . $userID,
            now()->addSeconds(60),
            function () use ($posts){
                return Post::where('user_id',Auth::id())
                    ->where('is_published',true)
                    ->count();
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
            'value' => 'required|gt:0'
        ]);

        $post = Auth::user()->posts()->create([
            'title'=>$request->title,
            'slug'=>SlugService::createSlug(Post::class, 'slug', $request->title),
            'summary'=>$request->summary,
            'image_filename'=>$this->storeImage($request),
            'is_published'=>$request->is_published === 'on' ?  '1' : '0',
            'value'=>$request->value,
        ]);

        // get the selected categories from the request
        $selectedCategories = $request->input('select_category', []);
        // attach the selected categories to the newly created post
        $post->categories()->attach($selectedCategories);

        return to_route('posts.index', $post)->with('success','Post created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        // no gate here, all users can view post, except guest, but they can't view this because they are not auth
        $comments = $post->comments()->with('user')->latest()->paginate(5); // eager loading
        $post->visit()->customInterval(now()->addSeconds(30))->withIP()->withUser(); // for post visits
        return view('posts.show',compact('post','comments'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        if(!$post->user->is(Auth::user()) && !Gate::allows('is_admin')){
            return abort(403);
        }
        $categories = Category::all();
        return view('posts.edit', compact('post','categories'));
    }

    public function update(Request $request, Post $post){
        $request->validate([
            'title' => 'required|max:255|unique:posts,title,' . $post->id,
            'slug'=>SlugService::createSlug(Post::class, 'slug', $request->title),
            'summary' => 'required',
            'image_path' => 'nullable|sometimes|image',
            'value' => 'required|gt:0'
        ]);
        $post->update([
            'title'=>$request->title,
            'summary'=>$request->summary,
            'value'=>$request->value
        ]);

        if(!$request->select_category == null){
            $selectedCategories = $request->input('select_category', []);
            // Detach all existing categories to remove the associations
            $post->categories()->detach();
            // Attach the selected categories
            $post->categories()->attach($selectedCategories);
        }


        if ($request->has('image_filename')){
            $post->image_filename = $this->storeImage($request);
        }
        if ($request->has('is_published')){
            $post->is_published = 1;
        } else{
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
        // this code gives forbidden 403 error to anyone trying to access post who isn't Auth or admin
        if(!$post->user->is(Auth::user()) && !Gate::allows('is_admin')){
            return abort(403);
        }
        //this code allows admin to delete post, returning to admin view
        if(Gate::allows('is_admin')){
            $post->delete();
            return to_route('admin.index')->with('success', 'Post deleted successfully');
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
