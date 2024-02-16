<?php declare(strict_types=1);

namespace App\GraphQL\Validators;

use Nuwave\Lighthouse\Validation\Validator;

final class IfExistsUserValidator extends Validator
{
    /**
     * Return the validation rules.
     *
     * @return array<string, array<mixed>>
     */
    public function rules(): array
    {
        return [
            // if phone number is exists in the database return user already exists
            // and return the user id , also store data to other table
            'phone' => ['required', 'exists:users,phone'],

        ];
    }
}
