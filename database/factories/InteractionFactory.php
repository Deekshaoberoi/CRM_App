<?php

namespace Database\Factories;

use App\Models\Interaction;
use Illuminate\Database\Eloquent\Factories\Factory;

class InteractionFactory extends Factory
{
    protected $model = Interaction::class;

    public function definition(): array
    {
        return [
            'customer_id' => $this->faker->numberBetween(1, 100),
            'opportunity_id' => $this->faker->numberBetween(1, 100),
            'lead_id' => $this->faker->numberBetween(1, 100),
            'type' => $this->faker->word,
            'subject' => $this->faker->sentence,
            'description' => $this->faker->paragraph,
            'assigned_to' => $this->faker->numberBetween(1, 100),
        ];
    }
}
