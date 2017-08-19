<?php

namespace App;

use Illuminate\Notifications\Notifiable;
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

    public function assets(){
        return $this->hasMany(Asset::class);
    }

    public static function non_admins(){
        return User::all()
                ->where("user_role","=", 0);
    }

    public static function admins(){
        return User::all()
                ->where("user_role","=", 1);
    }

    public function array(){
        return [

            'id'                => $this->id,
            'name'              => $this->name,
            'email'             => $this->email,
            //'email_confirmed'   => $this->email_confirmed,
            //'password'          => $this->password,
            //'user_role'         => $this->user_role,
            //'last_login'        => $this->last_login,
            //'total_login_count' => $this->total_login_count,
            //'remember_token'    => $this->remember_token,
            //'created_at'        => $this->created_at,
            //'updated_at'        => $this->updated_at,
        ];
    }
}
