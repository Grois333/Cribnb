<?php


namespace Database\Factories;

use App\Models\Bookable;
//use App\Bookable;
use Faker\Generator as Faker;
use Illuminate\Support\Arr;

use Illuminate\Database\Eloquent\Factories\Factory;


class BookableFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $suffix = [
            'Villa',
            'House',
            'Cottage',
            'Luxury Villas',
            'Cheap House',
            'Rooms',
            'Cheap Rooms',
            'Luxury Rooms',
            'Fancy Rooms'
        ];
        return [
            'title' => $this->faker->city . ' ' . Arr::random($suffix),
            'description' => $this->faker->text(),
            'price' => $this->faker->numberBetween(15, 600)
        ];
    }
}





// $factory->define(Bookable::class, function (Faker $faker) use ($suffix) {
//     return [
//         'title' => $faker->city . ' ' . Arr::random($suffix),
//         'description' => $faker->text(),
//         'price' => random_int(15, 600)
//     ];
// });
