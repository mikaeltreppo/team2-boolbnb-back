<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tableFields =[
            [
                'name'=>'Irene',
                'lastname'=>'Brignoli',
                'profile_image'=>'www.example.com',
                'email'=>'irenbrignoli@example.com',
                'phone'=>'3397333733',
                'password'=>Hash::make('password')
            ],
            [
                'name'=>'Mattia',
                'lastname'=>'Moneta',
                'profile_image'=>'www.example.com',
                'email'=>'mattiamoneta@example.com',
                'phone'=>'33673337555',
                'password'=>Hash::make('password')
            ],
            [
                'name'=>'Simone',
                'lastname'=>'Carcagni',
                'profile_image'=>'www.example.com',
                'email'=>'simonecarcagni@example.com',
                'phone'=>'3357338733',
                'password'=>Hash::make('password')
            ],
            [
                'name'=>'Nicolò',
                'lastname'=>'Fossati',
                'profile_image'=>'www.example.com',
                'email'=>'nicolofossati@example.com',
                'phone'=>'34370033733',
                'password'=>Hash::make('password')
            ],
            [
                'name'=>'Mikael',
                'lastname'=>'Treppo',
                'profile_image'=>'www.example.com',
                'email'=>'mikaeltreppo@example.com',
                'phone'=>'3137003733',
                'password'=>Hash::make('password')
            ],

        ];
        foreach ($tableFields as $field){
            $newUser = new User();
            $newUser -> name = $field['name'];
            $newUser ->lastname = $field['lastname'];
            $newUser ->profile_image = $field['profile_image'];
            $newUser -> email = $field['email'];
            $newUser -> phone= $field['phone'];
            $newUser -> password= $field['password'];

            $newUser->save();
        }
    }
}
