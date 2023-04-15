<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::orderBy('topic','asc')->with('posts')->get(); // with('posts') is eager loading

        $count = Cache::remember(
            'count.categories.' . $categories,
            now()->addSeconds(120),
            function () use ($categories){
                return Category::with('posts')->count();
            }
        );

        return view('categories.index', compact('categories','count'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('categories.create');
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


        $category = Auth::user()->categories()->create([
            'topic'=>$request->topic,
        ]);



        return to_route('categories.index', $category)->with('success','Category created successfully.');
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
    public function destroy(string $id)
    {
        //
    }
}
