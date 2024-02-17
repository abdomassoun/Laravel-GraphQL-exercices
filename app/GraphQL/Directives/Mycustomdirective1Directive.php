<?php

namespace App\GraphQL\Directives;

use App\Models\Notification;
use Nuwave\Lighthouse\Schema\Directives\BaseDirective;
use Nuwave\Lighthouse\Schema\Values\FieldValue;
use Nuwave\Lighthouse\Support\Contracts\FieldManipulator;

class MyCustomDirective extends BaseDirective implements FieldManipulator
{
    public static function definition(): string
    {
        return /** @lang GraphQL */ <<<'SDL'
            """
            Example custom directive.
            """
            directive @mycustomdirective on FIELD_DEFINITION
        SDL;
    }

    public function manipulateFieldDefinition(FieldValue $fieldValue, \Closure $next): FieldValue
    {
        // Retrieve the current page from the arguments
        $args = $fieldValue->args;
        $currentPage = $args['page'] ?? 1;

        // Calculate the previous page
        $previousPage = max($currentPage - 1, 1);

        // Retrieve notifications from the previous page
        $notifications = Notification::where('page', $previousPage)->get();

        // Mark notifications from the previous page as read
        foreach ($notifications as $notification) {
            $notification->is_read = true;
            $notification->save();
        }

        // Continue with the original resolver
        $fieldValue = $next($fieldValue);

        return $fieldValue;
    }
}
