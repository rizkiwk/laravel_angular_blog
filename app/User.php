<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authentication;
use Illuminate\Contracts\Auth\Authenticatable as Authenticatable;

class User extends Authentication
{
    use Notifiable;

    protected $table        = 'users';
    protected $primaryKey   = 'uid';
    protected $connection   = 'mysql';

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
        'password', 'remember_token'
    ];
}
