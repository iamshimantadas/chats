<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Config;

class clearHistoryController extends Controller
{
    public function index(){
        return view('chathistoryhome');
    }
    public function clear(Request $req){
        $host=env('DB_HOST');
   $user=env('DB_USERNAME');
   $pass=env('DB_PASSWORD');
   $db=env('DB_DATABASE');

   $conn = mysqli_connect($host,$user,$pass,$db) or die("Database Error");

        $sql="TRUNCATE TABLE chathistory";
        mysqli_query($conn,$sql);
        
        return view('adminpanel');
    }
}
