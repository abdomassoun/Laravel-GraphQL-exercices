<?php declare(strict_types=1);

namespace App\GraphQL\Mutations;

use App\Models\Address;
use App\Models\Domain;
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

        $domain= Domain::create([
            'name' => $args['domain']['name'],
            'description' => $args['domain']['description'],
            'icon' => $args['domain']['icon'],
        ]);

        User2::create([
            'first_name' => $args['first_name'],
            'last_name' => $args['last_name'],
            'email' => $args['email'],
            'phone' => $args['phone'],
            'gender' => $args['gender'],
            'password' => bcrypt($args['password']),
            'wilaya_id' => $wilaya->id,
            'domain_id' => $domain->id,
            'year_of_experience' => $args['year_of_experience'],
        ]);

        return "User created successfully";
    }
}
