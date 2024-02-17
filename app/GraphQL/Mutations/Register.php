<?php declare(strict_types=1);

namespace App\GraphQL\Mutations;

use App\Models\Address;
use App\Models\Category;
use App\Models\Domain;
use App\Models\User1;
use App\Models\User2;
use App\Models\User3;
use App\Models\Wilaya;

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
            if(isset($user['domain'])) {
                $existingUser = User2::where('phone', $user['phone'])->first();
                if ($existingUser) {
                    $results[] = [
                        'message' => "User with phone {$user['phone']} already exists",
                        'status' => 'error'
                    ];
                    continue;
                }else {
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
    
                    $results[] = [
                        'message' => "User created successfully",
                        'status' => 'success',
                        // 'data' => $user
                        ];
                }
                        
                
                

               

            } 
            elseif (isset($user['category'])) {
                $existingUser = User3::where('phone', $user['phone'])->first();
                if ($existingUser) {
                    $results[] = [
                        'message' => "User with phone {$user['phone']} already exists",
                        'status' => 'error'
                    ];
                    continue;
                }else{
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
                    $results[] = [
                    'message' => "User created successfully",
                    'status' => 'success',
                    // 'data' => $user
                    ];
                }
            
            }else{
                $existingUser = User1::where('phone', $user['phone'])->first();
                if ($existingUser) {
                    $results[] = [
                        'message' => "User with phone {$user['phone']} already exists",
                        'status' => 'error'
                    ];
                    continue;
                }else{
                    User1::create([
                        'first_name' => $user['first_name'],
                        'last_name' => $user['last_name'],
                        'email' => $user['email'],
                        'phone' => $user['phone'],
                        'password' => bcrypt($user['password']),
                        'gender'=> $user['gender'],
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
