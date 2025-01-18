<?php

namespace App\Data;

use Spatie\LaravelData\Data;

class EmailData extends Data
{
    public null|optional|string $to;

    public null|optional|string $cc;

    public null|optional|string $bcc;

    public static function rules()
    {
        return [
            'to' => [
                'required',
                'email',
            ],
            'cc' => [
                'nullable',
                'email',
            ],
            'bcc' => [
                'nullable',
                'email',
            ],
        ];
    }
}
