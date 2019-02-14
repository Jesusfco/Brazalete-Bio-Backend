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

    private function makeToken(){
        return '';
    }

    private function generateExpireTime() {
        return '';
    }

    public function assosiations(){
        return $this->hasMany('App\User', 'id', 'user_id');
    }
    
}
