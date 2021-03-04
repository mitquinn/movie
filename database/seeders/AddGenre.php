<?php

namespace Database\Seeders;

use App\Models\Genre;
use Illuminate\Database\Seeder;

/**
 * Class AddGenre
 * @package Database\Seeders
 */
class AddGenre extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $genres = [
            'ACTION',
            'ADVENTURE',
            'THRILLER',
            'HORROR',
            'FANTASY',
            'ROMANCE',
            'COMEDY'
        ];

        foreach ($genres as $name) {
            Genre::create(['name' => $name]);
        }

    }
}
