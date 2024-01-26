<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function comment()
    {
        $comments = Comment::with(['user', 'worker'])->where('approved', false)->get();
        return view('comments.comment', compact('comments'));
    }

    public function approveComment($id)
    {

        $comment = Comment::findOrFail($id);
        $comment->update(['approved' => true]);

        return redirect()->route('comments.comment')->with('success', 'Comment approved successfully.');
    }
}
