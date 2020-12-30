<?php

namespace App\Http\Controllers\mail;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Mail;

class Mailer extends Controller
{
    public static function sendOrderConfirmationMail($to_fullName, $to_email, $commands){
        $data = array("name"=>$to_fullName, 
                    "commands" => $commands);
        Mail::send("emails.mail", $data, function($message) use ($to_fullName, $to_email) {
        $message->to($to_email, $to_fullName)
        ->subject("Order confirmation");
        $message->from("no.reply.gaming.store@gmail.com","Gaming Store");
});
    }
}
