<?php declare(strict_types=1);

namespace App\GraphQL\Interfaces;

use GraphQL\Type\Definition\Type;
use Nuwave\Lighthouse\Execution\ResolveInfo;
use Nuwave\Lighthouse\Schema\TypeRegistry;
use Nuwave\Lighthouse\Support\Contracts\GraphQLContext;

final class MyCustomResolver
{
    public function __construct(
        private TypeRegistry $typeRegistry,
    ) {}

    /**
     * Decide which GraphQL type a resolved value has.
     *
     * @param  mixed  $root The value that was resolved by the field. Usually an Eloquent model.
     */
    public function __invoke(mixed $root, GraphQLContext $context, ResolveInfo $resolveInfo): Type
    {
        // TODO implement custom resolver logic - if the default is fine, just delete this class
    }
}
