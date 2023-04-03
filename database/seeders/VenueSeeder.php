<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Factory as faker;
use App\Models\Venue;
class VenueSeeder extends Seeder
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
        $v = new Venue;
        $v->name = $faker->name;
        $v->cnct = $faker->numerify('##########');
        $v->addr = $faker->address;
        $v->save();
        }
    }
}
