<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ViewsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() //crea 74 record
    {
        //DB::table('views')->truncate(); //per cancellare tutti i campi della tabella views

        $faker = Faker::create();

        $startDateTime = Carbon::create(2023, 1, 1); // Data di inizio (1 gennaio 2023)
        $endDateTime = Carbon::create(2023, 12, 31); // Data di fine (31 dicembre 2023)

        $apartmentIds = range(7, 41); // Array degli ID degli appartamenti (dal 7 al 41)

        $totalViews = 80; // Numero totale di visualizzazioni desiderate per l'anno

        $viewsPerApartment = ceil($totalViews / count($apartmentIds)); // Numero di visualizzazioni per ogni appartamento (arrotondato per eccesso)

        $viewsCount = 0; // Contatore delle visualizzazioni generate

        // Ciclo per generare le visualizzazioni per ogni appartamento
        foreach ($apartmentIds as $apartmentId) {
            // Ciclo per generare le visualizzazioni per ogni appartamento fino al numero desiderato
            for ($i = 1; $i <= $viewsPerApartment; $i++) {
                $date = $faker->dateTimeBetween($startDateTime, $endDateTime); // Data casuale all'interno dell'anno

                DB::table('views')->insert([
                    'apartment_id' => $apartmentId,
                    'date' => $date->format('Y-m-d'),
                    'user_ip' => $faker->ipv4(),
                ]);

                $viewsCount++;

                // Verifica se il numero totale di visualizzazioni è stato raggiunto
                if ($viewsCount >= $totalViews) {
                    return;
                }
            }
        }
    }
}