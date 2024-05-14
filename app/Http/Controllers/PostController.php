<?php

namespace App\Http\Controllers;

use App\Models\Posts\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{

    public function postIndex()
    {
        return view('frontend.post.post');
    }

    public function storePost(Request $request)
    {
        $validateData = $request->validate([
            'title'=> 'required|string|max:255',
            'content'=> 'required|string',
            'image'=> 'required|image',
        ]);

        $post = new Post();
        $post->title = $request->title;
        $post->content = $request->content;
        $post->user_id = $request->user_id;

        if ($request->hasFile('image')) {

            $image = $request->file('image');
            $fileName = now() . '.' . $image->getClientOriginalExtension();
            $directoryName = public_path("uploads/");

            if (!file_exists($directoryName)) {
                mkdir($directoryName);
            }

            $image->move($directoryName, $fileName);
            $post->image = $fileName;
        }

        $post->save();

        return redirect(route('index'));
    }

    public function viewPost($id)
    {
        $post = Post::whereId($id)
                      ->whereUserId(Auth::user()->id)
                      ->get();

        // return $post;
        return view('frontend.post.post_view')->with('post', $post);
    }

    public function editPost($id)
    {
        $post = Post::whereId($id)->get();
        return view('frontend.post.post_edit')->with(['post' => $post]);
    }

    public function updatePost(Request $request)
    {

        $validateData = $request->validate([
            'title'=> 'required|string|max:255',
            'content'=> 'required|string',
            'image'=> 'required|image',
        ]);

        $post = Post::whereId($request->id)->first();
        $post->title = $request->title;
        $post->content = $request->content;
        
        if ($request->hasFile('image')) {

            $image = $request->file('image');
            $fileName = now() . '.' . $image->getClientOriginalExtension();
            $directoryName = public_path("uploads/");

            if (!file_exists($directoryName)) {
                mkdir($directoryName);
            }

            $image->move($directoryName, $fileName);
            $post->image = $fileName;
        }
        $post->save();

        return redirect(route('index'));
    }

    public function deletePost($id)
    {
        // return $id;
        Post::whereId($id)->delete();
        return redirect(route('index'));
    }
}
