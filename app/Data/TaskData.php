<?php

namespace App\Data;

use Spatie\LaravelData\Data;

class TaskData extends Data
{
    public null|optional|string $name;

    public null|optional|string $description;

    public null|optional|datetime $due_date;

    public null|optional|string $status;

    public null|optional|int $assigned_to;

    public null|optional|string $related_to;

    public null|optional|int $related_id;

    public static function rules()
    {
        return [
            'name' => [
                'nullable',
                'string',
            ],
            'description' => [
                'nullable',
                'string',
            ],
            'due_date' => [
                'nullable',
                'date',
            ],
            'status' => [
                'nullable',
                'string',
            ],
            'assigned_to' => [
                'nullable',
                'integer',
            ],
            'related_to' => [
                'nullable',
                'string',
            ],
            'related_id' => [
                'nullable',
                'integer',
            ],
        ];
    }
}
