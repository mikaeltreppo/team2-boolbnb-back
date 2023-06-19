@extends('layouts.admin')
@section('content')
    <div class="m-3">
        <form method="POST" action="{{ route('admin.apartments.update', ['apartment' => $apartment->id]) }}">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="title" class="form-label">Nome Appartamento</label>
                <input type="text" class="form-control" id="title" name="title"
                value="{{ old('apartment', $apartment->title) }}">
            </div>
            <div class="mb-3">
                <label for="cover_image" class="form-label">Immagine</label>
                <input type="text" class="form-control" id="cover_image" name="cover_image"
                value="{{ old('apartment', $apartment->cover_image) }}">
            </div>
            <div class="mb-3">
                <label for="price" class="form-label">Prezzo</label>
                <input type="text" class="form-control" id="price" name="price"
                value="{{ old('apartment', $apartment->price) }}">
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Descrizione</label>
                <input type="text" class="form-control" id="description" name="description"
                value="{{ old('apartment', $apartment->description) }}">
            </div>
            <div class="mb-3">
                <label for="address" class="form-label">Indirizzo</label>
                <input type="text" class="form-control" id="address" name="address"
                value="{{ old('apartment', $apartment->address) }}">
            </div>

            <!--sezione numeri del form-->

            <div class="d-flex">
                <div class="m-3">
                    <label for="bedrooms" class="form-label">Camere da letto</label>
                    <input type="number" id="bedrooms" name="bedrooms" min="1" max="130" step="1"
                    value="{{ old('apartment', $apartment->bedrooms) }}">
                </div>
                <div class="m-3">
                    <label for="beds" class="form-label">Letti</label>
                    <input type="number" id="beds" name="beds" min="1" max="130" step="1"
                    value="{{ old('apartment', $apartment->beds) }}">
                </div>
                <div class="m-3">
                    <label for="bathrooms" class="form-label">Bagni</label>
                    <input type="number" id="bathrooms" name="bathrooms" min="1" max="130" step="1"
                    value="{{ old('apartment', $apartment->bathrooms) }}">
                </div>
                <div class="m-3">
                    <label for="size_m2" class="form-label">Metratura</label>
                    <input type="number" id="size_m2" name="size_m2" min="1" max="130" step="1"
                    value="{{ old('apartment', $apartment->size_m2) }}">
                </div>
            </div>

            <!--!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!controllare l'inserimento di available e visible come numero giusto?!!!!!!!!!!!!!!!!!!!!!!!!!!!!-->

            <div class="d-flex">
                <div class="m-3">
                    <label for="visible" class="form-label">Visibile da subito?</label>
                    <input type="checkbox" id="visible" name="visible"
                    {{ ($apartment->visible==1)?'checked':'' }}>
                </div>
                <div class="m-3">
                    <label for="available" class="form-label">Disponibile da subito</label>
                    <input type="checkbox" id="available" name="available"
                    {{ ($apartment->available==1)?'checked':'' }}>
                </div>
            </div>
            <button type="submit" class="btn btn-success">Modifica</button>
        </form>
    </div>
@endsection
