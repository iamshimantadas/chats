<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Unreserved_query;
use App\Models\Botreply;
use DB;

class unresolvedQuesriesController extends Controller
{
    public function show(Request $req){
        $rec = Unreserved_query::all();
        //session checks
    if(session()->get('admin')){
        return view('unreslved',['rec'=>$rec]);
   }else{
       return view('login');
   }
    }

    public function form(Request $req){
        $req->validate(['queryid'=>'required']);
        $queryid = $req['queryid'];
        $msg = $req['msg'];
         //session checks
    if(session()->get('admin')){
        return view('unresolved_form',['id'=>$queryid,'msg'=>$msg]);
   }else{
       return view('login');
   }
    }

    public function save(Request $req){
       
        $req->validate([
            'UnresovedQueryID'=>'required',
         'uquery'=>'required',
         'umode'=>'required',
         'editor'=>'required'
        ]);
       
 
        $host=env('DB_HOST');
        $user=env('DB_USERNAME');
        $pass=env('DB_PASSWORD');
        $db=env('DB_DATABASE');
     
        $conn = mysqli_connect($host,$user,$pass,$db) or die("Database Error");
        
        $UnresovedQueryID = $req['UnresovedQueryID'];
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
       
        // deleteing record of resolve from table 
        DB::delete('DELETE FROM unreserved_query WHERE enrollno = ?', [$UnresovedQueryID]);

        $rec = Unreserved_query::all();
        //session checks
    if(session()->get('admin')){
        return view('unreslved',['rec'=>$rec]);
   }else{
       return view('login');
   }        
     }
}
