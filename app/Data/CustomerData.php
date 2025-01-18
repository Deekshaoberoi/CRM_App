<?php

namespace App\Data;

use Spatie\LaravelData\Data;

class CustomerData extends Data
{

       public null|optional|string $name;

       public null|optional|string $email;

       public null|optional|string $phone;

       public null|optional|string $address;

       public null|optional|string $city;

       public null|optional|string $state;

       public null|optional|string $country;

       public null|optional|string $postal_code;

         public static function rules()
         {
                return [
                    'name' => [
                        'nullable',
                        'string',
                    ],
                    'email' => [
                        'nullable',
                        'string',
                    ],
                    'phone' => [
                        'nullable',
                        'string',
                    ],
                    'address' => [
                        'nullable',
                        'string',
                    ],
                    'city' => [
                        'nullable',
                        'string',
                    ],
                    'state' => [
                        'nullable',
                        'string',
                    ],
                    'country' => [
                        'nullable',
                        'string',
                    ],
                    'postal_code' => [
                        'nullable',
                        'string',
                    ],
                ];
         }
}
