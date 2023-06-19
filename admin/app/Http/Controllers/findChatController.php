<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Config;

class findChatController extends Controller
{
    public function index(){
        return view('FindToUpdate');
    }
    public function update(Request $req){
    if(session()->get('admin')){
        $host=env('DB_HOST');
   $user=env('DB_USERNAME');
   $pass=env('DB_PASSWORD');
   $db=env('DB_DATABASE');

   $conn = mysqli_connect($host,$user,$pass,$db) or die("Database Error");

        $req->validate(['uchatquery'=>'required']);
        
        $uchatquery = $req['uchatquery'];
        
        // filter user inputs
        $uchatquery = mysqli_real_escape_string($conn, $uchatquery);
        $uchatquery = htmlspecialchars($uchatquery);

        $q1 = DB::select("SELECT * FROM botreply WHERE queries LIKE '%$uchatquery%'");
        return view('updateChats', compact('q1'));

  
   }else{
       return view('login');
   }
        

    }
    public function Returnindex(){
        return view('FindToDelete');
    }
    public function delete(Request $req){
        if(session()->get('admin')){
            $host=env('DB_HOST');
   $user=env('DB_USERNAME');
   $pass=env('DB_PASSWORD');
   $db=env('DB_DATABASE');

   $conn = mysqli_connect($host,$user,$pass,$db) or die("Database Error");
    
            $req->validate(['uchatquery'=>'required']);
            
            $uchatquery = $req['uchatquery'];
            
            // filter user inputs
            $uchatquery = mysqli_real_escape_string($conn, $uchatquery);
            $uchatquery = htmlspecialchars($uchatquery);
    
            $q1 = DB::select("SELECT * FROM botreply WHERE queries REGEXP '$uchatquery'");
            return view('deleteChats', compact('q1'));
    
      
       }else{
           return view('login');
       }
       
    }
}
