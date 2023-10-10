<?php
namespace App\GraphQL\Query;

use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Facades\GraphQL;
use Rebing\GraphQL\Support\Query;
use Rebing\GraphQL\Support\SelectFields;
use Illuminate\Support\Facades\Auth;

class ProfileQuery extends BaseQuery
{
    protected $attributes = [
        'name' => 'Users Query',
        'description' => 'A query of users'
    ];

    public function type(): Type
    {
        // kết quả của query với paginate của laravel
        return GraphQL::type('profile');
    }

    public function resolve($root, $args)
    {
        return Auth::user();
    }
}
