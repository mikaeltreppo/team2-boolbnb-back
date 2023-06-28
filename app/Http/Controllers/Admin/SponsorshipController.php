<?php

namespace App\Http\Controllers\Admin;

use App\Models\Apartment;
use App\Models\Sponsorship;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Braintree;


class SponsorshipController extends Controller
{
    public function index()
    {
        $sponsorships = Sponsorship::all();
        $user = auth()->user();
        $apartments = $user->apartments;

        return view('admin.sponsorships.index', compact('sponsorships', 'apartments')); //Passo sia il token che le variabili
    }

    public function show(Request $request, $sponsorships, $apartment)
    {

    }


    public function payement(Request $request){
        

        $apartment_id = $request->apartment_id;

        $sponsorship_id = $request->sponsorship_id;

        $curSponsorship = Sponsorship::findOrFail($sponsorship_id);
        $sponsorship_price = $curSponsorship->price;


        /* Variabili dell'account Braintree */
        $gateway = new Braintree\Gateway([
            'environment' => config('services.braintree.environment'),
            'merchantId' => config('services.braintree.merchantId'),
            'publicKey' => config('services.braintree.publicKey'),
            'privateKey' => config('services.braintree.privateKey')
        ]);

        /* Genero un Token per autorizzare il pagamento */
        $token = $gateway->ClientToken()->generate();

        return view('admin.sponsorships.payement',compact('token', 'gateway', 'apartment_id', 'sponsorship_id', 'curSponsorship', 'sponsorship_price') );
    }

    public function checkouts(Request $request){

        $sponsorship_id = $request->sponsorship_id;
        $sponsorship_price = $request->sponsorship_price;




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

        // Verifica del prezzo !!!! USARE UNA REQUEST CUSTOM !!!!
        // $currentSponsorship = Sponsorship::findOrFail($sponsorship_id);

        // if($currentSponsorship->price != $request->amout){
        //     $result->success = false;
        // }

        // Se il pagamento avviene con successo
        if ($result->success) {
            $transaction = $result->transaction;
            return view('admin.sponsorships.checkouts', ['transaction' => $transaction->id]);
           
                 
        } else {  // Se il pagamento no va a buon fine
            $errorString = "";

            foreach($result->errors->deepAll() as $error) {
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

    public function salvaRelazione(Request $request)
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
        */


        return redirect()->back()->with([
            'success' => 'Relazione salvata correttamente.',
            'apartment_id' => $apartmentId,
            'sponsorship_id' => $sponsorshipId,
            'start_date' => $start_date,
            'expired_date' => $expired_at
        ]);
    }
}