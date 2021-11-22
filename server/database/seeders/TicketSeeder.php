<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Faker\Generator as Faker;

class TicketSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $reservationId = DB::table('reservations')->pluck('id');

        for ($i = 0; $i < 10; $i++) {
            DB::table('tickets')->insert([
                'row' => rand(3, 6),
                'col' => rand(3, 6),
                'reservation_id' => $faker->randomElement($reservationId)
            ]);
        }
    }
}
