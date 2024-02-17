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
        $users = $args['users'];
        $results = []; // Create an empty array to store the return values

        foreach ($users as $user) {
            $existingUser = User2::where('email', $user['email'])->first();

            if ($existingUser) {
                $results[] = "User with email {$user['email']} already exists";
            } else {
                $wilaya = Wilaya::create([
                    'name' => $user['wilaya']['name'],
                ]);

                $domain = Domain::create([
                    'name' => $user['domain']['name'],
                    'description' => $user['domain']['description'],
                    'icon' => $user['domain']['icon'],
                ]);

                User2::create([
                    'first_name' => $user['first_name'],
                    'last_name' => $user['last_name'],
                    'email' => $user['email'],
                    'phone' => $user['phone'],
                    'gender' => $user['gender'],
                    'password' => bcrypt($user['password']),
                    'wilaya_id' => $wilaya->id,
                    'domain_id' => $domain->id,
                    'year_of_experience' => $user['year_of_experience'],
                ]);

                $results[] = "User with email {$user['email']} created successfully";
            }
        }

        return $results;
    }
}
