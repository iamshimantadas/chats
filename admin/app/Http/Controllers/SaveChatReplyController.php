<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Botreply;
use Config;

class SaveChatReplyController extends Controller
{
    public function save(Request $req){
       // echo "<pre>";
       // print_r($req->all());
       $req->validate([
        'uquery'=>'required',
        'umode'=>'required',
        'editor'=>'required'
       ]);
      

       $host=env('DB_HOST');
       $user=env('DB_USERNAME');
       $pass=env('DB_PASSWORD');
       $db=env('DB_DATABASE');
    
       $conn = mysqli_connect($host,$user,$pass,$db) or die("Database Error");

      $query = $req['uquery'];
      $mode = $req['umode'];
      $editor_code = $req['editor'];
      
      // filter user inputs
      $query = mysqli_real_escape_string($conn, $query);
      $query = htmlspecialchars($query);
      $mode = mysqli_real_escape_string($conn, $mode);
      $mode = htmlspecialchars($mode);
       
      $bot = new Botreply;
       $bot->queries = $query;
       $bot->type = $mode;
       $bot->replies = $editor_code;
       $bot->save();
      
       return view('adminpanel');
         
    }
}
