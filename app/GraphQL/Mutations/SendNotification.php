<?php declare(strict_types=1);

namespace App\GraphQL\Mutations;

use App\Models\User1;
use App\Services\NotificationsService;

final class SendNotification
{
    /**
     * @param  null  $_
     * @param  array{}  $args
     */
    public function __invoke($_, array $args)
    {
        $user = User1::find($args['user_id']);

        if (!$user) {
            return "User not found";
        }
        if ($user->device_token) {
            $device_token = $user->device_token;
            $title = $args['title'];
            $message = $args['description'];
            NotificationsService::sendNotification($device_token, $title, $message);
            return "Notification sent successfully";
        }
        return "User has no device token";
    }
}
