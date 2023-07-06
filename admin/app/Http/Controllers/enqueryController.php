<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Enquiry_table;
use DB;

class enqueryController extends Controller
{
   public function rec(){
     //session checks
     if(session()->get('admin')){
        $rec = DB::table('enquiry_table')->orderBy('id', 'desc')->get();
    return view('enqs',['rec'=>$rec]);
   
   }else{
       return view('login');
   }
    }

    public function trash(){
        if(session()->get('admin')){
            DB::table('enquiry_table')->truncate();
            $rec = DB::table('enquiry_table')->orderBy('id', 'desc')->get();
        return view('enqs',['rec'=>$rec]);
       
       }else{
           return view('login');
       }
    }
}
