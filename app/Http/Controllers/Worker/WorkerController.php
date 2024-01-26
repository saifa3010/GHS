<?php

namespace App\Http\Controllers\Worker;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\worker;
use Illuminate\Http\Request;
use Illuminate\Queue\Worker as QueueWorker;
use Illuminate\Support\Facades\Auth;

class WorkerController extends Controller
{
    //

    public function show($id)
    {
        // Retrieve the worker associated with the currently authenticated user
        // $userWorker = auth()->user()->worker;
        // $worker = Worker::all();

        // Check if the user has an associated worker
        // if (!$userWorker) {
        //     // Handle the case where the user doesn't have an associated worker
        //     return view('worker.no_worker');
        // }

        // Retrieve all users if needed
        // $users = User::all();

        // return view('worker.index', compact('userWorker', 'users','worker'));

        // $worker = Worker::findOrFail($id);
        // return view('worker.show', compact('worker'));

        // if(Auth :: id())
        // {
        // $id=Auth :: user()->id;
        // $worker=Worker :: where('user_id','=',$id)->get();
        // return view('worker.show',compact('worker'));
        // }
    }




}
