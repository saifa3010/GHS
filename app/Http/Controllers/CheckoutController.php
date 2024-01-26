<?php

namespace App\Http\Controllers;

use App\Models\Address;
use App\Models\Task;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    //
    public function index($id)
{
    // Retrieve the task based on the provided task ID
    $task = Task::with(['worker'])->find($id);
        if (auth()->check()) {

        return view('user.checkout',compact('task'));
        }
     }


     public function store(Request $request)
     {
         // Validate the form data
         $validatedData = $request->validate([
             'firstName' => 'required|string',
             'lastName' => 'required|string',
             'email' => 'required|email',
             'street_address' => 'required|string',
             'phone_number' => 'required|string',
             'city' => 'required|string',
             'zip' => 'required|string',
             'postal_code' => 'required|string',
             'task_id' => 'required|exists:tasks,id',
         ]);

         // Retrieve the task based on the provided task_id
         $task = Task::findOrFail($validatedData['task_id']);

         // Check if the user's city matches the worker's city
         $workerCity = $task->worker->city;

         if ($validatedData['city'] !== $workerCity) {
             // Redirect back with an error message
             return redirect()->back()->with('error', 'The city must match the workers city.');
         }

         // Create a new checkout record
         $checkout = Address::create($validatedData);

         // Update task status
         $task->update(['status' => 'Accepted']);

         // Redirect the user to a success page or any other desired page
         return redirect()->route('show.payment', ['id' => $task->id]);
        }



}
