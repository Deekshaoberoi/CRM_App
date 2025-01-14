<?php

namespace App\Data;

use Spatie\LaravelData\Data;

class ActivityLogData extends Data
{
    public null|optional|int $customer_id;

    public null|optional|string $type;

    public null|optional|string $subject;

    public null|optional|string $notes;

    public null|optional|datetime $interaction_date;

    public null|optional|int $created_by;
}
