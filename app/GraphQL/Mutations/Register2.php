<?php declare(strict_types=1);

namespace App\GraphQL\Mutations;

use App\Models\Address;
use App\Models\User2;
use App\Models\Wilaya;

class Register2
{
    /**
     * @param  null  $_
     * @param  array{}  $args
     */
    public function __invoke($_, array $args)
    {
        $user = User2::where('email', $args['email'])->first();

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

        User2::create([
            'first_name' => $args['first_name'],
            'last_name' => $args['last_name'],
            'email' => $args['email'],
            'password' => bcrypt($args['password']),
            'wilaya_id' => $wilaya->id,
            'address_id' => $address->id,
        ]);

        return "User created successfully";
    }
}
