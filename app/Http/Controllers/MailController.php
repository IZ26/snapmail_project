<?php

namespace App\Http\Controllers;

use App\Message;
use App\Http\Requests\MessageRequest;
use Illuminate\Http\Request;
use Mail;

class MailController extends Controller
{
    public function saveMail(Message $message, MessageRequest $req)
    {
        $data = [
            'email' => $req->email,
            'message' => $req->message,
            'code' => $this->generateCode()
        ];

        $message->email = $data['email'];
        $message->message = $data['message'];
        $message->code = $data['code'];
        $message->save();

        Mail::send('mail.sendmail', $data, function($message) use ($data) {
            $message->to($data['email'])->subject('Vous avez reçu un message de:' . $data['email']);
        });

        return redirect('/');
    }

    public function generateCode($length = 10)
    {
        return substr(str_shuffle(str_repeat($x = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ', ceil($length / strlen($x)))), 1, $length);
    }

    public function seeMail(Request $req, Message $message){
        $finalmessage = $message->where('code', $req->code)->firstOrFail();
        $finalmessage->message;
        $finalmessage->delete();
        return view('mail.seemail', $finalmessage);
    }
}
