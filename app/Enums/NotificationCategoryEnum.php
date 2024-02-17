<?php

namespace App\Enums;

/**
 * Enum class for Notification categories.
 */
enum NotificationCategoryEnum: string {

    // Alert category
    case ALERT = 'ALERT';

    // Warning category
    case WARNING = 'WARNING';

    // Information category
    case INFO = 'INFO';

    // Success category
    case SUCCESS = 'SUCCESS';

    // Error category
    case ERROR = 'ERROR';

    /**
     * Get all the enum values.
     *
     * @return array
     */
    public static function values(): array
    {
        return array_column(self::cases(), 'value');
    }
}
