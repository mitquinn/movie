<?php

namespace Database\Seeders;

use App\Models\Genre;
use App\Models\Movie;
use Faker\Factory;
use Illuminate\Database\Seeder;

/**
 * Class AddMovie
 * @package Database\Seeders
 */
class AddMovie extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $numberOfMovies = 0;

        while ($numberOfMovies < 100) {

            $faker = Factory::create();
            $title = $faker->word;
            $runtime = $faker->numberBetween(1, 240);

            /** @var Movie $movie */
            $movie = Movie::create([
               'title' => $title,
               'runtime' => $runtime
            ]);


            //Random number of Genre
            $numberOfGenre = $faker->numberBetween(1,2);

            /** @var Genre[] $randomGenres */
            $randomGenres = Genre::inRandomOrder()->limit($numberOfGenre)->get();

            $movie->genres()->attach($randomGenres);

            $numberOfMovies++;
        }
    }
}
