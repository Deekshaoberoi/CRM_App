<?php

namespace Database\Factories;

use App\Models\EmailCampaign;
use Illuminate\Database\Eloquent\Factories\Factory;

class EmailCampaignFactory extends Factory
{
    protected $model = EmailCampaign::class;

    public function definition(): array
    {
        return [
            'name' => $this->faker->name,
            'subject' => $this->faker->sentence,
            'content' => $this->faker->paragraph,
            'status' => $this->faker->randomElement(['draft', 'sent', 'scheduled']),
            'scheduled_date' => $this->faker->dateTimeBetween('now', '+1 year'),
            'created_by' => 1,
        ];
    }
}