<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Coordinate;
use App\Token;
use App\UserAssosiation;

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

    public function getLastLocation(Request $re) {

        if(!$this->validateRelationship($re)) return response()->json('INVALID CREDENTIALS', 403);
        
        $location = Coordinate::where('user_id', $re->user_id)->orderBy('created_at', 'DESC')->first();
        return response()->json($location);

    }

    public function getLocationByDate(Request $re) {

        if(!$this->validateRelationship($re)) return response()->json('INVALID CREDENTIALS', 403);

        $locations = Coordinate::where([
            ['user_id', $re->user_id],
            ['created_at', 'LIKE', $re->date . "%"]
            ])->orderBy('created_at', 'DESC')->get();

        return response()->json($locations);

    }

    private function validateRelationship(Request $re){

        $user = Token::getUser($re->token);

        if($user->user_type == 1) {

            if($re->user_id == $user->id) return true;

            return false;
        }
            
        $assosiations = UserAssosiation::where([
            ['user_id', $re->user_id],
            ['assosiated_id', $user->id],
            ['confirmed', true]
        ])->first();

        if($assosiations == NULL) return false;

        return true;

    }

}
