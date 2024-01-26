<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequest;
use App\Mail\ContactMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function show(){
        return view('user.contact');
    }

    public function send(){


        $data = request()->validate([
            'name'=>'required',
            'email'=>'required',
            'subject'=>'required',
            'message'=>'required',
        ]);

        Mail::to('saif07108@gmail.com')->send(new ContactMail($data));

        return redirect()->back()->with('success','Message sent successfully');
    }
}
