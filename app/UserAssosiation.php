<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserAssosiation extends Model
{
    protected $fillable = [
        'user_id', 'assosiated_id', 'confirmed'
    ];

    public function user() {
        return $this->hasOne('App\User', 'id', 'user_id');
    }

    public function assosiated() {
        return $this->hasOne('App\User', 'id', 'assosiated_id');
    }
}
