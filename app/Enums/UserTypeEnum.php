<?php

namespace App\Enums;

enum UserTypeEnum : string {
    case User1 = 'User1';  
    case User2 = 'User2';
    case User3 = 'User3';



    public static function values(): array
    {
        return array_column(self::cases(), 'value');
    }
}