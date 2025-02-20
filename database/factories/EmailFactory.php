<?php

namespace Database\Factories;

use App\Models\Email;
use Illuminate\Database\Eloquent\Factories\Factory;

class EmailFactory extends Factory
{
    protected $model = Email::class;

    public function definition()
    {
        return [
            'to' => $this->faker->email,
            'cc' => $this->faker->email,
            'bcc' => $this->faker->email,
        ];
    }
}
