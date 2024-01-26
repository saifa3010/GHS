<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use RealRashid\SweetAlert\Facades\Alert;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $services = Service::all();
        return view("service.index",compact("services"));




    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('service.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    $request->validate([
        'name' => 'required|unique:services',
        'image'=>'required|image|mimes:jpeg,png,jpg|max:10000',
        'description' => 'required',
    ], [
        'name.required' => 'The name field is required.',
        'name.unique' => 'The name must be unique.',
        'image.required' => 'The image field is required.',
        'description.required' => 'The description field is required.',
    ]);

    $input = $request->all();

    if ($image = $request->file('image')) {
        $path = 'images/';
        $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
        $image->move($path, $profileImage);
        $input['image'] = $profileImage;
    }

    Service::create($input);
    // Alert::success('Added successfully','welcome');

    return redirect()->route('service.index')
        ->with('success', "service added successfully");
}


    /**
     * Display the specified resource.
     */
    public function show(Service $service)
    {
        return view('service.show', compact('service'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Service $service)
    {
        return view('service.edit', compact('service'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Service $service)
    {
        $request->validate([
            'name' => 'required',
            'image'=>'required|image|mimes:jpeg,png,jpg|max:10000',
            'description' => 'required',
        ], [
            'name.required' => 'The name field is required.',
            'image.required' => 'The image field is required.',
            'description.required' => 'The description field is required.',
        ]);


        $input = $request->all();

        if ($image = $request->file('image')) {
            $path = 'images/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($path, $profileImage);
            $input['image'] = $profileImage;
        }

        $service->update($input);
        return redirect()->route('service.index')
            ->with('success', "service edit successfully");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Service $service)
    {
        $service->delete();

        return redirect()->route('service.index')
            ->with('deleted', 'Service deleted successfully');
    }
}
