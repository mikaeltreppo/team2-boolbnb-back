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
    public function search($lat, $lon, $radius)
    {
        //prende tutti gli appartamenti del DB
        $apartments = Apartment::with(['facilities', 'sponsorships', 'user'])->paginate(6);


        // Restituisci i risultati come risposta JSON
        return response()->json([
            'success' => true,
            'results' => $apartments
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