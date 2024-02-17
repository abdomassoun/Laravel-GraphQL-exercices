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
        $users = $args['users'];
        $results = []; // Create an empty array to store the return values

        foreach ($users as $user) {
            $existingUser = User1::where('phone', $user['phone'])->first();

            if ($existingUser) {
                $results[] = "User with phone number {$user['phone']} already exists";
            } else {
                User1::create([
                    'first_name' => $user['first_name'],
                    'last_name' => $user['last_name'],
                    'email' => $user['email'],
                    'phone' => $user['phone'],
                    'password' => bcrypt($user['password']),
                    'gender' => $user['gender'],
                ]);
                $results[] = "User created successfully";
            }
        }

        return $results; // Return the array containing all the return values
    }
}
