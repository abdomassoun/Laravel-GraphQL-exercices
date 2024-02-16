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
    public function user1()
    {
        return $this->belongsToMany(User1::class);
    }

    public function user2()
    {
        return $this->belongsToMany(User2::class);
    }
}
