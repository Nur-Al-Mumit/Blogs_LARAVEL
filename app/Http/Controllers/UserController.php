<?php

namespace App\Http\Controllers;

use App\Models\Posts\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class UserController extends Controller
{
    public function index()
    {
        // return Auth::user();

        if (!Auth::check()) {
            return redirect(route('login'));
        } else {
            $posts = Post::whereUser_id(Auth::id())->get();
            return view('frontend.index')->with(['user' => Auth::user(), 'posts' => $posts,]);
        }
    }
}
