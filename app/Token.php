<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Token extends Model
{
    protected $fillable = [
        'token', 'user_id', 'expire_time',
    ];

    public function generateKey(){
        $this->token = $this->makeToken();
        $this->expire_time = $this->generateExpireTime();
    }

    public function makeToken(){

        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < 100; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;

    }

    private function generateExpireTime() {
        return '2020-12-01 01:00:00';
    }

    public function user(){
        return $this->belongsTo('App\User', 'id', 'user_id');
    }
    
    public static function verify($string) {
        $token = Token::where('token', $string)->first();

        if($token == NULL) return false;

        return true;
    }

    public static function getUser($string) {
        $token = Token::where('token', $string)->first();
        return User::find($token->user_id);        
    }

    public static function getToken($string) {
        return Token::where('token', $string)->first();
    }
}
