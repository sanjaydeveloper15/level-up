<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use DB, Exception, Session,Validator;

class UserController extends Controller
{
    public function signup_request(Request $request){
        DB::beginTransaction();
        try{
            $validator = Validator::make($request->all(), [ 
                'first_name' => 'required',
                'last_name' => 'required',
                'email' => 'required|email|unique:users,email',
                'password' => 'required|min:6|'
            ]);
            if ($validator->fails()) { 
                return jsonResponse(1, $validator->errors()->first());       
            }
            $data = myArray($request->all());
            $data = array_filter($data);
            $data['password'] = bcrypt($request->password);
            $user_id = User::insertGetId($data);
            DB::commit();
            //get details and do login
            $user = Auth::loginUsingId($user_id);
            if($user){
                $user = Auth::user();
                return jsonResponse(3,__('messages.signed_up'));
            }else{
                return jsonResponse(1,__('messages.sorry_msg'));
            }
        }catch(Exception $e){
            DB::rollback();
            return jsonResponse(1,$e->getMessage());
        }
    }

    public function login_request(Request $request){
        try{
            $validator = Validator::make($request->all(), [ 
                'email' => 'required|email',
                'password' => 'required'
            ]);
            if ($validator->fails()) { 
                return jsonResponse('1', $validator->errors()->first());       
            }
            $found = User::where(['email' => $request->email])->first();
            if($found){
                //get details and do login
                if( Auth::attempt(['email' => $found->email, 'password' => decodeIt($request->password)]) ){ 
                    $user = Auth::user();
                    return jsonResponse(3,__('messages.logged_in'));
                }else{
                    return jsonResponse(1,__('messages.wrong_password'));
                }
            }else{
                return jsonResponse(1,__('messages.not_registered'));
            }
        }catch(Exception $e){
            return jsonResponse(1,$e->getMessage());
        }
    }
}
