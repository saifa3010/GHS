<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    //

    public function success($id)
{
    $task = Task::findOrFail($id);

    return view('user.booking', compact('task'));
}

}
