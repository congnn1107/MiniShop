<?php

namespace App\GraphQL\Types;

use App\User;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Facades\GraphQL;
use Rebing\GraphQL\Support\Type as GraphQLType;

class LoginType extends GraphQLType
{
    protected $attributes = [
        'name' => 'Login Type',
        'description' => 'A type',
    ];

    // Định nghĩa field của type
    public function fields(): array
    {
        return [
            'message' => [
                'type' => Type::string(),
                'description' => 'Response message'
            ],
            'token' => [
                'type' => Type::string(),
                'description' => 'Login token'
            ],
        ];
    }
}
