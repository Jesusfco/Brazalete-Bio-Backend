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
            $token->save();

            return response()->json(['token', $token->token, 'user', Auth::user()]);
        } 

        return response()->json(['msj' => 'Credentials Incorrect'], 403);

    }

    public function checkToken(Request $re) {
        
        if($re->token == NULL) 
        return response()->json(['msj', 'TOKEN NULL'], 401);
        
        if(Token::verify($re->token)) {
            return response()->json(Token::getUser($re->token));
        }

        return response()->json(['msj', 'Token invalid'], 403);
    }

}
