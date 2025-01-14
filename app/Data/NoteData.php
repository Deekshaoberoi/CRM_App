<?php

namespace App\Data;

use Spatie\LaravelData\Data;

class NoteData extends Data
{
    public null|optional|string $related_to;

    public null|optional|int $related_id;

    public null|optional|string $content;

    public null|optional|int $created_by;
}
