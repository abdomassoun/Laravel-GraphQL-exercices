<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Domain extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description', 
        'icon',
    ];

    public function user2()
    {
        return $this->belongsTo(User2::class);
    }
}
