<?php

use Illuminate\Database\Seeder;

class UserDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         // Create a faker instance
         $faker = Faker\Factory::create();

         \App\User::create([
             'name' => $faker->name,
             'email' => env('ADMIN_EMAIL'),
             'user_type' => 1,
             'email_verified_at' => \Carbon\Carbon::now(),
             'password' => Hash::make(env('DEFAULT_PASSWORD'))
         ]);
 
         \App\User::create([
             'name' => $faker->name,
             'email' => env('MEMBER_EMAIL'),
             'user_type' => 2,
             'email_verified_at' => \Carbon\Carbon::now(),
             'password' => Hash::make(env('DEFAULT_PASSWORD'))
         ]);
 
         \App\User::create([
             'name' => $faker->name,
             'email' => env('STUDENT_EMAIL'),
             'user_type' => 3,
             'email_verified_at' => \Carbon\Carbon::now(),
             'password' => Hash::make(env('DEFAULT_PASSWORD'))
         ]);
    }
}
