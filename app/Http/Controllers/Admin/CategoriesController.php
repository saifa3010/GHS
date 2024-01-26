<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Service;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::with('service')->get();
        return view("categories.index",compact("categories"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $services=Service::all();
        return view('categories.create',compact('services'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:categories',
            'image'=>'required|image|mimes:jpeg,png,jpg|max:10000',
            'service_id' => 'required',
        ], [
            'name.required' => 'The name field is required.',
            'name.unique' => 'The name must be unique.',
            'image.required' => 'The image field is required.',
            'service_id.required' => 'The service field is required.',
        ]);

        $input = $request->all();

        if ($image = $request->file('image')) {
            $path = 'images/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($path, $profileImage);
            $input['image'] = $profileImage;
        }

        Category::create($input);
        // Alert::success('Added successfully','welcome');

        return redirect()->route('categories.index')
            ->with('success', "categories added successfully");
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        $service=Service::all();
        return view('categories.show', compact('service','category'));

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        $services=Service::all();
        return view('categories.edit', compact('services','category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        $request->validate([
            'name' => 'required',
            'image'=>'required|image|mimes:jpeg,png,jpg|max:10000',
            'service_id' => 'required',
        ], [
            'name.required' => 'The name field is required.',
            'image.required' => 'The image field is required.',
            'service_id.required' => 'The service field is required.',
        ]);


        $input = $request->all();

        if ($image = $request->file('image')) {
            $path = 'images/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($path, $profileImage);
            $input['image'] = $profileImage;
        }

        $category->update($input);
        return redirect()->route('categories.index')
            ->with('success', "category edit successfully");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()->route('categories.index')
        ->with('deleted', 'Category deleted successfully');
    }
}
