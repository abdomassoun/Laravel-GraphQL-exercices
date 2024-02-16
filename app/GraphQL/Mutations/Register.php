<?php declare(strict_types=1);

namespace App\GraphQL\Mutations;

use App\Models\User1;

 class Register
{
    /**
     * @param  null  $_
     * @param  array{}  $args
     */
    public function __invoke($root, array $args)
    {
        $user = User1::where('phone', $args['phone'])->first();

        if ($user) {
            return "User already exists";
        }
        User1::create([
            'first_name' => $args['first_name'],
            'last_name' => $args['last_name'],
            'email' => $args['email'],
            'phone' => $args['phone'],
            'password' => bcrypt($args['password']),
            'gender' => $args['gender'],
        ]);
        return "User created successfully";
    }
}
