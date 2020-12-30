<?php

namespace App\Http\Controllers\mail;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Mail;

class Mailer extends Controller
{
    public static function sendOrderConfirmationMail($to_fullName, $to_email, $sale){
        $data = array("name"=>$to_fullName,
                    "sale" => $sale);
        Mail::send("emails.mail", $data, function($message) use ($to_fullName, $to_email) {
        $message->to($to_email, $to_fullName)
        ->subject("GKeys Order shipment");
        $message->from("no.reply.gaming.store@gmail.com","Gaming Store");
});
    }
}
