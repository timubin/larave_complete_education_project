<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ContactModal;
class ContactController extends Controller
{
    function ContactIndex (){
        return view('Contact');
    }

    function getContactData(){
        $result=json_encode(ContactModal::orderBy('id','desc')->get());
        return $result;
      }

      function contactDelete(Request $req){
        $id=$req->input('id');
       $result= ContactModal::where('id','=',$id)->delete();
       if($result==true){
        return 1;
       }else{
        return 0;
       }
       }
}
