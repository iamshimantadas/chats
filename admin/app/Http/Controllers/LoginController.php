<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Config;

class LoginController extends Controller
{
    public function index(){
        return view('login');
    }
    public function auth(Request $req){
         $req->validate([
            'uemail'=>'required|email',
            'upass'=>'required',
            'sec_string'=>'required'
        ]);

        $host=env('DB_HOST');
        $user=env('DB_USERNAME');
        $pass=env('DB_PASSWORD');
        $db=env('DB_DATABASE');
     
        $conn = mysqli_connect($host,$user,$pass,$db) or die("Database Error");

        
        $email = $req['uemail'];
        $password = $req['upass'];
        $sec_string = $req['sec_string'];

         $email = mysqli_real_escape_string($conn, $email);
         $password = mysqli_real_escape_string($conn, $password);
         $sec_string = mysqli_real_escape_string($conn, $sec_string);

        $email = htmlspecialchars($email);
        $password = htmlspecialchars($password);
        $sec_string = htmlspecialchars($sec_string);

         $sql="SELECT id FROM `chatbotadmins` WHERE email='$email' && passd='$password' && security_string='$sec_string'";
        $query=mysqli_query($conn,$sql);
        $row['id'] = mysqli_num_rows($query);
       
        if($row['id']){
            //echo "admin login matched!";
            $req->session()->put('admin', '$email');
            return view('adminpanel');
        }else{
            return view('login');
        }
        
    }
}
