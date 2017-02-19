<?php

use Illuminate\Database\Seeder;
use Faker\factory as Faker;



class PostTableSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {

        $faker = Faker::create('\App\Post');

        for ($i = 0; $i < 15; $i++) {


            DB::table('posts')->insert([
                'name' => $faker->company,
                'content' => $faker->text(400),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now(),
            ]);
        }
    }

}
