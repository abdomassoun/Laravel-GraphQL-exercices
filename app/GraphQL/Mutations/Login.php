<?php declare(strict_types=1);

namespace App\GraphQL\Mutations;

use App\Models\User1;
use App\Models\User2;
use App\Models\User3;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

final class Login
{
    /**
     * Handle the login request.
     *
     * @param  null  $_
     * @param  array{}  $args
     * @return array
     */
    public function __invoke($_, array $args)
    {
        // Find the user based on the UserType
        switch ($args['UserType']) {
            case 'USER1':
                $user = User1::where('email', $args['email'])->first();
                break;
            case 'USER2':
                $user = User2::where('email', $args['email'])->first();
                break;
            case 'USER3':
                $user = User3::where('email', $args['email'])->first();
                break;
        }
        
        // Check if the user exists and the password is correct
        if (! $user || ! Hash::check($args['password'], $user->password)) {
            return [
                'message' => 'The provided credentials are incorrect.',
                'status' => 'error'
            ];
        }
        
        // Update the user's device token
        $user->device_token = $args['device_token'];
        $user->save();
     
        return [
            'message' => 'User logged in successfully',
            'status' => 'success',
            'token' => $user->createToken($args['device_token'])->plainTextToken,
            // 'user' => $user
        ];
    }
}
