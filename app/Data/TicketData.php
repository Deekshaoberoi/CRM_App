<?php

namespace App\Data;

use Spatie\LaravelData\Data;

class TicketData extends Data
{
    public null|optional|int $customer_id;

    public null|optional|string $subject;

    public null|optional|string $description;

    public null|optional|string $status;

    public null|optional|string $priority;

    public null|optional|int $assigned_to;

    public static function rules()
    {
        return [
            'customer_id' => [
                'nullable',
                'integer',
            ],
            'subject' => [
                'nullable',
                'string',
            ],
            'description' => [
                'nullable',
                'string',
            ],
            'status' => [
                'nullable',
                'string',
            ],
            'priority' => [
                'nullable',
                'string',
            ],
            'assigned_to' => [
                'nullable',
                'integer',
            ],
        ];
    }
}
