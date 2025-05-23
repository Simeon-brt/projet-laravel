<?php

namespace App\GraphQL\Types;

use App\Models\User;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Type as GraphQLType;

class UserType extends GraphQLType
{
    protected $attributes = [
        'name' => 'User',
        'description' => 'Un user de notre application TodoList',
        'model' => User::class
    ];

    public function fields(): array
    {
        return [
            'id' => [
                'type' => Type::nonNull(Type::int()),
                'description' => 'L\'identifiant du user'
            ],
            'name' => [
                'type' => Type::nonNull(Type::string()),
                'description' => 'Le nom du user'
            ],
            'email' => [
                'type' => Type::nonNull(Type::string()),
                'description' => 'L\'email du user'
            ],
            'role' => [
                'type' => Type::nonNull(Type::string()),
                'description' => 'Le role du user'
            ],
            'created_at' => [
                'type' => Type::nonNull(Type::string()),
                'description' => 'La date de création du user'
            ],
            'updated_at' => [
                'type' => Type::nonNull(Type::string()),
                'description' => 'La date de modification du user'
            ],
            'tasks' => [
                'type' => Type::listOf(GraphQL::type('salut')),
                'description' => 'Les tâches du user'
            ]
        ];
    }
}