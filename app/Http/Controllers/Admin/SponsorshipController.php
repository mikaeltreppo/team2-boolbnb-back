<?php

namespace App\Http\Controllers\Admin;

use App\Models\Apartment;
use App\Models\Sponsorship;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Http\Requests\PayementRequest;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;
use Braintree;


class SponsorshipController extends Controller
{
    public function index(Request $request)
    {
        $apartment_id = $request->id;
        $sponsorships = Sponsorship::all();
        $user = auth()->user();
        $apartments = $user->apartments;

        return view('admin.sponsorships.index', compact('sponsorships', 'apartments', 'apartment_id')); //Passo sia il token che le variabili
    }

    public function payement(Request $request)
    {



        $apartment = Apartment::findOrFail($request->apartment_id);
        $sponsorship = Sponsorship::findOrFail($request->sponsorship_id);


        /* Variabili dell'account Braintree */
        $gateway = new Braintree\Gateway([
            'environment' => config('services.braintree.environment'),
            'merchantId' => config('services.braintree.merchantId'),
            'publicKey' => config('services.braintree.publicKey'),
            'privateKey' => config('services.braintree.privateKey')
        ]);

        /* Genero un Token per autorizzare il pagamento */
        $token = $gateway->ClientToken()->generate();

        return view('admin.sponsorships.payement', compact('token', 'gateway', 'apartment', 'sponsorship'));
    }

    public function checkouts(Request $request)
    {
        $sponsorship = Sponsorship::findOrFail($request->sponsorship_id);
        $apartment = Apartment::findOrFail($request->apartment_id);
        $amount = 0;
        if ($request->sponsorship_id == 1) {
            $amount = 2.99;
        } elseif ($request->sponsorship_id == 2) {
            $amount = 5.99;
        } elseif ($request->sponsorship_id == 3) {
            $amount = 9.99;
        }
        $nonce = $request->payment_method_nonce;

        $gateway = new Braintree\Gateway([
            'environment' => config('services.braintree.environment'),
            'merchantId' => config('services.braintree.merchantId'),
            'publicKey' => config('services.braintree.publicKey'),
            'privateKey' => config('services.braintree.privateKey')
        ]);

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

            $start_date = Carbon::now(); // Utilizza Carbon::now() invece di now()
            $expired_at = $start_date->copy()->addHours($sponsorship->duration); // Utilizza copy() per creare una copia di $start_date

            $format_start_date = $start_date->format('Y-m-d H:i:s');
            $format_expired_at = $expired_at->format('Y-m-d H:i:s');

            $apartment->apartment_sponsorship()->attach($sponsorship->id, [
                'start_date' => $format_start_date,
                'expired_at' => $format_expired_at,
            ]);
            // $sponsorships->start_date = date('Y-m-d');
            // $sponsorships->start_date = date('Y-m-d');
            // $apartments = Apartment::findOrFail($request->apartment);
            // $apartments->sponsorships()->sync($sponsorships);

            return view('admin.sponsorships.checkouts', ['transaction' => $transaction->id]);
        } else { // Se il pagamento no va a buon fine
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


        // Trovo l'id della promozione selezionata
        $sponsorship = Sponsorship::findOrFail($data['sponsorship_id']);

        $apartment_id = $data['apartment_id'];
        $sponsorship_id = $data['sponsorship_id'];
        return redirect()->route('admin.sponsorships.show', $sponsorship->id)->with(['apartment_id' => $apartment_id, 'sponsorship_id' => $sponsorship_id, 'sponsorship_name' => $sponsorship->name, 'sponsorship_duration' => $sponsorship->duration]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Sponsorship  $sponsorship
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $sponsorship_id)
    {

        $apartment_id = Session::get('apartment_id');
        $sponsorship_id = Session::get('sponsorship_id');
        $sponsorship_name = Session::get('sponsorship_name');
        $sponsorship_duration = Session::get('sponsorship_duration');

        /* Variabili dell'account Braintree */
        $gateway = new Braintree\Gateway([
            'environment' => config('services.braintree.environment'),
            'merchantId' => config('services.braintree.merchantId'),
            'publicKey' => config('services.braintree.publicKey'),
            'privateKey' => config('services.braintree.privateKey')
        ]);

        /* Genero un Token per autorizzare il pagamento */
        $token = $gateway->ClientToken()->generate();
        if ($sponsorship_id == 1) {
            $amount = 2.99;
        } else if ($sponsorship_id == 2) {
            $amount = 5.99;
        } else if ($sponsorship_id == 3) {
            $amount = 9.99;
        } else {
            $amount = null;
        }


        return view('admin.sponsorships.show', compact('token', 'gateway', 'amount', 'apartment_id', 'sponsorship_id', 'sponsorship_name', 'sponsorship_duration'));
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