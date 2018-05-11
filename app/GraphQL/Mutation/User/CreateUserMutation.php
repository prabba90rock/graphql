<?php

namespace App\GraphQL\Mutation\User;

use Folklore\GraphQL\Support\Mutation;
use GraphQL\Type\Definition\ResolveInfo;
use GraphQL\Type\Definition\Type;
use GraphQL;
use App\User;

class CreateUserMutation extends Mutation
{
    protected $attributes = [
        'name' => 'createUser',
    ];

    public function type()
    {
        return GraphQL::type('User');
    }

    public function rules()
    {
        return [
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
        ];
    }

    public function args()
    {
        return [
            'email' => ['name' => 'email', 'type' => Type::string()],
            'password' => ['name' => 'password', 'type' => Type::string()],
        ];
    }

    public function resolve($root, $args, $context, ResolveInfo $info)
    {

        $data = [
            'email' => $args['email'],
            'password' => \Hash::make($args['password'])
        ];

        return User::create($data);
    }
}
