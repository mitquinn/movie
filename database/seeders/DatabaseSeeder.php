<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(AddGenre::class);
        $this->call(AddPerson::class);
        $this->call(AddMovie::class);
        $this->call(AddRoles::class);
    }
}
