<?php

namespace Createam\Contact\Http\Controllers;

use App\Http\Controllers\Controller;
use Createam\Contact\Mail\ContactMailable;
use Createam\Contact\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function index()
    {
        return view('contact::contact');
    }

    public function send(Request $request)
    {
        Mail::to(config('contact.send_email_to'))->send(new ContactMailable($request->message,$request->name));
        Contact::create($request->all());
        dd(config('contact.send_email_to'));
    }
}