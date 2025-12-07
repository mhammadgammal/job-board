<?php

namespace App\Http\Controllers;

use App\Models\Post;

class PostController extends Controller
{
    //

    public function index()
    {
        $data = Post::all();

        return view('post.index', ['posts' => $data]);
    }

    public function create()
    {
        Post::create([
            'title' => 'First Post',
            'body' => 'This is the body of the first post.',
            'author' => 'Admin',
            'published' => true,
        ]);

        return redirect('/blog');
    }

    public function show($id) {
        $post = Post::findOrFail($id);
        return view('post.show', ['post' => $post]);
    }
}
