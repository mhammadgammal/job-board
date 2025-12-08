<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    //

    public function index() {
        $comments = Comment::all();

        return view('comment.index', ['comments' => $comments]);
    }

    public function show($id) {
        $comment = Comment::findOrFail($id);
        return view('comment.show', ['comment' => $comment]);
    }
}
