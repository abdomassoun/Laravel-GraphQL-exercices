<?php declare(strict_types=1);

namespace App\GraphQL\Directives;

use Nuwave\Lighthouse\ClientDirectives\ClientDirective;

class RequiredIfDirective extends ClientDirective
{
    // Constructor
    public function __construct()
    {
        parent::__construct('requiredIf');
    }

    // Method to retrieve arguments for the field
    public function getArgumentsForField($resolveInfo)
    {
        return $this->forField($resolveInfo);
    }
}

// Example usage of the custom directive
$requiredIfDirective = new RequiredIfDirective();

// Retrieve arguments for the field being resolved
$arguments = $requiredIfDirective->getArgumentsForField($resolveInfo);

// Now you can implement your logic based on the retrieved arguments
// For instance, you can check if the 'domain' field is present
// and then enforce the requirement of the 'gender' field accordingly
if (!empty($arguments) && isset($arguments['field']) && $arguments['field'] === 'domain') {
    // Logic to enforce the requirement of the 'gender' field
    // For example, you can set a flag to indicate that 'gender' is required
    $genderIsRequired = true;
} else {
    $genderIsRequired = false;
}

// Now, based on the logic above, you can enforce the requirement of the 'gender' field in your application logic.
