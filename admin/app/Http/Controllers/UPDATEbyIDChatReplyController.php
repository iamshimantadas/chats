<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Config;

class UPDATEbyIDChatReplyController extends Controller
{
    public function index(){
        return view('updateChatReply');
    }
    public function updateData(Request $req){

         //session checks
    if(session()->get('admin')){
        $host=env('DB_HOST');
   $user=env('DB_USERNAME');
   $pass=env('DB_PASSWORD');
   $db=env('DB_DATABASE');

   $conn = mysqli_connect($host,$user,$pass,$db) or die("Database Error");
   
        $req->validate([
            'uquery'=>'required',
            'umode'=>'required',
            'editor'=>'required'
           ]);

          $id = $req['id'];
          $query = $req['uquery'];
          $mode = $req['umode'];
          $editor_code = $req['editor'];
          
          // filter user inputs
          $query = mysqli_real_escape_string($conn, $query);
          $query = htmlspecialchars($query);
          $mode = mysqli_real_escape_string($conn, $mode);
          $mode = htmlspecialchars($mode);
         // UPDATE botreply SET queries='hi',replies='hulu' WHERE enrollno=1;
        $sql="UPDATE botreply SET queries='$query',replies='$editor_code' WHERE enrollno=$id";
        $query=mysqli_query($conn,$sql);
           
          return view('adminpanel');

   }else{
       return view('login');
   }

                
    }
}
