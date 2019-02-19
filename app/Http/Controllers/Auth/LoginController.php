<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Auth;
use App\User;
use App\Token;

class LoginController extends Controller
{       

    public function loginApi(Request $re) {
                        

        if(Auth::attempt(['email' => $re->email, 'password' => $re->password]) ) {

            $token = new Token();
            $token->user_id = Auth::id();
            
            $token->generateKey();
            // $token->save();

            return response()->json(['token', $token->token, 'user', Auth::user()]);
        } 

        return response()->json(['msj' => 'Credentials Incorrect'], 403);

    }

}
