<?php

namespace App\Http\Controllers;

use App\Mail\MessageMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    //
    function send(Request $request){
        $email = $request->input('email');
        $message = $request->get('message');

        $data = array(
            'email' => $email,
            'message' => $message
        );

        Mail::to($email)->send(new MessageMail($data));
        return back();
    }
}
