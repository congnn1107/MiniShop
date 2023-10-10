<?php
namespace App\GraphQL\Query;

use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Facades\GraphQL;
use Rebing\GraphQL\Support\Query;
use Rebing\GraphQL\Support\SelectFields;
use Illuminate\Support\Facades\Auth;
use GraphQL\Error\UserError;
class Login extends Query
{
    protected $attributes = [
        'name' => 'Login Query',
        'description' => 'A query of users'
    ];

    public function args(): array
    {
        return [
            'email' => [
                'type' => Type::string(),
                'rules' => ['required'],
            ],
            'password' => [
                'type' => Type::string(),
                'rules' => ['required'],
            ]
        ];
    }

    public function type(): Type
    {
        return GraphQL::type('login_type');
    }

    public function resolve($root, $args)
    {
        if (!$token = auth()->attempt($args)) {
            throw new UserError('Login failed', 401);
        }

        return ['message' => 'Login successful', 'token' => $token];
    }
}
