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
     * @return string[]
     */
    public function __invoke($_, array $args): array
    {
        $users = $args['users'];
        $results = [];

        foreach ($users as $user) {
            $user = User3::where('email', $user['email'])->first();

            if ($user) {
                $results[] = "User with email {$user['email']} already exists";
                continue;
            }

            $wilaya = Wilaya::create([
                'name' => $user['wilaya']['name'],
            ]);

            $address = Address::create([
                'description' => $user['address']['description'],
                'latitude' => $user['address']['latitude'],
                'longitude' => $user['address']['longitude'],
            ]);
            $category = Category::create([
                'name' => $user['category']['name'],
                'description' => $user['category']['description'],
                'icon' => $user['category']['icon'],
            ]);

            User3::create([
                'first_name' => $user['first_name'],
                'last_name' => $user['last_name'],
                'email' => $user['email'],
                'phone' => $user['phone'],
                'password' => bcrypt($user['password']),
                'wilaya_id' => $wilaya->id,
                'address_id' => $address->id,
                'category_id' => $category->id,
                'year_of_experience' => $user['year_of_experience'],
            ]);

            $results[] = "User with email {$user['email']} created successfully";
        }

        return $results;
    }
}
