<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use DB, Exception, Session,Validator;

class GlobalController extends Controller
{
    public function index(Request $request){
        try{
            $page_name = 'global_chat';
            $title = 'Public Global Chat';
            $user_id = Auth::user()->id;
            $doctor_data = '';
            $patient_list = User::where('id',0)->get();
            return view('global_chat',compact('page_name','title','user_id','doctor_data','patient_list'));
        }catch(Exception $e){
            return jsonResponse(1,$e->getMessage());
        }
    }
}
