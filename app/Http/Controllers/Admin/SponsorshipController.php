<?php

namespace App\Http\Controllers\Admin;

use App\Models\Apartment;
use App\Models\Sponsorship;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Validator;
use Braintree;


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

        return view('admin.sponsorships.index', compact('sponsorships', 'apartments')); //Passo sia il token che le variabili
    }

    public function checkouts(Request $request)
    {

        $gateway = new Braintree\Gateway([
            'environment' => config('services.braintree.environment'),
            'merchantId' => config('services.braintree.merchantId'),
            'publicKey' => config('services.braintree.publicKey'),
            'privateKey' => config('services.braintree.privateKey')
        ]);

        $amount = $request->amount;
        $nonce = $request->payment_method_nonce;

        $result = $gateway->transaction()->sale([
            'amount' => $amount,
            'paymentMethodNonce' => $nonce,
            'options' => [
                'submitForSettlement' => true
            ]
        ]);

        // Se il pagamento avviene con successo
        if ($result->success) {
            $transaction = $result->transaction;

            return view('admin.sponsorships.checkouts', ['transaction' => $transaction->id]);
        } else {  // Se il pagamento no va a buon fine
            $errorString = "";

            foreach ($result->errors->deepAll() as $error) {
                $errorString .= 'Error: ' . $error->code . ": " . $error->message . "\n";
            }

            return view('admin.sponsorships.checkouts')->withErrors('Error with' . $result->message);
        }
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
        $data = $request->all();

        // Trovo l'id riferito all'appartamento selezionato e tutti i suoi dati
        $apartment = Apartment::findOrFail($data['apartment_id']);

        $validator = Validator::make($data, [
            'sponsorship_id' => 'required'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->with('status', 'Campo mancante')->withErrors($validator)->withInput();
        }

        $apartment->apartment_sponsorship()->attach([$data['sponsorship_id']]);

        // Trovo l'id della promozione selezionata
        $sponsorship = Sponsorship::findOrFail($data['sponsorship_id']);


        return redirect()->route('admin.sponsorships.show', $sponsorship->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Sponsorship  $sponsorship
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $sponsorship_id)
    {
        /* Variabili dell'account Braintree */
        $gateway = new Braintree\Gateway([
            'environment' => config('services.braintree.environment'),
            'merchantId' => config('services.braintree.merchantId'),
            'publicKey' => config('services.braintree.publicKey'),
            'privateKey' => config('services.braintree.privateKey')
        ]);

        /* Genero un Token per autorizzare il pagamento */
        $token = $gateway->ClientToken()->generate();

        return view('admin.sponsorships.show', compact('token', 'gateway'));
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

    /*  public function salvaRelazione(Request $request)
    {

        $apartmentId = $request->input('apartment_id');
        $sponsorshipId = $request->input('sponsorship_id');

        $apartment = Apartment::findOrFail($apartmentId);
        $sponsorship = Sponsorship::findOrFail($sponsorshipId);

        $start_date = now(); //data presa dal server su cui viene eseguito il codice Laravel quindi occhio ai conflitti 
        $expired_at = $start_date->addHours($sponsorship->duration);


        if (!$apartment) { // L'appartamento non è stato trovato
            echo $apartmentId;
        }

        /*
        $apartment->sponsorships()->attach($sponsorship->id, [
            'start_date' => $start_date,
            'expired_at' => $expired_at,
        ]);
        


        return redirect()->back()->with([
            'success' => 'Relazione salvata correttamente.',
            'apartment_id' => $apartmentId,
            'sponsorship_id' => $sponsorshipId,
            'start_date' => $start_date,
            'expired_date' => $expired_at
        ]);
    }*/
}
