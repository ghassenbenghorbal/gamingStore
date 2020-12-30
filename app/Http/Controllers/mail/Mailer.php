<?php

namespace App\Http\Controllers\mail;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Mail;

class Mailer extends Controller
{
    public function sendEmail(){
        $to_name = "Ghassen Ben Ghorbal";
        $to_email = "foulene999@gmail.com";
        $data = array("name"=>"Gaming Store”", 
                    "body" => "A test mail");
        Mail::send("emails.mail", $data, function($message) use ($to_name, $to_email) {
        $message->to($to_email, $to_name)
        ->subject("Laravel Test Mail");
        $message->from("no.reply.gaming.store@gmail.com","Ghassen");
});
    }
}
