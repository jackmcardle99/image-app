<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $users = User::All();
        $results = [];

        if($query = $request->get('query')){
            if ($userID = $request->get('user_id')){
                $results = Post::search($query)->where('is_published',true)->where('user_id', $userID)->paginate(5);
            }
            else{
                $results = Post::search($query)
                    ->where('is_published',true)
                    ->paginate(5);
            }
        }
        return view('search.output', compact('results','users'));
    }
}
