<?php

namespace Database\Seeders;

use App\Models\Company;
use App\Models\FlightReview;
use Illuminate\Database\Seeder;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        User::factory(10)->create();
        Company::factory(10)->create();
        FlightReview::factory(10)->create();
    }
}
