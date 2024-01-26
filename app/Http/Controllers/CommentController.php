<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\User;
use App\Models\worker;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    //






    // public function store(Request $request)
    // {


    //     if (auth()->check()) {
    //         $comment = new Comment([
    //             'user_id' => auth()->id(),
    //             'body' => $request->input('body'),
    //             'worker_id' => $request->input('worker_id'),
    //         ]);
    //         $comment->save();
    //     }
    //     else {
    //         return redirect(route('login'));
    //     }

    //     return redirect()->route('user.detailsWorker','worker_id')->with('success', 'Comment added successfully!');
    // }
}

