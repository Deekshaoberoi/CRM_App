<?php

namespace App\Data;

use Spatie\LaravelData\Data;

class TeamData extends Data
{
    public null|optional|string $name;

    public static function rules()
    {
        return [
            'name' => [
                'nullable',
                'string',
            ],
        ];
    }
}
