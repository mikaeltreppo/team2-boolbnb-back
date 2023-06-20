<?php

namespace App\Http\Controllers\Admin;

use App\Models\Apartment;
use App\Models\Sponsorship;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class SponsorshipController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sponsorships = Sponsorship::all();
        $user = auth()->user();
        $apartments = $user->apartments;
        return view('admin.sponsorships.index', compact('sponsorships', 'apartments'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Sponsorship  $sponsorship
     * @return \Illuminate\Http\Response
     */
    public function show(Sponsorship $sponsorship)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Sponsorship  $sponsorship
     * @return \Illuminate\Http\Response
     */
    public function edit(Sponsorship $sponsorship)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Sponsorship  $sponsorship
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Sponsorship $sponsorship)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Sponsorship  $sponsorship
     * @return \Illuminate\Http\Response
     */
    public function destroy(Sponsorship $sponsorship)
    {
        //
    }

    public function sponsorizeApartment(Request $request) //viene chiamato dal post delle sponsorizzazioni
    {
        $apartment_id = $request->input('apartment_id');
        $apartment = Apartment::findOrFail($apartment_id);
        $sponsorship_id = $request->input('sponsorship_id'); //da modificare in base al name del form
        $sponsorship = Sponsorship::findOrFail($sponsorship_id);

        $start_date = now(); //data presa dal server su cui viene eseguito il codice Laravel quindi occhio ai conflitti 
        $expired_at = $start_date->addHours($sponsorship->duration);


        if (!$apartment) { // L'appartamento non è stato trovato
            echo $apartment_id;
        }

        $apartment->sponsorships()->attach($sponsorship->id, [
            'start_date' => $start_date,
            'expired_at' => $expired_at,
        ]);

        //return view('admin.apartments.index');
    }
}