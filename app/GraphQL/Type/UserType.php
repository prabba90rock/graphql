<?php

namespace App\GraphQL\Type;

use GraphQL\Type\Definition\Type;
use Folklore\GraphQL\Support\Type as BaseType;
use GraphQL;

class UserType extends BaseType
{
    protected $attributes = [
        'name' => 'User',
        'description' => 'A type'
    ];

    public function fields()
    {
        return [
            'id' => [
                'type' => Type::nonNull(Type::int()),
            ],
            'email' => [
                'type' => Type::string(),
            ],
            'created_at' => [
                'type' => Type::string(),
            ],
            'updated_at' => [
                'type' => Type::string(),
            ],
            'profile' => [
                'type' => GraphQL::type('Profile'),
            ]
        ];
    }


    protected function resolveEmailField($root, $args)
    {
        return strtolower($root->email);
    }

    protected function resolveCreatedAtField($root, $args)
    {
        return (string)$root->created_at;
    }

    protected function resolveUpdatedAtField($root, $args)
    {
        return (string) $root->updated_at;
    }

    protected function resolveProfileField($root, $args)
    {
        return $root->profile;
    }
}
