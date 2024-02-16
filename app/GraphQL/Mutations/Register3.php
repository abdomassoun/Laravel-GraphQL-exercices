<?php declare(strict_types=1);

namespace App\GraphQL\Mutations;

use App\Models\Address;
use App\Models\Category;
use App\Models\User3;
use App\Models\Wilaya;

class Register3
{
    /**
     * @param  null  $_
     * @param  array{}  $args
     */
    public function __invoke($_, array $args)
    {
        $user = User3::where('email', $args['email'])->first();

        if ($user) {
            return "User already exists";
        }

        $wilaya=Wilaya::create([
            'name' => $args['wilaya']['name'],
        ]);

        $address= Address::create([
            'description' => $args['address']['description'],
            'latitude' => $args['address']['latitude'],
            'longitude' => $args['address']['longitude'],
        ]);
        $category= Category::create([
            'name' => $args['category']['name'],
            'description' => $args['category']['description'],
            'icon' => $args['category']['icon'],
        ]);

        User3::create([
            'first_name' => $args['first_name'],
            'last_name' => $args['last_name'],
            'email' => $args['email'],
            'phone' => $args['phone'],
            'password' => bcrypt($args['password']),
            'wilaya_id' => $wilaya->id,
            'address_id' => $address->id,
            'category_id' => $category->id,
            'year_of_experience' => $args['year_of_experience'],
        ]);

        return "User created successfully";
    }
}
