<?php

namespace App\Http\Controllers;

use App\Models\Post;

use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PostController extends Controller
{

    // CREATE
    public function index()
    {
        return view('post.index', [
            'posts' => Post::latest()->paginate()
        ]);
    }


    public function create(Post $post)
    {
        return view('post.create', compact('post'));
    }


        // POST - CREATE POST

        public function store(Request $request, Post $post)
        {
            $request->validate([
                'title' =>'required',
                'body' =>'required',

            ]);
            $post = $request->user()->posts()->create([
                'title' => $title = $request->title,
            'slug'  => Str::slug($title),
            'body'  => $request->body,
            ]);

            return redirect()->route('post.edit', $post);
        }


    // EDIT

    public function edit(Post $post)
    {
        return view('post.edit', compact('post'));
    }

// UPDATE
public function update(Request $request, Post $post)
{
    $request->validate([
        'title' =>'required',
        'slug' => Str::slug($post->title),
        'body' =>'required',

    ]);
    $post->update([
        'title' => $title = $request->title,
        'slug'  => Str::slug($title),
        'body'  => $request->body,
    ]);

    return redirect()->route('post.edit', $post);
}




    // DELETE
    public function destroy(Post $post)

    {
        $post->delete();
        return back();
    }
}
