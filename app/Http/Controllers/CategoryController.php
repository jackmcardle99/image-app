<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Gate;

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
        if(Gate::allows('is_admin')){
            return view('categories.create');
        }
        else {
            return to_route('categories.index')->withErrors('Cannot create category - Not Admin');
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'topic' => 'required|unique:categories|max:30',
        ]);
        $input = $request->all();
        Category::create($input);
        return to_route('categories.index')->with('success','Category created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        return view('categories.edit')->with('category',$category);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        $request->validate([
            'topic' => 'required|unique:categories|max:30' . $category->id

        ]);
        $category->update([
            'topic'=>$request->topic,
        ]);

        $category->update();

        if(Gate::allows('is_admin')){
            return to_route('categories.index', $category)->with('success','Category updated successfully.');
        }
        else{
            return to_route('categories.index')->withErrors('Category not updated - Not Admin');
        }

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        if (Gate::allows('is_admin')) {
            $category->delete();
            return to_route('categories.index')->with('success', 'Category deleted');
        }
        else {
            return to_route('categories.index')->withErrors('Category not deleted - Not Admin');
        }
    }
}
