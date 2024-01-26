<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Task;
use App\Models\worker;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class TaskController extends Controller
{
    //

    public function index()
{
    // Retrieve tasks with related worker and user information
    $tasks = Task::with(['worker', 'user'])->get();

    // Pass the tasks to the view
    return view('tasks.index', compact('tasks'));
}


public function filterStatus(Request $request)
{
    $status = $request->input('status');

    $tasks = Task::where('status', $status)->get();

    return response()->json(['tasks' => $tasks]);
}



    public function showDetails($id)
    {
        $worker = Worker::findOrFail($id);
        // Assuming you have a 'comments' relationship in your Worker model
        $comments = $worker->comments()->with('user')->get();

        $startTimes = [];
        $endTimes = ['2 hours', '3 hours', '4 hours', 'full day'];

        // Generate start time options from 8 AM to 10 PM, increasing by 2 hours
        for ($time = strtotime('8:00 AM'); $time <= strtotime('10:00 PM'); $time += 4 * 60 * 60) {
            $startTimes[date('H:i', $time)] = date('g:i A', $time);
        }

        // Calculate average rating using the averageRating method
        $averageRating = $worker->averageRating();

        return view('user.detailsWorker', compact('comments', 'worker', 'startTimes', 'endTimes', 'averageRating'));
    }


    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'date' => 'required|date',
            'start_time' => 'required',
            'end_time' => 'required',
            'worker_id' => 'required|exists:workers,id',
        ]);

        if ($validatedData['end_time'] === 'full_day') {
            $validatedData['start_time'] = '8:00 AM';
            $validatedData['end_time'] = '10:00 PM';
        } else {
            // Convert numeric end_time to hours (assuming it's in hours)
            $hours = (int) $validatedData['end_time'];
            $validatedData['end_time'] = \Carbon\Carbon::parse($validatedData['start_time'])
                ->addHours($hours)
                ->format('H:i');
        }

        // Check if the user is logged in
        if (auth()->check()) {
            // Check if the selected time range is available
            $isAvailable = Task::where('worker_id', $validatedData['worker_id'])
                ->where('date', $validatedData['date'])
                ->where('time', $validatedData['start_time'])
                ->where('end_time', $validatedData['end_time'])
                ->doesntExist();

            if ($isAvailable) {

                $worker = Worker::findOrFail($validatedData['worker_id']);

                // Calculate the number of hours between start_time and end_time
                $startTime = \Carbon\Carbon::parse($validatedData['start_time']);
                $endTime = \Carbon\Carbon::parse($validatedData['end_time']);
                $numberOfHours = $startTime->diffInHours($endTime);

                // Calculate the total cost
                $total = $numberOfHours * $worker->price;
                // Create a new task
                $task = new Task([
                    'user_id' => auth()->id(),
                    'worker_id' => $validatedData['worker_id'],
                    'date' => $validatedData['date'],
                    'time' => \Carbon\Carbon::parse($validatedData['start_time'])->format('H:i'),
                    'end_time' => \Carbon\Carbon::parse($validatedData['end_time'])->format('H:i'),
                    'total' => $total,
                    'status' => 'Pending',
                    'availability' => false, // Mark the time range as unavailable
                ]);

                $task->save();
                $taskId = $task->id;

                // Example: Update worker status if booked for a full day
                // if ($validatedData['end_time'] === '10:00 PM') {
                //     Worker::where('id', $validatedData['worker_id'])->update(['status' => 'Not available']);
                // }

                // Task and comment stored successfully
                return redirect()->route('checkout', ['taskId' => $taskId])->with('success', 'Task added successfully!');
            } else {
                // Task is not available, handle accordingly (e.g., show an error message)
                return redirect()->back()->with('error', 'Selected time is not available. Please choose a different time.');
            }
        } else {
            // User is not logged in, handle accordingly
            return redirect()->back()->with('error', 'You must be logged in to book a task.');
        }
    }



    public function storeComment(Request $request)
    {
        // Validate the form data
        $validatedData = $request->validate([
            'comment' => 'required|string',
            'worker_id' => 'required|exists:workers,id',
            'rating' => 'required|integer|min:1|max:5', // Assuming a rating scale from 1 to 5
        ]);

        // Check if the user has already submitted a comment for this worker
        $existingComment = Comment::where('user_id', auth()->id())
            ->where('worker_id', $validatedData['worker_id'])
            ->first();

        if ($existingComment) {
            return redirect()->back()->withErrors(['comment' => 'You have already submitted a comment for this worker.']);
        }

        // Create a new comment and associate it with the worker
        Comment::create([
            'body' => $validatedData['comment'],
            'user_id' => auth()->id(),
            'worker_id' => $validatedData['worker_id'],
            'rating' => $validatedData['rating'],
            'approved' => false,
        ]);

        return redirect()->back()->with('success', 'Comment and rating added successfully!');
    }
}
