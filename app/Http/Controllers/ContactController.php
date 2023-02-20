<?php

namespace App\Http\Controllers;

use App\Mail\ContactMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function send(Request $request){
        $data = [

            "email" => $request->sender,
            "phone" => $request->phone,
            "objet" => $request->subject,
            "name" => $request->name,
            "body" => $request->body
        ];

        Mail::to("contact@zoe-tl.com")->send(new ContactMail($data));

        return back()->with('status', 'Votre mail a été envoyé, merci !');
    }
}
