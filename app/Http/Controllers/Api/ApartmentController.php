<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Apartment;
use Illuminate\Http\Request;

class ApartmentController extends Controller
{
    public function index()
    {

        $apartments = Apartment::with(['facilities', 'sponsorships', 'user', 'messages'])->paginate(6);

        return response()->json([
            'success' => true,
            'results' => $apartments,
        ]);
    }

    public function search($latitude, $longitude, $radius) //ricerca sul title dell'appartamento
    {
        $apartments = Apartment::All();
        $distance_array = [];


        foreach ($apartments as $apartment) {
            $apartmentLatitude = $apartment->latitude;
            $apartmentLongitude = $apartment->longitude;
            $distance = $this->calculateDistance($latitude, $longitude, $apartmentLatitude, $apartmentLongitude);
            $distance_array[] = ['id' => $apartment->id, 'distance' => $distance]; //aggiunge un oggetto a $distance_array con l'id dell'appartamento e la distanza dall'input del form
        }

        usort($distance_array, function ($a, $b) { //$distance_array è stato ordinato per distanza crescente
            return $a['distance'] - $b['distance'];
        });



        $distanceFilteredByRadius = array_filter($distance_array, function ($object) use ($radius) {
            return $object['distance'] <= $radius;
        });



        /*
        $n = 4;
        $distance_array_shorter = array_slice($distance_array, 0, $n); //mantiene solo i primi 3 elementi dell'array $distance_array
        */

        $apartmentIds = array_column($distanceFilteredByRadius, 'id');

        $results = Apartment::whereIn('id', $apartmentIds)->paginate(6);


        // Restituisci i risultati come risposta JSON
        return response()->json([
            'success' => true,
            'results' => $results
        ]);
    }

    //calcola la distanza tra due coordinate tenendo conto della curvatura della terra
    function calculateDistance($lat1, $lon1, $lat2, $lon2)
    {
        $earthRadius = 6371; // Raggio della Terra in chilometri

        $dLat = deg2rad($lat2 - $lat1);
        $dLon = deg2rad($lon2 - $lon1);

        $a = sin($dLat / 2) * sin($dLat / 2) + cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * sin($dLon / 2) * sin($dLon / 2);
        $c = 2 * atan2(sqrt($a), sqrt(1 - $a));

        $distance = $earthRadius * $c;

        return $distance * 1000; //restituisce la distanza in metri
    }
}
;