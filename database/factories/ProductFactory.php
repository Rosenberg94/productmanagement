<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => Str::random(10),
            'code' => mt_rand(1, 999),
            'statement' => mt_rand(0, 1),
            'price' => $this->faker->randomFloat($nbMaxDecimals = NULL, $min = 0, $max = 3000),
            'manufacturer_id' => mt_rand(1, 10),
            'amount' => mt_rand(1, 10000),
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    public function unverified()
    {
        return $this->state(function (array $attributes) {
            return [
                'email_verified_at' => null,
            ];
        });
    }
}

