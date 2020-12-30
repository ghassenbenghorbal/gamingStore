<?php

namespace App\Http\Controllers\mail;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Mail;

class Mailer extends Controller
{
    public static function sendOrderConfirmationMail($to_name, $to_email,$body){
        $data = array("name"=>$to_name, 
                    "body" => "");
        Mail::send("emails.mail", $data, function($message) use ($to_name, $to_email) {
        $message->to($to_email, $to_name)
        ->subject("Laravel Test Mail");
        $message->from("no.reply.gaming.store@gmail.com","Ghassen");
});
    }
}
