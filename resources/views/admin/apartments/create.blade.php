@extends('layouts.admin')
@section('content')
    <div class="m-3">
        <form method="POST" action="{{ route('admin.apartments.store') }}">
            @csrf
            <div class="mb-3">
                <label for="title" class="form-label">Nome Appartamento</label>
                <input type="text" class="form-control" id="title" name="title">
            </div>
            <div class="mb-3">
                <label for="cover_image" class="form-label">Immagine</label>
                <input type="text" class="form-control" id="cover_image" name="cover_image">
            </div>
            <div class="mb-3">
                <label for="price" class="form-label">Prezzo</label>
                <input type="text" class="form-control" id="price" name="price">
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Descrizione</label>
                <input type="text" class="form-control" id="description" name="description">
            </div>
            <div class="mb-3">
                <label for="address" class="form-label">Indirizzo</label>
                <input type="text" class="form-control" id="address" name="address">
            </div>

            <!--sezione numeri del form-->

            <div class="d-flex">
                <div class="m-3">
                    <label for="bedrooms" class="form-label">Camere da letto</label>
                    <input type="number" id="bedrooms" name="bedrooms" min="1" max="130" step="1">
                </div>
                <div class="m-3">
                    <label for="beds" class="form-label">Letti</label>
                    <input type="number" id="beds" name="beds" min="1" max="130" step="1">
                </div>
                <div class="m-3">
                    <label for="bathrooms" class="form-label">Bagni</label>
                    <input type="number" id="bathrooms" name="bathrooms" min="1" max="130" step="1">
                </div>
                <div class="m-3">
                    <label for="size_m2" class="form-label">Metratura</label>
                    <input type="number" id="size_m2" name="size_m2" min="1" max="130" step="1">
                </div>
            </div>

            <!--!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!controllare l'inserimento di available e visible come numero giusto?!!!!!!!!!!!!!!!!!!!!!!!!!!!!-->

            <div class="d-flex">
                <div class="m-3">
                    <label for="visible" class="form-label">Visibile da subito?</label>
                    <input type="number" id="visible" name="visible" min="1" max="130" step="1">
                </div>
                <div class="m-3">
                    <label for="available" class="form-label">Disponibile da subito</label>
                    <input type="number" id="available" name="available" min="1" max="130" step="1">
                </div>
            </div>
            <button type="submit" class="btn btn-success">Aggiungi</button>
        </form>
    </div>
@endsection
