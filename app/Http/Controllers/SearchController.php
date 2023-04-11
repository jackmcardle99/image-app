<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Collection;

class SearchController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $results = [];
        if($query = $request->get('query')){
            $results = Post::search($query)->paginate(5);
        }
        return view('search.output', compact('results'));
    }

//    public function paginate($items, $perPage = 5, $page = null, $options = [])
//    {
//        $page = $page ?: (Paginator::resolveCurrentPage() ?: 1);
//        $items = $items instanceof Collection ? $items : Collection::make($items);
//        return new LengthAwarePaginator($items->forPage($page, $perPage), $items->count(), $perPage, $page, $options);
//    }
}
