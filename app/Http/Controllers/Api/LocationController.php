<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Coordinate;
use App\Token;
use Carbon;

class LocationController extends Controller
{
    public function saveLocation(Request $re) { 

        $token = Token::getToken($re->token);
        
        if($token == NULL) return response()->json(false, 403);

        $location = new Coordinate();
        $location->user_id = $token->user_id;
        $location->longitude = $re->longitude;
        $location->latitude = $re->latitude;
        $location->created_at = Carbon::now();
        $location->save();

        return response()->json(true);

    }
}
