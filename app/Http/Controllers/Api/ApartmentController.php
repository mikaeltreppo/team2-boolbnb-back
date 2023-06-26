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

    public function show($id)
    {
        $apartments = Apartment::where('id', $id)->with(['facilities', 'sponsorships', 'user', 'messages'])->first();
        return response()->json(
            [
                'success' => true,
                'results' => $apartments,
            ]
        );
    }




    /*  Metodo di ricerca degli appartamenti entro il raggio selezionato  */
    public function search($latitude, $longitude, $radius, $price, $beds, $m2, $rooms, $bathrooms)
    {
        //prende tutti gli appartamenti del DB
        $apartments = Apartment::All();

        //array di oggetti vuoto per salvare l'id dell'appartamento e la distanza dalla coordinata dell'input
        $distanceArray = [];

        //cicla ogni appartamento del database per calcolare la distanza di ognuno dalla coordinata dell'input
        foreach ($apartments as $apartment) {
            $apartmentLatitude = $apartment->latitude;
            $apartmentLongitude = $apartment->longitude;

            //metodo preso da internet per la distanza tra due coordinate terrestri
            $distance = $this->calculateDistance($latitude, $longitude, $apartmentLatitude, $apartmentLongitude);

            //aggiunge un oggetto a $distance_array con l'id dell'appartamento e la distanza dall'input del form
            $distanceArray[] = ['id' => $apartment->id, 'distance' => $distance];
        }

        //$distance_array è stato ordinato per distanza crescente
        usort($distanceArray, function ($a, $b) {
            return $a['distance'] - $b['distance'];
        });

        //viene creato un nuovo array che filtra tutti gli appartamenti che rientrano nel raggio richiesto
        $distanceFilteredByRadius = array_filter($distanceArray, function ($object) use ($radius) {
            return $object['distance'] <= $radius;
        });

        //crea un nuovo array in cui vengono salvati SOLO gli ID degli appartamenti che rientrano nel raggio
        $apartmentIds = array_column($distanceFilteredByRadius, 'id');

        foreach ($apartments as $apartment) {
            if (in_array($apartment->id, $apartmentIds)) {
                /* Faccio diversi check, se almeno uno di essi è true allora l'appartamento sarà da rimuovere */
                $priceCheck = $apartment->price > $price;
                $bedsCheck = $apartment->beds < $beds;
                $m2Check = $apartment->size_m2 < $m2;
                $roomsCheck = $apartment->bedrooms < $rooms;
                $bathroomsCheck = $apartment->bathrooms < $bathrooms;
                $facilitiesCheck = "";
                if ($priceCheck || $bedsCheck || $m2Check || $roomsCheck || $bathroomsCheck) { //entra se anche solo uno è true
                    $apartmentIdIndex = array_search($apartment->id, $apartmentIds); //è l'indice dell'appartamento in apartmentIds
                    unset($apartmentIds[$apartmentIdIndex]); //rimuovo l'elemento all'indice $apartmentIdIndex in $apartmentIds
                }
            }
        }

        /*viene fatta la richiesta degli appartamenti del database restituendo tutti quelli con l'id dell'array 
        apartmentIds legando anche le tabelle facilities, sponsorship, user e messages*/
        $results = Apartment::whereIn('id', $apartmentIds)->with(['facilities', 'sponsorships', 'user', 'messages'])->paginate(6);


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