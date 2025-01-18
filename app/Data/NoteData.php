<?php

namespace App\Data;

use Spatie\LaravelData\Data;

class NoteData extends Data
{
    public null|optional|string $related_to;

    public null|optional|int $related_id;

    public null|optional|string $content;

    public null|optional|int $created_by;

    public static function rules()
    {
        return [
            'related_to' => [
                'nullable',
                'string',
            ],
            'related_id' => [
                'nullable',
                'integer',
            ],
            'content' => [
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
