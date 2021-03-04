<?php

namespace Database\Seeders;

use App\Models\Person;
use Faker\Factory;
use Illuminate\Database\Seeder;

/**
 * Class AddPerson
 * @package Database\Seeders
 */
class AddPerson extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $numberOfPeople = 0;

        while ($numberOfPeople < 30) {

            //Quick generator for names.
            $faker = Factory::create();
            $name = $faker->firstName .' '.$faker->lastName;

            Person::create(['name' => $name]);
            $numberOfPeople++;
        }

    }
}
