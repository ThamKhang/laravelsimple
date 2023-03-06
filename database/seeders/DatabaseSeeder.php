<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Books;
use App\Models\Classs;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        foreach (['Excellent', 'Good', 'Average'] as $quality) {
            Classs::create([
                'quality' => $quality
            ]);
        }
        $faker = \Faker\Factory::create();
        for ($i = 0; $i < 30; $i++) {
            $gender = $faker->randomElement($array = array('male', 'female'));
            $id_class = $faker->randomElement($array = array(1, 2, 3));
            Books::create([
                'name' => $faker->sentence,
                'author' => $faker->name,
                'gender' => $gender,
                'id_class' => $id_class,
            ]);
        }
    }
}
