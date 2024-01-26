<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\footer;
use Illuminate\Http\Request;

class FooterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //

        $footer=footer::all();

        return view('footer.index',compact("footer"));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $footer=footer::all();
        return view('footer.create',compact('footer'));
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

        footer::create($input);

        return redirect()->route('footer.index')
            ->with('success', "added successfully");
    }

    /**
     * Display the specified resource.
     */
    public function show(footer $footer)
    {
        //
        return view('footer.show',compact('footer'));

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(footer $footer)
    {
        //
        return view('footer.edit',compact('footer'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, footer $footer)
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

        $footer->update($input);

        return redirect()->route('footer.index')
            ->with('success', "added successfully");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(footer $footer)
    {
        //
        $footer->delete();

        return redirect()->route('footer.index')
            ->with('deleted', 'deleted successfully');
    }
}
