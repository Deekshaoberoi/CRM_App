<?php

namespace Database\Factories;

use App\Models\Ticket;
use Illuminate\Database\Eloquent\Factories\Factory;

class TicketFactory extends Factory
{
    protected $model = Ticket::class;

    public function definition(): array
    {
        return [
            'title' => $this->faker->sentence,
            'description' => $this->faker->paragraph,
            'status' => $this->faker->randomElement(['Open', 'Closed']),
            'priority' => $this->faker->randomElement(['Low', 'Medium', 'High']),
            'assigned_to' => $this->faker->numberBetween(1, 10),
            'created_by' => $this->faker->numberBetween(1, 10),
        ];
    }
}