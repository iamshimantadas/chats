<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Config;

class InsertChatReplyController extends Controller
{
    public function insert(){
        //session checks
        if(session()->get('admin')){
            return view('InsertChat');
       }else{
           return view('login');
       }
    }
}
