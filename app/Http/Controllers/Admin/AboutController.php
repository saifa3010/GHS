<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\About;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function About(){

        $aboutUs=About::all();
        return view("user.aboutUs",compact("aboutUs"));

    }

    public function index()
    {
        //
        $About=About::all();

        return view('About.index',compact("About"));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $About=About::all();
        return view('About.create',compact('About'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'image'=>'image|mimes:jpeg,png,jpg|max:10000',
        ]);

        $input = $request->all();

        if ($image = $request->file('image')) {
            $path = 'images/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($path, $profileImage);
            $input['image'] = $profileImage;
        }

        About::create($input);

        return redirect()->route('About.index')
            ->with('success', "added successfully");
    }

    /**
     * Display the specified resource.
     */
    public function show(About $About)
    {
        //
        return view('About.show',compact('About'));

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(About $About)
    {
        //
        return view('About.edit',compact('About'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, About $About)
    {
        //
        $request->validate([
            'image'=>'image|mimes:jpeg,png,jpg|max:10000',
        ]);

        $input = $request->all();

        if ($image = $request->file('image')) {
            $path = 'images/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($path, $profileImage);
            $input['image'] = $profileImage;
        }

        $About->update($input);

        return redirect()->route('About.index')
            ->with('success', "added successfully");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(About $About)
    {
        //
        $About->delete();

        return redirect()->route('About.index')
            ->with('deleted', 'deleted successfully');
    }



}
