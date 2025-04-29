<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactFormSubmission;

class ContactController extends Controller
{
    public function show()
    {
        return view('contact-us');
    }

    public function submit(ContactRequest $request)
    {
        $validated = $request->validated();

        // Send email (configure your mail settings in .env first)
        Mail::to('jtechsolutions758@gmail.com')->send(new ContactFormSubmission($validated));

        return back()->with('success', 'Thank you for your message! We will get back to you soon.');
    }
}