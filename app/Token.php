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
        return '';
    }

    public function assosiations(){
        return $this->hasMany('App\User', 'id', 'user_id');
    }
    
}
