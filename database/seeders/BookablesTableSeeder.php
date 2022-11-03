<?php

use App\Bookable;

namespace Database\Seeders;

use Illuminate\Database\Seeder;


class BookablesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        //factory(Bookable::class, 100)->create();
        \App\Models\Bookable::factory()->count(100)->create();
    }
}
