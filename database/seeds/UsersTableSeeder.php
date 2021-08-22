<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;


class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('users')->insert([
        'name' => 'samer',
        'password' => '$2y$10$.GsVm42RmVRHwF6xmLloW./oW9YV6uUaHFaY1uWKtAoPbpKm67FGO',
        'firstName' => 'Samer',
        'lastName' => 'Tahan',
        'DOB' => '2021-08-18',
        'email' => 'rami222@admin.com',
      ]);

      $faker = Faker::create();
    	foreach (range(1,10) as $index) {
	        DB::table('users')->insert([
	            'name' => $faker->name,
	            'password' => bcrypt('secret'),
              'firstName' => $faker->name,
              'lastName' => $faker->lastName,
              'DOB' => $faker->date($format = 'Y-m-d', $max = 'now'),
              'email' => $faker->email,
	        ]);
	}
      
        
    }
}
