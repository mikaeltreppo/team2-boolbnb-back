@extends('layouts.admin')
@section('content')
    <div class="m-3">
        <!--messaggi errori generali-->
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('admin.apartments.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="d-flex flex-wrap">
                <div class="w-50 p-3">
                    <label for="title" class="form-label">Nome Appartamento</label>
                    <input type="text" class="form-control @error('title') is-invalid @enderror" id="title"
                        name="title" value="{{ old('title') }}">
                    @error('title')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="w-50 p-3">
                    <label for="cover_image" class="form-label">Immagine</label>
                    <input type="file" class="form-control @error('cover_image') is-invalid @enderror" id="cover_image"
                        name="cover_image">
                    @error('cover_image')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="w-50 p-3">
                    <label for="price" class="form-label">Prezzo</label>
                    <input type="text" class="form-control @error('price') is-invalid @enderror" id="price"
                        name="price" value="{{ old('price') }}">
                    @error('price')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="w-50 p-3">
                    <label for="address" class="form-label">Indirizzo</label>
                    <input type="text" class="form-control @error('address') is-invalid @enderror" id="address"
                        name="address" value="{{ old('address') }}">
                    @error('address')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="p-3 w-100">
                    <label for="description" class="form-label">Descrizione</label>
                    <textarea name="description" class="form-control @error('description') is-invalid @enderror" id="description"
                        cols="30" rows="10" class="form-control">
                        {{ old('description') }}
                    </textarea>
                    @error('description')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>

            <!--sezione numeri del form-->

            <div class="d-flex flex-wrap">
                <div class="p-3 w-25">
                    <label for="bedrooms" class="form-label">Camere da letto</label>
                    <input type="number" class="form-control @error('bedrooms') is-invalid @enderror" id="bedrooms"
                        name="bedrooms" min="1" max="130" step="1" value="{{ old('bedrooms') }}">
                    @error('bedrooms')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="p-3 w-25">
                    <label for="beds" class="form-label">Letti</label>
                    <input type="number" class="form-control @error('beds') is-invalid @enderror" id="beds"
                        name="beds" min="1" max="130" step="1" value="{{ old('beds') }}">
                    @error('beds')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="p-3 w-25">
                    <label for="bathrooms" class="form-label">Bagni</label>
                    <input type="number" class="form-control @error('bathrooms') is-invalid @enderror" id="bathrooms"
                        name="bathrooms" min="1" max="130" step="1" value="{{ old('bathrooms') }}">
                    @error('bathrooms')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="p-3 w-25">
                    <label for="size_m2" class="form-label">Metratura</label>
                    <input type="number" class="form-control @error('size_m2') is-invalid @enderror" id="size_m2"
                        name="size_m2" min="1" max="130" step="1" value="{{ old('size_m2') }}">
                    @error('size_m2')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>

            <!--!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!controllare l'inserimento di available e visible come numero giusto?!!!!!!!!!!!!!!!!!!!!!!!!!!!!-->

            <div class="p-3">
                <div class="form-check form-switch">
                    <label class="form-check-label" for="visible">Visibile da subito</label>
                    <input class="form-check-input" type="checkbox" id="visible" name="visible" role="switch"
                        @if (old('visible')) checked @endif>
                </div>
                <div class="form-check form-switch">
                    <label class="form-check-label" for="available">Disponibile da subito</label>
                    <input class="form-check-input" type="checkbox" id="available" name="available" role="switch"
                        @if (old('available')) checked @endif>
                </div>
            </div>
            <button type="submit" class="m-3 btn btn-success">Aggiungi</button>
        </form>
    </div>
@endsection
