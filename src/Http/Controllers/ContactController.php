<?php

namespace Createam\Contact\Http\Controllers;

use App\Http\Controllers\Controller;
use Createam\Contact\Mail\ContactMailable;
use Createam\Contact\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Throwable;

class ContactController extends Controller
{
    public function index()
    {
        return view('contact::contact');
    }

    public function send(Request $request)
    {
        try{
            Mail::to(config('contact.send_email_to'))->send(new ContactMailable($request->message,$request->name));
            Contact::creates($request->all());
            return response()->json(['status' => 'success', 'title' =>'alert-success', 'message' =>  'message was sent']);
        }catch(Throwable $e){
            return response()->json(['status' => 'failed', 'title' =>'alert-danger', 'message' =>  'something went wrong']);
        }

    }
}