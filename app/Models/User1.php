<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User1 as Authenticatable;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User1 extends User
{
    // use HasApiTokens, HasFactory, Notifiable;

    protected $fillable = [
        'first_name',
        'last_name',
        'phone',
        'gender',
        'email',
        'password',
        'device_token',
    ];

    protected $table = 'user1s';
    
    // protected $hidden = [
    //     'password',
    //     'remember_token',
    // ];


    // protected $casts = [
    //     'email_verified_at' => 'datetime',
    //     'password' => 'hashed',
    // ];

}
