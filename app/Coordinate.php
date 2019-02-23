<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Coordinate extends Model
{
    
    protected $fillable = [
        'user_id', 'longitude', 'latitude'
    ];

    public $timestamps = false;

}
