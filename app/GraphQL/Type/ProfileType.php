<?php

namespace App\GraphQL\Type;

use GraphQL\Type\Definition\Type;
use Folklore\GraphQL\Support\Type as BaseType;
use GraphQL;

class ProfileType extends BaseType
{
    protected $attributes = [
        'name' => 'Profile',
        'description' => 'A type'
    ];

    public function fields()
    {
        return [
            'id' => [
                'type' => Type::nonNull(Type::int()),
            ],
            'full_name' => [
                'type' => Type::string(),
            ],
            'dob' => [
                'type' => Type::string(),
            ],
            'is_married' => [
                'type' => Type::boolean(),
            ],
            'created_at' => [
                'type' => Type::string(),
            ],
            'updated_at' => [
                'type' => Type::string(),
            ],
        ];
    }
}
