<?php
namespace App\GraphQL\Query;

use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Facades\GraphQL;
use Rebing\GraphQL\Support\Query;
use Rebing\GraphQL\Support\SelectFields;
use Auth;
use GraphQL\Type\Definition\ResolveInfo;
use Closure;


abstract class BaseQuery extends Query
{
    public function authorize($root, array $args, $ctx, ResolveInfo $resolveInfo = null, Closure $getSelectFields = null): bool
    {
        return ! Auth::guest();
    }
}
