<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    use HasFactory;

    protected $fillable = [
        'description',
        'longitude',
        'latitude',
        
    ];
    public function user1()
    {
        return $this->belongsTo(User1::class);
    }
    public function user2()
    {
        return $this->belongsTo(User2::class);
    }
}
