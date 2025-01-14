<?php

namespace Database\Factories;

use App\Models\Note;
use Illuminate\Database\Eloquent\Factories\Factory;

class NoteFactory extends Factory
{
    protected $model = Note::class;

    public function definition(): array
    {
       return [
        'related_to' => $this->faker->randomElement(['Customer', 'Lead', 'Opportunity']),
        'content' => $this->faker->paragraph,
        'user_id' => User::factory(),
        'created_by' => $this->faker->numberBetween(1, 10),
       ];
    }
}