<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function user_type_view(){
        if($this->user_type == 1) return 'Monitoreados';
        else if($this->user_type == 2) return 'Tutores';
        else if($this->user_type == 3) return 'Externos';
        else if($this->user_type == 4) return 'Administrador';
        else return  '';        
    }

    public function status_view() {
        if($this->status == 1) return 'Activo';
        else if($this->status == 0) return 'Inactivo';
    }

    public function scopeSearch($query, $name) 
    {
        // $n = $query->where('name', 'LIKE', "%$name%")->get();
        return $query->where('name', 'LIKE', "%$name%");
    }
}
