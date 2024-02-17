<?php

namespace App\GraphQL\Directives;

use GraphQL\Language\AST\FieldDefinitionNode;
use GraphQL\Language\AST\InterfaceTypeDefinitionNode;
use GraphQL\Language\AST\ObjectTypeDefinitionNode;
use Nuwave\Lighthouse\Schema\AST\DocumentAST;
use Nuwave\Lighthouse\Schema\Directives\BaseDirective;
use Nuwave\Lighthouse\Support\Contracts\FieldManipulator;

class MycustomdirectiveDirective extends BaseDirective implements FieldManipulator
{
    public static function definition(): string
    {
        return /** @lang GraphQL */ <<<'GRAPHQL'
directive @mycustomdirective on FIELD_DEFINITION
GRAPHQL;
    }

    /**
     * Manipulate the AST based on a field definition.
     */
    public function manipulateFieldDefinition(
        DocumentAST &$documentAST,
        FieldDefinitionNode &$fieldDefinition,
        ObjectTypeDefinitionNode|InterfaceTypeDefinitionNode &$parentType
    ): void {
        // Implement logic to manipulate the field definition
        $fieldDefinition->resolveFunction = /** @lang GraphQL */ <<<'GRAPHQL'
        (
            $root,
            array $args,
            $context,
            \GraphQL\Type\Definition\ResolveInfo $resolveInfo
        ) {
            // Retrieve the current page from the arguments
            $currentPage = $args['page'] ?? 1;

            // Calculate the previous page
            $previousPage = max($currentPage - 1, 1);

            // Retrieve notifications from the previous page
            $notifications = \App\Models\Notification::where('page', $previousPage)->get();

            // Mark notifications from the previous page as read
            foreach ($notifications as $notification) {
                $notification->is_read = true;
                $notification->save();
            }

            // Call the original resolver
            $resolver = $this->getResolver();
            return $resolver($root, $args, $context, $resolveInfo);
        }
        GRAPHQL;
    }
}
