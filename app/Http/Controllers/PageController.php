<?php
// Nos traemos las rutas desde la web.php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PageController extends Controller
{
    public function home(){
        return view('home');

    }
    public function blog(){
        $posts = Post::get();

        return view('blog', ['posts' => $posts] );

    }
    public function post(Post $post)
    {

        return view('post', ['post' => $post]);
}


}
