<?php

namespace App\Http\Controllers\Admin;

use App\Models\Apartment;
use App\Models\Facility;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Str;
use App\Http\Requests\StoreApartmentRequest;
use App\Http\Requests\UpdateApartmentRequest;
use Illuminate\Support\Facades\Storage;

class ApartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function index()
    {
        $facilities = Facility::all();
        $user = auth()->user();
        $apartments = $user->apartments;
        return view('admin.apartments.index', compact('apartments', 'facilities'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $apartments = Apartment::all();
        $facilities = Facility::all();
        return view('admin.apartments.create', compact('apartments', 'facilities'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreApartmentRequest $request)
    {
        $form_data = $request->validated();

        $form_data['slug'] = Str::slug($request->title, '-');
        // Serve per ricavare l'utente
        $user = auth()->user();

        if ($request->hasFile('cover_image')) {
            $path = Storage::put('cover', $request->cover_image);
            $form_data['cover_image'] = $path;
        }

        if (isset($request->available)) {
            $form_data['available'] = true;
        } else {
            $form_data['available'] = false;
        }

        if (isset($request->visible)) {
            $form_data['visible'] = true;
        } else {
            $form_data['visible'] = false;
        }

        $form_data['user_id'] = $user->id;

        $newApartment = Apartment::create($form_data);

        if ($request->has('facility_id')) {
            $facility_id = $request->input('facility_id');
            $newApartment->facilities()->attach($facility_id);
        }

        return redirect()->route('admin.apartments.index', ['apartment' => $newApartment->slug]);
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Apartment  $apartment
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = auth()->user();
        $apartment = Apartment::findOrFail($id);
        if ($apartment->user_id == $user->id) {
            return view('admin.apartments.show', compact('apartment'));
        } else {
            return view('errors.403');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Apartment  $apartment
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $facilities = Facility::All();
        $apartment = Apartment::findOrFail($id);
        $user = auth()->user();
        if ($apartment->user_id == $user->id) {
            return view('admin.apartments.edit', compact('apartment', 'facilities'));
        } else {
            return view('errors.403');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Apartment  $apartment
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateApartmentRequest $request, $id, Facility $facilities)
    {
        $apartment = Apartment::findOrFail($id);

        $form_data = $request->validated();

        $form_data['slug'] = Str::slug($request->title, '-');

        if ($request->hasFile('cover_image')) {

            if ($apartment->cover_image) {
                Storage::delete($apartment->cover_image);
            }

            $form_data['cover_image'] = Storage::put('cover', $request->cover_image);
        }

        if (isset($request->visible)) {
            $form_data['visible'] = true;
        } else {
            $form_data['visible'] = false;
        }

        if (isset($request->available)) {
            $form_data['available'] = true;
        } else {
            $form_data['available'] = false;
        }

        $apartment->facilities()->sync($request->facilities);
        $apartment->update($form_data);



        return redirect()->route('admin.apartments.show', ['apartment' => $apartment->id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Apartment  $apartment
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $apartment = Apartment::findOrFail($id);
        if ($apartment->cover_image) {
            Storage::delete($apartment->cover_image);
        }
        $apartment->delete();
        return redirect()->route('admin.apartments.index');
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



        $n = 3;
        $distance_array_shorter = array_slice($distance_array, 0, $n); //mantiene solo i primi 3 elementi dell'array $distance_array

        $apartmentIds = array_column($distance_array_shorter, 'id');

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

        return $distance; //2300 5000
    }
}