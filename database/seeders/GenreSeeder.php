<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Factory as faker;
use App\Models\Genre;

class GenreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $faker = faker::create();
        for($i=0;$i<10;$i++)
        {
        $g = new Genre;
        $g->name = $faker->name;
        $g->save();
        }
    }
}
