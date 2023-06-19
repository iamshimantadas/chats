<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Config;

class ChatHistoryController extends Controller
{
    public function show(){
        $host=env('DB_HOST');
        $user=env('DB_USERNAME');
        $pass=env('DB_PASSWORD');
        $db=env('DB_DATABASE');
     
        $conn = mysqli_connect($host,$user,$pass,$db) or die("Database Error");
       
        $q1 = DB::select("SELECT * FROM chathistory");
        
        //session checks
        if(session()->get('admin')){
            return view('chathistoryhome', compact('q1'));
       }else{
           return view('login');
       }

    }
}
