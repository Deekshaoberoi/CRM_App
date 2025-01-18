<?php

namespace App\Data;

use Spatie\LaravelData\Data;

class UserData extends Data
{

       public null|optional|string $name;

       public null|optional|string $email;

       public null|optional|string $password;

       public null|optional|string $phone;

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
                  'password' => [
                      'nullable',
                      'string',
                  ],
                  'phone' => [
                      'nullable',
                      'string',
                  ],
              ];
       }

}



