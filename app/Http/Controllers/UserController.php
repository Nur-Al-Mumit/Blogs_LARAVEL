<?php

namespace App\Http\Controllers;

use App\Models\Posts\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class UserController extends Controller
{
    public function index()
    {
        // $posts = Post::whereUser_id(Auth::id())->get();
        // return view('frontend.index')->with(['posts' => $posts,]);
        return redirect(route("post.list"));
    }
}
