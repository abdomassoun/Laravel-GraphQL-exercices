<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wilaya extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
    ];
    // i know its not right to do this but i have to do it for now
    // sluton is to create a parent class for user2 and user3
    public function user13()
    {
        return $this->belongsToMany(User3::class);
    }

    public function user2()
    {
        return $this->belongsToMany(User2::class);
    }
}
