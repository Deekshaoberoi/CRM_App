<?php

namespace App\Data;

use Spatie\LaravelData\Data;

class LeadData extends Data
{

         public null|optional|string $lead_source;

         public null|optional|string $status;

         public null|optional|int $assigned_to;

         public null|optional|int $customer_id;
}
