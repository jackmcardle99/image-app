<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index(){
        $posts = Post::all();
        $comments = Comment::all();
        return view('admin.index',compact('posts','comments'));
    }

}
