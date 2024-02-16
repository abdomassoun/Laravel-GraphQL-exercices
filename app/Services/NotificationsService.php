<?php

namespace App\Services;

class NotificationsService
{
    public static function sendNotification($token_1,$title,$body)
    {
        $SERVER_API_KEY = 'AAAAUF9kjvg:APA91bHKNwVPjCcyEDDYruj-RVe08Ymu8DmSUgrJZ5A7EhqCavdqzFSkMNqIH2QNgutYzRXk54CQC8i77k7dQenioYCZv3GXt2mU7ChSlQzcg8WLfINo0fUw_wZXfCjlAIC7ZJyhSVUh';

        $data = [
            "registration_ids" => [
                $token_1 ,///user_id->tokens() 
            ],
            "notification" => [
                "title" => $title,
                "body" => $body,
                "sound"=> "default" // required for sound on ios
            ],
        ];

        $dataString = json_encode($data);

        $headers = [
            'Authorization: key=' . $SERVER_API_KEY,
            'Content-Type: application/json',
        ];

        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send');
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $dataString);

        $response = curl_exec($ch);
        
    }
}