<?php

namespace App\Http\Controllers;

use App\Models\Post;

use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        return view('post.index', [
            'posts' => Post::latest()->paginate()
        ]);
    }
    public function create()
    {
        return view('post.create', []);
    }

    public function edit(Post $post)
    {
        return view('post.edit', [
            'post' => $post
        ]);
    }




    // DELETE
    public function destroy(Post $post)

    {
        $post->delete();
        return back();
    }
}
