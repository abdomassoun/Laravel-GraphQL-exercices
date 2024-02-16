<?php declare(strict_types=1);

namespace App\GraphQL\Mutations;

use App\Models\User1;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

final class Login
{
    /**
     * @param  null  $_
     * @param  array{}  $args
     */
    public function __invoke($_, array $args)
    {

        $user = User1::where('email', $args['email'])->first();
 
        // if (! $user ||  $args['password']=! $user->password){//! Hash::check($args['password'], $user->password)) {
        //     throw ValidationException::withMessages([
        //         'email' => ['The provided credentials are incorrect.'],
        //     ]);
        // }
        $user->device_token = $args['device_token'];
     
        return $user->createToken($args['device_token'])->plainTextToken;    }
}
