<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Factory as faker;
use App\Models\Event;
class EventSeeder extends Seeder
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
        $e = new Event;
        $e->title = $faker->sentence;
        $e->img = "event1.jpg";
        $e->genere_id = mt_rand(1,9);
        $e->artist_id = mt_rand(1,9);
        $e->desc = $faker->text;
        $e->amt = $faker->numerify('##########'); 
        $e->dt =$faker->date;
        $e->venue_id = mt_rand(1,9);
       // $u->password = $faker->password;
        $e->save();
        }
    }
}
