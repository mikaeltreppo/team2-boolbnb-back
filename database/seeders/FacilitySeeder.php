<?php

namespace Database\Seeders;

use App\Models\Facility;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FacilitySeeder extends Seeder
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
                'name' => 'Wi-Fi',
                'icon' => 'fa-solid fa-wifi'
            ],
              [
                'name' => 'Posto Macchina',
                'icon' => 'fa-solid fa-car'
            ],
              [
                'name' => 'Piscina',
                'icon' => 'fa-solid fa-water-ladder'
            ],
              [
                'name' => 'Portineria',
                'icon' => 'fa-solid fa-door-open'
            ],
              [
                'name' => 'Sauna',
                'icon' => 'fa-solid fa-hot-tub-person'
            ],
              [
                'name' => 'Vista Mare',
                'icon' => 'fa-solid fa-water'
            ]
        ];
        foreach ($tableFields as $field){
            $newFacility = new Facility();
            $newFacility ->name= $field['name'];
            $newFacility ->icon= $field['icon'];
            $newFacility->save();
        }
        }
}
