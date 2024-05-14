<?php

namespace App\Http\Controllers;

use App\Models\Posts\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function index()
    {
        $posts = Post::all();
        return view('frontend.index')->with(['posts' => $posts,]);
    }
}
