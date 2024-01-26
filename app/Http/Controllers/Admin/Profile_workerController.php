<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Worker;
use Illuminate\Support\Facades\DB;

class Profile_workerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $workers =Worker::with(['category','user'])->get();
        return view('Profile_worker.index', compact('workers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
         $users = User::where('role', 'worker')->get();

        $categories = Category::all();

        $workers = Worker::value('user_id');

        return view('Profile_worker.create', compact('users', 'categories','workers'));
        }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'firstName' => 'required','lastName' => 'required','phone_number' => 'required',
            'city' => 'required','description' => 'required','profession' => 'required',
            'skillsExperience' => 'required','aboutMe' => 'required',
            'price' => 'required','minHour' => 'required',
            'image'=>'required|image|mimes:jpeg,png,jpg|max:10000',
            'work_image.*' => 'image|mimes:jpeg,png,jpg|max:10000',
            'user_id'=>'required|unique:workers',
            'category_id' => 'required',
        ], [
            'firstName.required' => 'The first name field is required.',
            'lastName.required' => 'The last name field is required.',
            'phone_number.required' => 'The phone number field is required.',
            'city.required' => 'The city field is required.',
            'description.required' => 'The description field is required.',
            'profession.required' => 'The profession field is required.',
            'skillsExperience.required' => 'The skills and Experience field is required.',
            'aboutMe.required' => 'The about Me field is required.',
            'price.required' => 'The price field is required.',
            'minHour.required' => 'The minHour field is required.',
            'image.required' => 'The image field is required.',
            'user_id.required' => 'The category field is required.',
            'user_id.unique' => 'This worker already has a profile.',
            'category_id.required' => 'The category field is required.',
        ]);

        $input = $request->all();

        if ($image = $request->file('image')) {
            $path = 'images/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($path, $profileImage);
            $input['image'] = $profileImage;
        }


        $input['work_image'] = []; // Initialize an array to store image names

        foreach ($request->file('work_image') as $value) {
            $imageName = time() . '_' . $value->getClientOriginalName();
            $value->move(public_path('images'), $imageName);
            $input['work_image'][] = $imageName; // Add each image name to the array
        }

        // Encode the 'work_image' array as JSON before saving it to the database
        $input['work_image'] = json_encode($input['work_image']);


        Worker::create($input);


        return redirect()->route('Profile_worker.index')
            ->with('success', "added successfully");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $worker = Worker::findOrFail($id);
        return view('Profile_worker.show', compact('worker'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $worker = Worker::findOrFail($id);
        $users = User::where('role', 'worker')->get();
        $categories = Category::all();

        return view('Profile_worker.edit', compact('worker', 'users', 'categories'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $request->validate([
            'firstName' => 'required','lastName' => 'required','phone_number' => 'required',
            'city' => 'required','description' => 'required','profession' => 'required',
            'skillsExperience' => 'required','aboutMe' => 'required',
            'price' => 'required','minHour' => 'required',
            'image'=>'required|image|mimes:jpeg,png,jpg|max:10000',
            'work_image.*' => 'image|mimes:jpeg,png,jpg|max:10000',
        ], [
            'firstName.required' => 'The first name field is required.',
            'lastName.required' => 'The last name field is required.',
            'phone_number.required' => 'The phone number field is required.',
            'city.required' => 'The city field is required.',
            'description.required' => 'The description field is required.',
            'profession.required' => 'The profession field is required.',
            'skillsExperience.required' => 'The skills and Experience field is required.',
            'aboutMe.required' => 'The about Me field is required.',
            'price.required' => 'The price field is required.',
            'minHour.required' => 'The minHour field is required.',
            'image.required' => 'The image field is required.',
        ]);

        $worker = Worker::findOrFail($id);
        $input = $request->all();

        // Handle 'image' update
        if ($image = $request->file('image')) {
            $path = 'images/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($path, $profileImage);
            $input['image'] = $profileImage;
        }

        // Handle 'work_image' update
       // ...

        // Handle 'work_image' update
        $input['work_image'] = []; // Initialize an array to store image names

        foreach ($request->file('work_image') as $value) {
            $imageName = time() . '_' . $value->getClientOriginalName();
            $value->move(public_path('images'), $imageName);
            $input['work_image'][] = $imageName; // Add each image name to the array
        }

        // Encode the 'work_image' array as JSON before saving it to the database
        $input['work_image'] = json_encode($input['work_image']);

        // Use DB::raw to update the 'work_image' field
        $worker->update([
            'work_image' => DB::raw('JSON_MERGE_PATCH(work_image, \'' . $input['work_image'] . '\')'),
        ]);

// ...

        $worker->update($input);

        return redirect()->route('Profile_worker.index')
            ->with('success', 'Updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
{
    $worker = Worker::findOrFail($id);
    $worker->delete();

    return redirect()->route('Profile_worker.index')
        ->with('success', 'Deleted successfully');
}
}
