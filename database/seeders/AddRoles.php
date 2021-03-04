<?php

namespace Database\Seeders;

use App\Models\Movie;
use App\Models\Person;
use App\Models\Role;
use Illuminate\Database\Seeder;

/**
 * Class AddRoles
 * @package Database\Seeders
 */
class AddRoles extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $numberOfRoles = 0;

        $types = [
            'actor',
            'actress',
            'director',
            'producer',
            'extra'
        ];

        while ($numberOfRoles < 200) {

            /** @var Person $person */
            $person = Person::inRandomOrder()->first();

            /** @var Movie $movie */
            $movie = Movie::inRandomOrder()->first();

            $type = $types[array_rand($types)];


            Role::create([
                'type' => $type,
                'movie_id' => $movie->getId(),
                'people_id' => $person->getId()
            ]);

            $numberOfRoles++;
        }


    }
}
