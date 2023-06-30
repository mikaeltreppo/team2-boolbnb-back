<?php

namespace App\Http\Controllers\Admin;

use App\Models\Apartment;
use App\Models\View;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class ViewController extends Controller
{

    public function incrementViews(Request $request, $id)
    {
        $apartment = Apartment::find($id);

        if (!$apartment) {
            return response()->json(['error' => 'Appartamento non trovato.'], 404);
        }

        $userIp = $request->ip();

        // Verifica se l'utente ha già incrementato le visualizzazioni per lo stesso appartamento nella data corrente
        $existingView = View::where('apartment_id', $apartment->id)
            ->where('user_ip', $userIp)
            ->whereDate('date', Carbon::today())
            ->first();

        if ($existingView) {
            return response()->json(['message' => 'Visualizzazione già conteggiata per oggi.']);
        }

        // Crea una nuova visualizzazione
        $view = new View();
        $view->apartment_id = $apartment->id;
        $view->date = Carbon::today();
        $view->user_ip = $userIp;
        $view->save();

        return response()->json(['message' => 'Conteggio visualizzazioni aggiornato.']);
    }



    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @param  \App\Models\View  $view
     * @return \Illuminate\Http\Response
     */
    public function show(View $view)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\View  $view
     * @return \Illuminate\Http\Response
     */
    public function edit(View $view)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\View  $view
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, View $view)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\View  $view
     * @return \Illuminate\Http\Response
     */
    public function destroy(View $view)
    {
        //
    }
}