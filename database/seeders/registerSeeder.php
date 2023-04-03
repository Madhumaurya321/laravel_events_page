<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Faker\Factory as faker;


class registerSeeder extends Seeder
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
        for($i=0;$i<3;$i++)
        {
        $u = new User;
        $u->name = $faker->name;
        $u->email = $faker->email;
        $pwd = $faker->password;
         $u->password = Hash::make($pwd);
         $u->confirm_password = $pwd;
       // $u->password = $faker->password;
        $u->save();
        }
    }
}
