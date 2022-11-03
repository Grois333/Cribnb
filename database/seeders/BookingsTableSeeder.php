<?php

//use App\Bookable;
//use App\Models\Bookable;
//use App\Models\Booking;

namespace Database\Seeders;

use Illuminate\Database\Seeder;

//use App\Models\Booking;

class BookingsTableSeeder extends Seeder
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
            $booking = \App\Models\Booking::factory()->make();
            $bookings = collect([$booking]);

            for ($i = 0; $i < random_int(1, 20); $i++) {
                $from = (clone $booking->to)->addDays(random_int(1, 14));
                $to = (clone $from)->addDays(random_int(0, 14));

                $booking = \App\Models\Booking::make([
                    'from' => $from,
                    'to' => $to,
                    'price' => random_int(200, 5000)
                ]);
                $bookings->push($booking);
            }

            $bookable->bookings()->saveMany($bookings);
        });
    }
}
