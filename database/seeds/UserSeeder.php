<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();
        for ($i = 0; $i < 10; $i++){
            $user = [
                'email' => $faker->unique()->email,
                'phone' => $faker->unique()->phoneNumber,
                'address' => $faker->address,
                'password' => bcrypt('secret'),
                'remember_token' => str_random(10),
                'created_at' => new Carbon,
                'updated_at' => new Carbon,
            ];
            if ($i<5) {
                $user['name'] = $faker->company;
            } else {
                $user['name'] = $faker->name;
            }
            $id = \DB::table('users')->insertGetId($user);
            if ($i < 5) {
                \DB::table('companies')->insert([
                    'id' => $id,
                    'points' => 100,
                    'created_at' => new Carbon,
                    'updated_at' => new Carbon,
                ]);
            } else {
                \DB::table('respondents')->insert([
                    'id' => $id,
                    'birth_day' => $faker->dateTimeBetween('-30 years', '-20 years'),
                    'sex' => 'Male',
                    'points' => 50,
                    'profession' => $faker->jobTitle,
                    'created_at' => new Carbon,
                    'updated_at' => new Carbon,
                ]);
            }
        }
    }
}
