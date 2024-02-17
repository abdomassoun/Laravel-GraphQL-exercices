<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User2 extends User
{
    // use HasFactory;


    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'phone',
        'gender',
        'password',
        'device_token',
        'wilaya_id',
        'domain_id',
        'year_of_experience'
    ];
    // protected $hidden = [
    //     'password',
    //     'remember_token',
    // ];
    
    protected $table = 'user2s';

    public function address()
    {
        return $this->hasOne(Address::class);
    }
    public function wilaya()
    {
        return $this->hasOne(Wilaya::class);
    }
    public function domain()
    {
        return $this->hasOne(Domain::class);
    }
}
