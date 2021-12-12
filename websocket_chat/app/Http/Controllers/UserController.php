<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use DB, Exception, Session,Validator;

class UserController extends Controller
{
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

    /**
     * exit from admin panel.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function logout(Request $request)
    {
        Auth::logout();
        Session::flush();
        return redirect('/');
    }
}
