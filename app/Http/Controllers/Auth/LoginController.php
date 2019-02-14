<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Auth;
use App\User;

class LoginController extends Controller
{
    
    // use AuthenticatesUsers;

  
    //  */
    // protected $redirectTo = '/home';

    // /**
    //  * Create a new controller instance.
    //  *
    //  * @return void
    //  */
    // public function __construct()
    // {
    //     $this->middleware('guest')->except('logout');
    // }

    public function loginApi(Request $re) {

        if(Auth::attempt(['email' => $re->email, 'password' => $re->password]) ) {
            $token = new Token();
            $token->user_id = Auth::id();
            $token->generateKey();
            $token->save();

            return response()->json(['token', $token->token]);
        } 

        return response()->json(['msj' => 'Credentials Incorrect'], 403);

    }
}
