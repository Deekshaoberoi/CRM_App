<?php

namespace App\Data;

use Spatie\LaravelData\Data;

class EmailCampaignData extends Data
{
    public null|optional|string $name;

    public null|optional|string $subject;

    public null|optional|string $content;

    public null|optional|datetime $send_date;

    public null|optional|string $status;

    public null|optional|int $created_by;

    public static function rules()
    {
        return [
            'name' => [
                'nullable',
                'string',
            ],
            'subject' => [
                'nullable',
                'string',
            ],
            'content' => [
                'nullable',
                'string',
            ],
            'send_date' => [
                'nullable',
                'date'],
            'status' => [
                'nullable',
                'string',
            ],
            'created_by' => [
                'nullable',
                'integer',
            ],
        ];
    }
}
