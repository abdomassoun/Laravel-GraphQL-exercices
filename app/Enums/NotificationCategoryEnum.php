<?php

namespace App\Enums;

enum NotificationCategoryEnum: string {

    case ALERT = 'ALERT';
    case WARNING = 'WARNING';
    case INFO = 'INFO';
    case SUCCESS = 'SUCCESS';
    case ERROR = 'ERROR';

    public static function values(): array
    {
        return array_column(self::cases(), 'value');
    }



}

    