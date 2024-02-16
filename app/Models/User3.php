<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User3 extends Model
{
    use HasFactory;

    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'phone',
        'address_id',
        'wilaya_id',
        'category_id',
        'password',
        'devise_token',
        'year_of_experience',
        ];

    


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
