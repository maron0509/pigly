<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\WeightLog;
use App\Models\WeightTarget;
use App\Models\User;

class WeightLogFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
        'user_id' => User::factory(),
        'date' => $this->faker->date(),
        'weight' => $this->faker->randomFloat(1, 50, 80),
        'calorie' => $this->faker->numberBetween(1500, 3000),
        'exercise_time' => $this->faker->time(),
        'exercise_content' => $this->faker->sentence(),
        ];
    }
}
