<?php

namespace App\Data;

use Spatie\LaravelData\Data;

class Interaction extends Data
{
    public null|optional|int $customer_id;

    public null|optional|string $type;

    public null|optional|string $subject;

    public null|optional|string $notes;

    public null|optional|datetime $interaction_date;

    public null|optional|int $created_by;

    public static function rules()
    {
        return [
            'customer_id' => [
                'nullable',
                'integer',
                
            ],
            'type' => [
                'nullable',
                'string',
            ],
            'subject' => [
                'nullable',
                'string',
            ],
            'notes' => [
                'nullable',
                'string',
            ],
            'interaction_date' => [
                'nullable',
                'date'],
            'created_by' => [
                'nullable',
                'integer',
            ],
        ];
    }
}
