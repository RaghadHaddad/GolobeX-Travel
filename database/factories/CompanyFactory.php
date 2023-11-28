<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class CompanyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'companyName' => $this->faker->name(),
            'companyImage' => $this->faker->imageUrl(640,480),
            'Address' => $this->faker->address(),
            'like' => 0,

        ];
    }
}
