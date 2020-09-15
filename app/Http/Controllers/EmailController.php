<?php

namespace App\Http\Controllers;

use App\Mail\Contact;
use Illuminate\Support\Facades\Mail;

class EmailController extends Controller
{
    public function show() {
        return view('contact-form');
    }

    public function store(){
        request()->validate(['email' => 'required|email']);

        Mail::to(request('email'))->send(new Contact(request('topic')));

        return redirect('/email')->with('message', 'Email sent');
    }
}