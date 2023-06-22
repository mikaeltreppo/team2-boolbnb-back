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

    public function search(Request $request, $search) //ricerca sul title dell'appartamento
    {
        // Esegui la logica di ricerca utilizzando il parametro $search
        // Ad esempio, puoi utilizzare il parametro come parte di una query per filtrare i risultati del database

        $apartments = Apartment::where('title', 'like', '%' . $search . '%')->paginate(6);

        // Restituisci i risultati come risposta JSON
        return response()->json([
            'success' => true,
            'results' => $apartments
        ]);
    }
}