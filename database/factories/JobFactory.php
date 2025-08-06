<?php

namespace Database\Factories;

use App\Models\Company;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Job>
 */
class JobFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => fake()->jobTitle(),
            'location' => fake()->city(),
            'description' => fake()->paragraph(10),
            'status' => fake()->randomElement(['1', '0']),
            'employment_type' => fake()->randomElement([
                'full-time', 'part-time', 'contract', 'internship', 'freelance'
            ]),
            'company_id' => Company::inRandomOrder()->first()->id,
        ];
    }
}
