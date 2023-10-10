<?php

namespace App\GraphQL\Types;

use App\User;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Facades\GraphQL;
use Rebing\GraphQL\Support\Type as GraphQLType;

class ProfileType extends GraphQLType
{
    protected $attributes = [
        'name' => 'Profile',
        'description' => 'A type',
        'model' => User::class, // Định nghĩa model cho users type
    ];

    // Định nghĩa field của type
    public function fields(): array
    {
        return [
            'id' => [
                'type' => Type::nonNull(Type::int()),
                'description' => 'The id of the user'
            ],
            'email' => [
                'type' => Type::string(),
                'description' => 'The email of user'
            ],
            'name' => [
                'type' => Type::string(),
                'description' => 'The name of the user'
            ],
        ];
    }

    protected function resolveEmailField($root, $args): string
    {
        return strtolower($root->email);
    }
}
