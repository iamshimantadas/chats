<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Config;

class UpdateChatController extends Controller
{
    public function records(){
        //session checks
     if(session()->get('admin')){
        $q1 = DB::select("SELECT * FROM botreply");
        return view('updateChats', compact('q1'));
   }else{
       return view('login');
   }
    }
}
