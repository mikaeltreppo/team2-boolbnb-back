<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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

        $this->call(ApartmentSeeder::class);
        $this->call(FacilitySeeder::class);
        $this->call(MessageSeeder::class);
        $this->call(SponsorshipSeeder::class);
        $this->call(ViewSeeder::class);

    }
}
