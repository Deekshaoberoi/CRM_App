<?php

namespace App\Data;

use Spatie\LaravelData\Data;

class Opportunity extends Data
{
    public null|optional|string $name;

    public null|optional|string $description;

    public null|optional|string $stage;

    public null|optional|int $assigned_to;

    public null|optional|int $customer_id;

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
            'stage' => [
                'nullable',
                'string',
            ],
            'assigned_to' => [
                'nullable',
                'integer',
            ],
            'customer_id' => [
                'nullable',
                'integer',
            ],
        ];
    }
}
