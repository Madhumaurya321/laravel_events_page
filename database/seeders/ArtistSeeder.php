<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use Faker\Factory as faker;
use App\Models\Artist;

class ArtistSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = faker::create();
        for($i=0;$i<10;$i++)
        {
        $a = new Artist;
        $a->name = $faker->name;
        $a->save();
        }
    }
}
