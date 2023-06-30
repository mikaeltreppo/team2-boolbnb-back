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

    public function all_sponsorized()
    {
        $sponsorized = Apartment::with(['sponsorships'])->get();
        $sponsoredIds = [];

        // Filtra gli appartamenti sponsorizzati e li mette in sponsoredIds
        foreach ($sponsorized as $apartment) {
            // Verifica se ci sono sponsorizzazioni attive
            $sponsorships = $apartment->sponsorships;
            $activeSponsorship = $sponsorships->first(function ($sponsorship) { //trova la prima sponsorizzazione attiva
                return $sponsorship->pivot->start_date <= now() && $sponsorship->pivot->expired_at >= now();
            });

            if ($apartment->visible) { // se l'appartamento non è visibile non mostrarmelo 
                if ($activeSponsorship) {
                    // Aggiungi l'ID dell'appartamento sponsorizzato all'array sponsoredIds
                    $sponsoredIds[] = $apartment->id;
                }
            }
        }

        $results = Apartment::whereIn('id', $sponsoredIds)->with(['facilities', 'sponsorships', 'user'])->paginate(4);

        return response()->json([
            'success' => true,
            'date' => now(),
            'results' => $results
        ]);
    }


    /*  Metodo di ricerca degli appartamenti entro il raggio selezionato  */
    public function search($latitude, $longitude, $radius, $price, $beds, $meters, $rooms, $bathrooms, $available, $wifi, $car, $pool, $door, $sauna, $water)
    {

        //i valori passati sono inizialmente tutte stringhe, qui li trasforma in int, float, boolean effettivi
        $latitude = floatval($latitude);
        $longitude = floatval($longitude);
        $radius = intval($radius);
        $price = floatval($price);
        $beds = intval($beds);
        $meters = intval($meters);
        $rooms = intval($rooms);
        $bathrooms = intval($bathrooms);
        $available = ($available === "true") ? true : false;
        $wifi = ($wifi === "true") ? true : false;
        $car = ($car === "true") ? true : false;
        $pool = ($pool === "true") ? true : false;
        $door = ($door === "true") ? true : false;
        $sauna = ($sauna === "true") ? true : false;
        $water = ($water === "true") ? true : false;
        //prende tutti gli appartamenti del DB
        $apartments = Apartment::with('facilities')->get();

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
                /* Faccio diversi check, se almeno uno di essi è true allora l'appartamento sarà da rimuovere*/

                if ($apartment->visible) { //se visibile in DB
                    $visibleCheck = false; //passa al controllo
                } else {
                    $visibleCheck = true;
                }


                $priceCheck;
                if ($price == 0 || $price == null) {
                    $priceCheck = false;
                } else {
                    $priceCheck = $apartment->price > $price;
                }
                $bedsCheck = $apartment->beds < $beds;
                $m2Check = $apartment->size_m2 < $meters;
                $roomsCheck = $apartment->bedrooms < $rooms;
                $bathroomsCheck = $apartment->bathrooms < $bathrooms;


                $availableCheck = false;
                if ($available) { //"disponibile" spuntato, rimuovi l'appartmento se non è disponibile in DB
                    if (!$apartment->available) { // se non è dispobile
                        $availableCheck = true; //dopo lo rimuovi
                    }
                }

                //inizializzo i check dei servizi a false perchè di base devono passare tutti
                $wifiCheck = false;
                $carCheck = false;
                $poolCheck = false;
                $doorCheck = false;
                $saunaCheck = false;
                $waterCheck = false;

                $facilities = $apartment->facilities; //prende l'array di oggetti dei facilities dell'appartamento

                $facilityIds = []; //qui salverò solo gli id dei facilities tramite il foreach sotto
                foreach ($facilities as $facility) {
                    $facilityIds[] = $facility['id'];
                }

                if ($wifi) { //wifi spuntato, quindi controllo se l'appartamento ha il wifi
                    if (!in_array(1, $facilityIds)) { //se l'id del facility "wifi" non è presente nell'appartamento entra
                        $wifiCheck = true; // allora set check a true, (ovvero filtra e rimuovi quell'appartamento)
                    }
                } //esegue lo stesso passaggio per tutti
                if ($car) {
                    if (!in_array(2, $facilityIds)) {
                        $carCheck = true;
                    }
                }
                if ($pool) {
                    if (!in_array(3, $facilityIds)) {
                        $poolCheck = true;
                    }
                }
                if ($door) {
                    if (!in_array(4, $facilityIds)) {
                        $doorCheck = true;
                    }
                }
                if ($sauna) {
                    if (!in_array(5, $facilityIds)) {
                        $saunaCheck = true;
                    }
                }
                if ($water) {
                    if (!in_array(6, $facilityIds)) {
                        $waterCheck = true;
                    }
                }

                if ($visibleCheck || $priceCheck || $bedsCheck || $m2Check || $roomsCheck || $bathroomsCheck || $availableCheck || $wifiCheck || $carCheck || $poolCheck || $doorCheck || $saunaCheck || $waterCheck) { //entra se anche solo uno è true
                    $apartmentIdIndex = array_search($apartment->id, $apartmentIds); //è l'indice dell'appartamento in apartmentIds
                    array_splice($apartmentIds, $apartmentIdIndex, 1); //rimuovo l'elemento all'indice $apartmentIdIndex in $apartmentIds
                }
            }
        }


        //ORDINAMENTO PER SPONSORIZZAZIONE////////////////

        /* Voglio ordinare prima per gli sponsorizzati e poi per ordine di distanza*/
        $idsString = implode(',', $apartmentIds);

        // Ottieni gli appartamenti in base agli ID specificati nell'ordine desiderato
        $apartmentsFiltered = Apartment::whereIn('id', $apartmentIds)->with(['sponsorships'])->orderByRaw("FIELD(id, $idsString)")->get();

        // Crea un array per tenere traccia degli id degli appartamenti sponsorizzati
        $sponsoredIds = [];

        // Filtra gli appartamenti sponsorizzati e spostali all'inizio dell'array $apartmentIds
        foreach ($apartmentsFiltered as $apartment) {

            // Verifica se ci sono sponsorizzazioni attive
            $sponsorships = $apartment->sponsorships;
            $activeSponsorship = $sponsorships->first(function ($sponsorship) {
                return $sponsorship->pivot->start_date <= now() && $sponsorship->pivot->expired_at >= now();
            });
            if ($activeSponsorship) {
                // Aggiungi l'ID dell'appartamento sponsorizzato all'array sponsoredIds
                $sponsoredIds[] = $apartment->id;

                // Rimuovi l'appartamento sponsorizzato dall'array apartmentIds
                $index = array_search($apartment->id, $apartmentIds);
                if ($index !== false) {
                    unset($apartmentIds[$index]);
                }
            }
        }

        // Unisci gli ID degli appartamenti sponsorizzati all'inizio dell'array apartmentIds
        $orderedApartmentIds = array_merge($sponsoredIds, $apartmentIds);

        // FINE ORDINAMENTO PER SPONSORIZZAZIONE////////////////




        /*viene fatta la richiesta degli appartamenti del database restituendo tutti quelli con l'id dell'array 
        apartmentIds legando anche le tabelle facilities, sponsorship, user e messages*/
        $idsString = implode(',', $orderedApartmentIds);
        

        $results = Apartment::whereIn('id', $orderedApartmentIds)->with(['facilities', 'sponsorships', 'user', 'messages'])->orderByRaw("FIELD(id, $idsString)")->paginate(20);
   


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