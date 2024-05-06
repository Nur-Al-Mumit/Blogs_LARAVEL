<?php

namespace App\Http\Controllers;

use App\Models\Posts\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{

    public function postIndex()
    {
        return view('frontend.post.post');
    }

    public function storePost(Request $request)
    {

        $post = new Post();
        $post->title = $request->title;
        $post->content = $request->content;
        $post->user_id = $request->user_id;
        $post->save();

        // return $request;
        return redirect(route('post.list'));
    }

    public function getPosts()
    {
        $posts = Post::whereUser_id(Auth::id())->get();

        return view('frontend.index')->with(['posts' => $posts]);
    }

    public function editPost($id)
    {
        $post = Post::whereId($id)->get();
        return view('frontend.post.post_edit')->with(['post' => $post]);
    }

    public function updatePost(Request $request)
    {
        $post = Post::whereId($request->id)->first();
        $post->title = $request->title;
        $post->content = $request->content;
        $post->save();

        return redirect(route('post.list'));
    }

    public function deletePost($id)
    {
        // return $id;
        // Post::whereId($id)->delete();
        return redirect(route('post.list'));
    }
}
