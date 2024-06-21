<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactFormMail;


class ContactController extends Controller
{
    //
    public function showForm()
    {
        return view('ContactFormMailController');
    }

    public function submitForm(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'comment' => 'required',
        ]);

        // Send email using Mailable class
        Mail::to('delfinotachi@gmail.com')->send(new ContactFormMail($request));

        return redirect()->route('contact.submit')->with('message', 'Thank you for your message!');
    }
}
