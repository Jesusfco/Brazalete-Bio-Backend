<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Token;
use App\UserAssosiation;

class AssosiationsController extends Controller
{
    public function getMyAssosiations(Request $re) {

        $token = Token::getToken($re->token);

        $assosiations = UserAssosiations::where('user_id', $token->user_id)
                        ->orWhere('assosiated_id', $token->user_id)
                        ->with(['user', 'assosiated'])->get();

        return response()->json($assosiations);
        
    }

}
