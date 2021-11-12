<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Faker\Generator as Faker;

class RoomSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for ($i = 0; $i < 5; $i++) {
            DB::table('rooms')->insert([
                'name' => "red",
                'seats' => rand(10, 100),
                'rows' => rand(3, 6),
                'cols' => rand(3, 6),
            ]);
        }
    }
}
