<?php

namespace Database\Factories;

use App\Models\Task;
use Illuminate\Database\Eloquent\Factories\Factory;

class TaskFactory extends Factory
{
    protected $model = Task::class;

    public function definition(): array
    {
        return [
            'name' => $this->faker->name,
            'description' => $this->faker->paragraph,
            'due_date' => $this->faker->dateTimeBetween('now', '+1 year'),
            'status' => $this->faker->randomElement(['Pending', 'In Progress', 'Completed']),
            'assigned_to' => $this->faker->numberBetween(1, 10),
            'related_to' => $this->faker->randomElement(['Customer', 'Lead', 'Opportunity']),
            'related_id' => $this->faker->numberBetween(1, 10),
        ];
    }
}