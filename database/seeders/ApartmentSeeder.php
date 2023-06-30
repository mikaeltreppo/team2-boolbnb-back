<?php

namespace Database\Seeders;

use App\Models\Apartment;
use Faker\Provider\Lorem;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ApartmentSeeder extends Seeder
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
                'title' => 'Appartamento Bologna',
                'cover_image' => 'www.example.com',
                'price' => 1100,
                'description' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s',
                'address' => 'via dell\'Indipendenza',
                'bedrooms' => 2,
                'beds' => 3,
                'bathrooms' => 2,
                'size' => 70,
                'slug' => 'appartamento-bologna',
                'available' => true,
                'visible' => true,
                'city' => 'Città',
                'country' => 'Italia'
            ],
            [
                'title' => 'Appartamento Roma',
                'cover_image' => 'www.example.com',
                'price' => 1200,
                'description' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s',
                'address' => 'via Appia',
                'bedrooms' => 3,
                'beds' => 3,
                'bathrooms' => 2,
                'size' => 60,
                'slug' => 'appartamento-roma',
                'available' => false,
                'visible' => true,
                'city' => 'Città',
                'country' => 'Italia'
            ],
            [
                'title' => 'Appartamento Firenze',
                'cover_image' => 'www.example.com',
                'price' => 800,
                'description' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s',
                'address' => 'via del Duomo',
                'bedrooms' => 1,
                'beds' => 1,
                'bathrooms' => 1,
                'size' => 35,
                'slug' => 'appartamento-firenze',
                'available' => true,
                'visible' => true,
                'city' => 'Città',
                'country' => 'Italia'
            ],
            [
                'title' => 'Appartamento Napoli',
                'cover_image' => 'www.example.com',
                'price' => 950,
                'description' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s',
                'address' => 'via Toledo',
                'bedrooms' => 2,
                'beds' => 2,
                'bathrooms' => 1,
                'size' => 55,
                'slug' => 'appartamento-napoli',
                'available' => true,
                'visible' => true,
                'city' => 'Città',
                'country' => 'Italia'
            ],
            [
                'title' => 'Appartamento Torino',
                'cover_image' => 'www.example.com',
                'price' => 900,
                'description' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s',
                'address' => 'via Po',
                'bedrooms' => 1,
                'beds' => 1,
                'bathrooms' => 1,
                'size' => 40,
                'slug' => 'appartamento-torino',
                'available' => false,
                'visible' => true,
                'city' => 'Città',
                'country' => 'Italia'
            ], 
            [
                'title' => 'Appartamento Verona',
                'cover_image' => 'www.example.com',
                'price' => 850,
                'description' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s',
                'address' => 'via Capello',
                'bedrooms' => 1,
                'beds' => 2,
                'bathrooms' => 1,
                'size' => 50,
                'slug' => 'appartamento-verona',
                'available' => true,
                'visible' => true,
                'city' => 'Città',
                'country' => 'Italia'
            ]            
        ];
        

        foreach ($tableFields as $field) {
            $newApartment = new Apartment();
            $newApartment->title = $field['title'];
            $newApartment->price = $field['price'];
            $newApartment->cover_image = $field['cover_image'];
            $newApartment->description = $field['description'];
            $newApartment->address = $field['address'];
            $newApartment->bedrooms = $field['bedrooms'];
            $newApartment->beds = $field['beds'];
            $newApartment->bathrooms = $field['bathrooms'];
            $newApartment->size_m2 = $field['size'];
            $newApartment->slug = $field['slug'];
            $newApartment->available = $field['available'];
            $newApartment->visible = $field['visible'];
            $newApartment->city = $field['city'];
            $newApartment->country = $field['country'];
        
            $newApartment->save();
        }
        
    }
}

