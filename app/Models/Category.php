<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description', 
        'icon',
    ];

    public function user3()
    {
        return $this->belongsTo(User3::class);
    }
}
