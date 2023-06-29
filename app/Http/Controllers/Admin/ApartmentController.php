<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Support\Facades\Http;
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


    public function index()
    {
        $facilities = Facility::all();
        $user = auth()->user();
        $apartments = $user->apartments;


        foreach($apartments as $apartment){

            $data = Http::withOptions(['verify' => false])->get('https://api.tomtom.com/search/2/reverseGeocode/'. $apartment->latitude .','. $apartment->longitude .'.json?key=ZPskuspkrrcmchd9ut4twltuw96h5bWH');
            $responseData = $data->json();

            $apartment->city = (!empty($responseData['addresses'][0]['address']['municipality'])) ? $responseData['addresses'][0]['address']['municipality'] : null;
            $apartment->country = (!empty($responseData['addresses'][0]['address']['country'])) ? $responseData['addresses'][0]['address']['country'] : null;
            
            $apartment->number = (!empty($responseData['addresses'][0]['address']['streetNumber'])) ? $responseData['addresses'][0]['address']['streetNumber'] : null;
            
             /*
            if(!empty($responseData['addresses'][0]['address']['streetName'])){
                $apartment->address = $responseData['addresses'][0]['address']['streetName'];
            } else if(!empty($responseData['addresses'][0]['address']['streetNameAndNumber'])) {
                $apartment->address = $responseData['addresses'][0]['address']['streetNameAndNumber'];
            } else {
                $apartment->address = 'Indirizzo non valido';
            }
            */

            
            if(!empty($responseData['addresses'][0]['address']['streetNameAndNumber'])){
                $apartment->address = $responseData['addresses'][0]['address']['streetNameAndNumber'];
            } else if(!empty($responseData['addresses'][0]['address']['streetName'])) {
                $apartment->address = $responseData['addresses'][0]['address']['streetName'];
            } else {
                $apartment->address = 'Indirizzo non valido';
            }
            
         
            
            $address = (!empty($responseData['addresses'][0]['address']) ? $responseData['addresses'][0]['address'] : '');
            
        }
     

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
        // $apartment = Apartment::findOrFail($id)->with('sponsorships')->get();
        $apartment = Apartment::with('sponsorships')->findOrFail($id)->load('sponsorships');


        $facilities = Facility::all();


            $data = Http::withOptions(['verify' => false])->get('https://api.tomtom.com/search/2/reverseGeocode/'. $apartment->latitude .','. $apartment->longitude .'.json?key=ZPskuspkrrcmchd9ut4twltuw96h5bWH');
            $responseData = $data->json();

            $apartment->city = (!empty($responseData['addresses'][0]['address']['municipality'])) ? $responseData['addresses'][0]['address']['municipality'] : null;
            $apartment->country = (!empty($responseData['addresses'][0]['address']['country'])) ? $responseData['addresses'][0]['address']['country'] : null;
            $apartment->number = (!empty($responseData['addresses'][0]['address']['streetNumber'])) ? $responseData['addresses'][0]['address']['streetNumber'] : null;
            
        
            
            if(!empty($responseData['addresses'][0]['address']['streetNameAndNumber'])){
                $apartment->address = $responseData['addresses'][0]['address']['streetNameAndNumber'];
            } else if(!empty($responseData['addresses'][0]['address']['streetName'])) {
                $apartment->address = $responseData['addresses'][0]['address']['streetName'];
            } else {
                $apartment->address = 'Indirizzo non valido';
            }
            
         
            
            $address = (!empty($responseData['addresses'][0]['address']) ? $responseData['addresses'][0]['address'] : '');
            
        

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
    }}

