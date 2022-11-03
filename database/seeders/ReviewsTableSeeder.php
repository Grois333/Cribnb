<?php

//use App\Models\Review;
//use App\Review;
namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ReviewsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        \App\Models\Bookable::all()->each(function (\App\Models\Bookable $bookable) {
            //$reviews = factory(\App\Models\Review::class, random_int(5, 30))->make();
            $reviews = \App\Models\Review::factory()->count(rand(5, 30))->make();
            $bookable->reviews()->saveMany($reviews);
        });
    }
}
