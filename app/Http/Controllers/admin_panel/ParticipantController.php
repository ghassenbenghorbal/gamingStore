<?php

namespace App\Http\Controllers\admin_panel;
use App\Address;
use App\Competition;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
 class ParticipantController extends Controller{
     public function show($id){
        //dd(Competition::find($id)->participants);

         $tab=[];
         foreach(Competition::find($id)->participants as $partic){
         array_push($tab,["full_name"=>$partic->full_name,"ville"=>Address::find($partic->address_id)->city]);}
         //dd($tab);
         return View('admin_panel.competitions.participant')
        ->with("par",$tab);
        }

 }
