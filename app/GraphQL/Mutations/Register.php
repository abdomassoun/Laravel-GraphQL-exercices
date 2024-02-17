<?php declare(strict_types=1);

namespace App\GraphQL\Mutations;

use App\Models\Address;
use App\Models\Category;
use App\Models\Domain;
use App\Models\User1;
use App\Models\User2;
use App\Models\User3;
use App\Models\Wilaya;
use Illuminate\Support\Facades\DB;
class Register
{
    /**
     * Create new users.
     *
     * @param  null  $_
     * @param  array{}  $args
     * @return array{}  $results
     */
    public function __invoke($root, array $args)
    {
        $users = $args['users'];
        $results = []; // Create an empty array to store the return values

        foreach ($users as $user) {
            if (isset($user['domain'])) {
                // Check if the user with the same phone number already exists
                $existingUser = DB::table('user2s')->where('phone', $user['phone'])->first();
                if ($existingUser) {
                    $results[] = [
                        'message' => "User with phone {$user['phone']} already exists",
                        'status' => 'error'
                    ];
                    continue;
                } else {
                    // Create a new wilaya
                    $wilaya = DB::table('wilayas')->insertGetId([
                        'name' => $user['wilaya']['name'],
                    ]);

                    // Create a new domain
                    $domain = DB::table('domains')->insertGetId([
                        'name' => $user['domain']['name'],
                        'description' => $user['domain']['description'],
                        'icon' => $user['domain']['icon'],
                    ]);

                    // Create a new user
                    DB::table('user2s')->insert([
                        'first_name' => $user['first_name'],
                        'last_name' => $user['last_name'],
                        'email' => $user['email'],
                        'phone' => $user['phone'],
                        'gender' => $user['gender'],
                        'password' => bcrypt($user['password']),
                        'wilaya_id' => $wilaya,
                        'domain_id' => $domain,
                        'year_of_experience' => $user['year_of_experience'],
                    ]);

                    $results[] = [
                        'message' => "User created successfully",
                        'status' => 'success',
                        // 'data' => $user
                    ];
                }
            } elseif (isset($user['category'])) {
                // Check if the user with the same phone number already exists
                $existingUser = DB::table('user3s')->where('phone', $user['phone'])->first();
                if ($existingUser) {
                    $results[] = [
                        'message' => "User with phone {$user['phone']} already exists",
                        'status' => 'error'
                    ];
                    continue;
                } else {
                    // Create a new wilaya
                    $wilaya = DB::table('wilayas')->insertGetId([
                        'name' => $user['wilaya']['name'],
                    ]);

                    // Create a new address
                    $address = DB::table('addresses')->insertGetId([
                        'description' => $user['address']['description'],
                        'latitude' => $user['address']['latitude'],
                        'longitude' => $user['address']['longitude'],
                    ]);

                    // Create a new category
                    $category = DB::table('categories')->insertGetId([
                        'name' => $user['category']['name'],
                        'description' => $user['category']['description'],
                        'icon' => $user['category']['icon'],
                    ]);

                    // Create a new user
                    DB::table('user3s')->insert([
                        'first_name' => $user['first_name'],
                        'last_name' => $user['last_name'],
                        'email' => $user['email'],
                        'phone' => $user['phone'],
                        'password' => bcrypt($user['password']),
                        'wilaya_id' => $wilaya,
                        'address_id' => $address,
                        'category_id' => $category,
                        'year_of_experience' => $user['year_of_experience'],
                    ]);

                    $results[] = [
                        'message' => "User created successfully",
                        'status' => 'success',
                        // 'data' => $user
                    ];
                }
            } else {
                // Check if the user with the same phone number already exists
                $existingUser = DB::table('user1s')->where('phone', $user['phone'])->first();
                if ($existingUser) {
                    $results[] = [
                        'message' => "User with phone {$user['phone']} already exists",
                        'status' => 'error'
                    ];
                    continue;
                } else {
                    // Create a new user
                    DB::table('user1s')->insert([
                        'first_name' => $user['first_name'],
                        'last_name' => $user['last_name'],
                        'email' => $user['email'],
                        'phone' => $user['phone'],
                        'password' => bcrypt($user['password']),
                        'gender' => $user['gender'],
                    ]);

                    $results[] = [
                        'message' => "User created successfully",
                        'status' => 'success',
                        // 'data' => $user
                    ];
                }
            }
        }

        return $results; // Return the array containing all the return values
    }
}
