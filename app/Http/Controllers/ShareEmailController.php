<?php

namespace App\Http\Controllers;

use App\Mail\SendPostMail;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class ShareEmailController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Post $post, Request $request)
    {
        $user = User::findOrFail($request->user);
        Mail::to($user->email)
            ->cc(Auth::user()->email)
            ->send(new SendPostMail($post,$user));
        return to_route('posts.index',$post)->with('success','Post successfully shared via email');

        //return new sendPostMail($post,$request->user);
    }
}
