<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Faker\Generator as Faker;

class ReservationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $projectionId = DB::table('projections')->pluck('id');

        for ($i = 0; $i < 10; $i++) {
            DB::table('reservations')->insert([
                'email' => $faker -> unique()-> freeEmail,
                'projection_id' => $faker->randomElement($projectionId)
            ]);
        }
    }
}
