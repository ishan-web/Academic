<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Mail;
use App\Mail\ForMail;
use App\Models\contact_us;

class MailController extends Controller
{
    public function index()
    {
        $message = contact_us::all();
        return view('visitor.contact', compact('message'));
    }

    public function store(Request $request)
    {
        $message = new contact_us;
        $mailData = [
            'title' => $message->name,
            'subject' => $message->subject,
            'email'=> $message->email,
            'phone' => $message->phone,
            'desc' => $message->descrption

        ];
         
        Mail::to('ishanpoudel58@gmail.com')->send(new DemoMail($mailData));
           
        dd("Email is sent successfully.");
    }
}
