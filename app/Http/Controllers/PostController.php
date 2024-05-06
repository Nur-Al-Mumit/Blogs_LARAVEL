<?php

namespace App\Http\Controllers;

use App\Models\Posts\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function postIndex()
    {
        return view('frontend.post.post')->with(['user' => Auth::user()]);
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

        // return $posts;
        return view('frontend.index')->with(['posts' => $posts, 'user' => Auth::user()]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        //
    }
}
