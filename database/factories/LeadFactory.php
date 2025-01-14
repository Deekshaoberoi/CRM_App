<?php 

namespace Database\Factories;

use App\Model\Lead;
use Illuminate\Database\Eloquent\Factories\Factory;

class LeadFactory extends Factory
{
    protected $model = Lead::class;

    public function definition(): array
    {
       return [
            'customer_id' => $this->faker->numberBetween(1, 10),
            'lead_source' => $this->faker->word,
            'status' => $this->faker->randomElement(['New', 'Contacted', 'Qualified', 'Lost']),
            'assigned_to' => $this->faker->numberBetween(1, 10),
        ];
    }
}