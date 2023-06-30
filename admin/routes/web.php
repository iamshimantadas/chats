<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ChatHistoryController;
use App\Http\Controllers\InsertChatReplyController;
use App\Http\Controllers\SaveChatReplyController;
use App\Http\Controllers\UpdateChatController;
use App\Http\Controllers\UpdatebyIDController;
use App\Http\Controllers\UPDATEbyIDChatReplyController;
use App\Http\Controllers\clearHistoryController;
use App\Http\Controllers\findChatController;
use App\Http\Controllers\DeletebyIDController;
use App\Http\Controllers\unresolvedQuesriesController;


Route::get('/', function () {
    if(session()->get('admin')){
        return view('adminpanel');
    }else{
        return view('login');
    }
});

Route::get('/login',[LoginController::class,'index']);
Route::post('/login',[LoginController::class,'auth']);

Route::get('/adminpanel', function () {
    if(session()->get('admin')){
        return view('adminpanel');
    }else{
        return view('login');
    }
});

Route::get('/chathistory',[ChatHistoryController::class,'show']);

Route::get('/insertChat&Reply',[InsertChatReplyController::class,'insert']);
Route::get('/InsertChat',function(){
     //session checks
     if(session()->get('admin')){
        return view('InsertChat');
   }else{
       return view('login');
   }
});
Route::get('/savechat',[SaveChatReplyController::class,'save']);


Route::get('/updatechat',[UpdateChatController::class,'records']);
Route::get('/updateChats',function(){
    //session checks
    if(session()->get('admin')){
       return view('updateChats');
  }else{
      return view('login');
  }
});

Route::get('/UpdatebyID',[UpdatebyIDController::class,'update']);
Route::get('/updateChatReply',function(){
    //session checks
    if(session()->get('admin')){
       return view('updateChatReply');
  }else{
      return view('login');
  }
});

Route::get('/UPDATEbyIDChatReply',[UPDATEbyIDChatReplyController::class,'index']);
Route::post('/UPDATEbyIDChatReply',[UPDATEbyIDChatReplyController::class,'updateData']);

Route::get('/clearHistory',[clearHistoryController::class,'index']);
Route::post('/clearHistory',[clearHistoryController::class,'clear']);

Route::get('/FindToUpdate',function(){
    //session checks
    if(session()->get('admin')){
        return view('FindToUpdate');
   }else{
       return view('login');
   }
});
Route::get('/findChat',[findChatController::class,'index']);
Route::post('/findChat',[findChatController::class,'update']);


Route::get('/FindToDelete',function(){
    //session checks
    if(session()->get('admin')){
        return view('FindToDelete');
   }else{
       return view('login');
   }
});
Route::get('/finddeleteChat',[findChatController::class,'Returnindex']);
Route::post('/finddeleteChat',[findChatController::class,'delete']);
Route::get('/DeletebyID',[DeletebyIDController::class,'deleteChat']);

Route::get('/unresolved',[unresolvedQuesriesController::class,'show']);
Route::post('/unresolved_form',[unresolvedQuesriesController::class,'form']);
Route::post('/unresolved_savechat',[unresolvedQuesriesController::class,'save']);

Route::get('/logout',function(){
    //session checks
    if(session()->get('admin')){
        // forgetting session data
        session()->forget('admin');

        return view('login');
   }else{
       return view('login');
   }
});


