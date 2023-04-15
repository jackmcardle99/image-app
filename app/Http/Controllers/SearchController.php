<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Collection;
use Meilisearch\Http\Client;

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
