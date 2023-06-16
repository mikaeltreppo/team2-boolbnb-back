<?php

namespace Database\Seeders;

use App\Models\Sponsorship;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SponsorshipSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tableFields = [
            [
                'name' => 'Bronze',
                'price' => 2.99,
                'duration' => 24
            ],
            [
                'name' => 'Silver',
                'price' => 5.99,
                'duration' => 72
            ],
            [
                'name' => 'Gold',
                'price' => 9.99,
                'duration' => 144
            ]
        ];
        foreach ($tableFields as $field) {
            $newSponsorship = new Sponsorship();
            $newSponsorship->name = $field['name'];
            $newSponsorship->price = $field['price'];
            $newSponsorship->duration = $field['duration'];

            $newSponsorship->save();
        }
    }
}