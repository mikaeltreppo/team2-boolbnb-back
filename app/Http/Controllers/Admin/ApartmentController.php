<?php

namespace App\Http\Controllers\Admin;

use App\Models\Apartment;
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

        $user = auth()->user();
        $apartments = $user->apartments;
        return view('admin.apartments.index', compact('apartments'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $apartments = Apartment::all();
        return view('admin.apartments.create', compact('apartments'));
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
        //serve per ricavare l'utente
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

        /*  $form_data = $request->all();
        $newApartment = new Apartment();
        $newApartment->title = $form_data['title'];
        $newApartment->description = $form_data['description'];
        $newApartment->slug = Str::slug($form_data['title']);
        $newApartment->cover_image = $form_data['cover_image'];
        $newApartment->price = $form_data['price'];
        $newApartment->address = $form_data['address'];
        $newApartment->beds = $form_data['beds'];
        $newApartment->bathrooms = $form_data['bathrooms'];
        $newApartment->bedrooms = $form_data['bedrooms'];
        $newApartment->size_m2 = $form_data['size_m2'];
        passiamo 1 o 0 zero per booleani in DB
        $newApartment->available = isset($form_data['available']) ? 1 : 0;
        $newApartment->visible = isset($form_data['visible']) ? 1 : 0;*/

        $newApartment->save();
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

        $apartment = Apartment::findOrFail($id);
        $user = auth()->user();
        if ($apartment->user_id == $user->id) {
            return view('admin.apartments.edit', compact('apartment'));
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
    public function update(UpdateApartmentRequest $request, $id)
    {
        $apartment = Apartment::findOrFail($id);
        $form_data = $request->all();
        $form_data['visible'] = (isset($form_data['visible']) && $form_data['visible'] == true) ? 1 : 0;
        $form_data['available'] = (isset($form_data['available']) && $form_data['available'] == true) ? 1 : 0;
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
        $apartment->delete();
        return redirect()->route('admin.apartments.index');
    }
}
