<?php

namespace App\Http\Controllers;

use App\Models\Emails;
use App\Mail\ContactUsMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function send(Request $request){
        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'message' => 'required',
        ]);
        Emails::create($validatedData);

        Mail::to('junechep2002@gmail.com')->send(new ContactUsMail($validatedData['name'], $validatedData['email'], $validatedData['message']));

        return back()->with('success', 'Your message has been sent successfully!');

    }


    }
