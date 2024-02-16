<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User3 extends Model
{
    use HasFactory;


    public function address()
    {
        return $this->hasOne(Address::class);
    }
    public function wilaya()
    {
        return $this->hasOne(Wilaya::class);
    }

    public function category()
    {
        return $this->hasOne(Category::class);
    }
}
