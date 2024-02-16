<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User2 extends Model
{
    use HasFactory;


    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'password',
        
    ];
    protected $hidden = [
        'password',
        'remember_token',
    ];

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
