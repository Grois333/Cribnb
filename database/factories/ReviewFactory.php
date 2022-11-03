<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

use Faker\Generator as Faker;
use Illuminate\Support\Str;

class ReviewFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            //
            'id' => Str::uuid(),
            'content' => $this->faker->sentences(5, true),
            'rating' => random_int(1, 5)
        ];
    }
}


// $factory->define(Review::class, function (Faker $faker) {
//     return [
//         'id' => Str::uuid(),
//         'content' => $faker->sentences(5, true),
//         'rating' => random_int(1, 5)
//     ];
// });