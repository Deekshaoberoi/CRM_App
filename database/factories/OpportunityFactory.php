<?php

namespace Database\Factories;

use App\Models\Opportunity;
use Illuminate\Database\Eloquent\Factories\Factory;

class OpportunityFactory extends Factory
{
    protected $model = Opportunity::class;

    public function definition(): array
    {
        return [
            'customer_id' => $this->faker->numberBetween(1, 10),
            'name' => $this->faker->word,
            'stage' => $this->faker->randomElement(['Prospecting', 'Negotiation', 'Closed Won', 'Closed Lost']),
            'expected_revenue' => $this->faker->randomFloat(2, 1000, 10000),
            'close_date' => $this->faker->dateTimeThisMonth(),
            'assigned_to' => $this->faker->numberBetween(1, 10),
        ];
    }
}