<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function index(){
        $posts = Post::all();
        $comments = Comment::all();
        return view('admin.index',compact('posts','comments'));
    }

//    public function show(Request $request){
//        return view('admin.show');
//    }

//

    public function update($table)
    {
    }

}
