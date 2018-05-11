<?php

namespace App\GraphQL\Mutation\User;

use Folklore\GraphQL\Support\Mutation;
use GraphQL\Type\Definition\ResolveInfo;
use GraphQL\Type\Definition\Type;
use GraphQL;
use App\User;

class UpdateUserMutation extends Mutation
{
    protected $attributes = [
        'name' => 'updateUser',
    ];

    public function type()
    {
        return GraphQL::type('User');
    }

    public function rules()
    {
        return [
            'email' => 'required|email',
            'password' => 'required|min:6',
        ];
    }

    public function args()
    {
        return [
            'id' => ['name' => 'id', 'type' => Type::int()],
            'email' => ['name' => 'email', 'type' => Type::string()],
            'password' => ['name' => 'password', 'type' => Type::string()],
        ];
    }

    public function resolve($root, $args, $context, ResolveInfo $info)
    {

        $user = User::find($args['id']);

        if(! $user)
        {
            return null;
        }
        // update user
        $fields = isset($args['password'])
            ? array_merge($args, ['password' => bcrypt($args['password'])])
            : $args;
        $user->update($fields);
        return $user;
    }
}
