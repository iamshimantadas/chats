<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Config;

class DeletebyIDController extends Controller
{
    public function deleteChat(Request $req){
        $req->validate([
            'enrollid'=>'required'
        ]);

        //session checks
    if(session()->get('admin')){
        $host=env('DB_HOST');
   $user=env('DB_USERNAME');
   $pass=env('DB_PASSWORD');
   $db=env('DB_DATABASE');

   $conn = mysqli_connect($host,$user,$pass,$db) or die("Database Error");

        $enrollid = $req['enrollid'];
        $enrollid = mysqli_real_escape_string($conn, $enrollid);
        $enrollid = htmlspecialchars($enrollid);
      
        $q1 = DB::delete("DELETE FROM botreply WHERE enrollno=$enrollid");
        return view('adminpanel', compact('q1'));

   }else{
       return view('login');
   }
    }
}
