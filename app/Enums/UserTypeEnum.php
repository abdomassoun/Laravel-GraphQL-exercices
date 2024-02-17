<?php

namespace App\Enums;

/**
 * UserTypeEnum represents the different types of users.
 */
enum UserTypeEnum : string {
    case User1 = 'User1';  
    case User2 = 'User2';
    case User3 = 'User3';

    /**
     * Get all the values of UserTypeEnum.
     *
     * @return array The array of values.
     */
    public static function values(): array
    {
        return array_column(self::cases(), 'value');
    }
}