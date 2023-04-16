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
//        $data = DB::table($table)->get();
//
//        $tableHtml = '<table>'; // Start table element
//
//        // Add table header row
//        $tableHtml .= '<thead><tr>';
//        foreach ($data as $key => $value) {
//            $tableHtml .= '<th>' . $key . '</th>';
//        }
//        $tableHtml .= '</tr></thead>';
//
//        // Add table body rows
//        $tableHtml .= '<tbody>';
//        foreach ($data as $row) {
//            $tableHtml .= '<tr>';
//            foreach ($row as $value) {
//                $tableHtml .= '<td>' . $value . '</td>';
//            }
//            $tableHtml .= '</tr>';
//        }
//        $tableHtml .= '</tbody>';
//
//        $tableHtml .= '</table>'; // End table element
//
//        return response()->json(['html' => $tableHtml]);
    }




//    public function update($table)
//    {
//
//        $data = DB::table($table)->get();
//        return response()->json($data);
////        $option = $request->input('option');
////
////        // Generate the HTML content for each table
////        $postsTable = '<table id="postsTable">...</table>';
////        $commentsTable = '<table id="commentsTable">...</table>';
////        $usersTable = '<table id="usersTable">...</table>';
////
////        // Return the HTML content for the selected table
////        return match ($option) {
////            'posts' => response()->json($postsTable),
////            'comments' => response()->json($commentsTable),
////            'users' => response()->json($usersTable),
////            default => response()->json(''),
////        };
//    }

}
