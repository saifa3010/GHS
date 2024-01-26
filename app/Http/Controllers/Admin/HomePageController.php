<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\HomePage;
use Illuminate\Http\Request;

class HomePageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $HomePage=HomePage::all();

        return view('HomePage.index',compact("HomePage"));


    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $HomePage=HomePage::all();
        return view('HomePage.create',compact('HomePage'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'image'=>'image|mimes:jpeg,png,jpg|max:10000',
            'logo'=>'image|mimes:jpeg,png,jpg|max:10000',
        ]);

        $input = $request->all();

        if ($image = $request->file('image')) {
            $path = 'images/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($path, $profileImage);
            $input['image'] = $profileImage;
        }
        if ($logo = $request->file('logo')) {
            $path = 'images/';
            $profileLogo = date('YmdHis') . "." . $logo->getClientOriginalExtension();
            $logo->move($path, $profileLogo);
            $input['logo'] = $profileLogo;
        }

        HomePage::create($input);

        return redirect()->route('HomePage.index')
            ->with('success', "added successfully");
    }

    /**
     * Display the specified resource.
     */
    public function show(HomePage $HomePage)
    {
        //
        return view('HomePage.show',compact('HomePage'));

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(HomePage $HomePage)
    {
        //
        return view('HomePage.edit',compact('HomePage'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, HomePage $HomePage)
    {
        //
        $request->validate([
            'image'=>'image|mimes:jpeg,png,jpg|max:10000',
            'logo'=>'image|mimes:jpeg,png,jpg|max:10000',
        ]);

        $input = $request->all();

        if ($image = $request->file('image')) {
            $path = 'images/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($path, $profileImage);
            $input['image'] = $profileImage;
        }
        if ($logo = $request->file('logo')) {
            $path = 'images/';
            $profileLogo = date('YmdHis') . "." . $logo->getClientOriginalExtension();
            $logo->move($path, $profileLogo);
            $input['logo'] = $profileLogo;
        }

        $HomePage->update($input);

        return redirect()->route('HomePage.index')
            ->with('success', "added successfully");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(HomePage $HomePage)
    {
        $HomePage->delete();

        return redirect()->route('HomePage.index')
            ->with('deleted', 'deleted successfully');
    }
}
