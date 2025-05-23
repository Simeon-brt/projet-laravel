<?php

namespace App\GraphQL\Types;

use App\Models\Task;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Type as GraphQLType;

class TaskType extends GraphQLType
{
    protected $attributes = [
        'name' => 'Task',
        'description' => 'Une tâche de notre application TodoList',
        'model' => Task::class
    ];

    public function fields(): array
    {
    return [
        'id' => [
            'type' => Type::nonNull(Type::int()),
            'description' => 'L\'identifiant de la tâche'
        ],
        'title' => [
            'type' => Type::nonNull(Type::string()),
            'description' => 'Le titre de la tâche'
        ],
        'detail' => [
            'type' => Type::nonNull(Type::string()),
            'description' => 'Le détail de la tâche'
        ],
        'state' => [
            'type' => Type::nonNull(Type::string()),
            'description' => 'L\'état de la tâche'
        ],
        'created_at' => [
            'type' => Type::nonNull(Type::string()),
            'description' => 'La date de création de la tâche'
        ],
        'updated_at' => [
            'type' => Type::nonNull(Type::string()),
            'description' => 'La date de modification de la tâche'
        ],
        'user' => [
            'type' => GraphQL::type('User'),
            'description' => 'Le user de la tâche'
        ]

    ];
    }
}