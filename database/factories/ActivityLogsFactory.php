<?php

namespace Database\Factories;

use App\Models\ActivityLogs;
use Illuminate\Database\Eloquent\Factories\Factory;

class ActivityLogsFactory extends Factory
{
    protected $model = ActivityLogs::class;

    public function definition()
    {
        return [
            'user_id' => $this->faker->numberBetween(1, 10),
            'action' => $this->faker->word,
            'details' => $this->faker->sentence,
        ];
    }
}