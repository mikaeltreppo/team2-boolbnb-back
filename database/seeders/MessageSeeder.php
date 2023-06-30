<?php

namespace Database\Seeders;

use App\Models\Message;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;


class MessageSeeder extends Seeder
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
                'name' => 'Pippo',
                'email' => 'pippo@pluto.com',
                'message' => 'ciao sono cicciobello'
            ]
        ];
        foreach ($tableFields as $field){
            $newMessage = new Message();
            $newMessage -> name = $field['name'];
            $newMessage -> email = $field['email'];
            $newMessage -> message = $field['message'];

            $newMessage->save();
        }
    }
}