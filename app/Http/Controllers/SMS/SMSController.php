<?php

namespace App\Http\Controllers\SMS;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Coordinate;
use Carbon;

class SMSController extends Controller {
    

    public function saveLocation(Request $re) { 

        $location = new Coordinate();
        $location->user_id = $re->user_id;
        $location->longitude = $re->longitude;
        $location->latitude = $re->latitude;
        $location->created_at = Carbon::now();
        $location->save();

        return response()->json(true);

    }

    public function test(Request $re) { 

        if(isset($re->user_id)) {
            return response()->json('FUNCIONA :D');
        }
        

        return response()->json('ESTAS EN LA PAGINA');
        

    }
}
