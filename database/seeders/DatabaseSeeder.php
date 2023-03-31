<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;
use App\Models\Country;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        Schema::disableForeignKeyConstraints();
            Country::truncate();
        Schema::enableForeignKeyConstraints();
        $this->call([
            CountrySeeder::class,
            UserSeeder::class
        ]);
    }
}
