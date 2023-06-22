@extends('layouts.admin')
@section('content')
    <div class="m-3">
        {{-- buttons-top --}}
        <a href="{{ route('admin.apartments.index') }}" class="btn ms-btn-outline-primary  ms_arrow_back">
            <i class="fa-solid fa-arrow-left"></i>
        </a>
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
        <h1 class="text-center">Aggiungi un nuovo appartamento</h1>
        <form method="POST" action="{{ route('admin.apartments.store') }}" enctype="multipart/form-data" id="formCreate">
            @csrf
            <div class="d-flex flex-wrap">
                <div class="w-50 p-3">
                    <label for="title" class="form-label">Nome Appartamento</label>
                    <input type="text" class="form-control @error('title') is-invalid @enderror" id="title"
                        name="title" value="{{ old('title') }}" minlength="2" maxlength="255" required>
                    <p id="titleError" style="color: red;"></p>
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
                        name="price" value="{{ old('price') }}" required>
                    <p id="priceError" style="color: red;"></p>
                    @error('price')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="w-50 p-3">
                    <label for="address" class="form-label">Indirizzo</label>
                    <input type="text" class="form-control @error('address') is-invalid @enderror" id="address"
                        name="address" value="{{ old('address') }}" required minlength="2">
                    <p id="addressError" style="color: red;"></p>
                    @error('address')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="p-3 w-100">
                    <label for="description" class="form-label">Descrizione</label>
                    <textarea name="description" class="form-control @error('description') is-invalid @enderror" id="description"
                        cols="30" rows="10" class="form-control" required maxlength="5000">
                        {{ old('description') }}
                    </textarea>
                    <p id="descriptionError" style="color: red;"></p>
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
                        name="bedrooms" min="1" max="130" step="1" value="{{ old('bedrooms') }}"
                        required>
                    <p id="bedroomsError" style="color: red;"></p>
                    @error('bedrooms')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="p-3 w-25">
                    <label for="beds" class="form-label">Letti</label>
                    <input type="number" class="form-control @error('beds') is-invalid @enderror" id="beds"
                        name="beds" min="1" max="130" step="1" value="{{ old('beds') }}" required>
                    <p id="bedsError" style="color: red;"></p>
                    @error('beds')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="p-3 w-25">
                    <label for="bathrooms" class="form-label">Bagni</label>
                    <input type="number" class="form-control @error('bathrooms') is-invalid @enderror" id="bathrooms"
                        name="bathrooms" min="1" max="130" step="1" value="{{ old('bathrooms') }}"
                        required>
                    <p id="bathroomsError" style="color: red;"></p>
                    @error('bathrooms')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="p-3 w-25">
                    <label for="size_m2" class="form-label">Metratura</label>
                    <input type="number" class="form-control @error('size_m2') is-invalid @enderror" id="size_m2"
                        name="size_m2" min="1" max="130" step="1" value="{{ old('size_m2') }}"
                        required>
                    <p id="sizeError" style="color: red;"></p>
                    @error('size_m2')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
            <!--facilities-->

           <div>
                @foreach ($facilities as $facility)
                <div class="p-3">

                    <label class="form-check-label" for="facility_id">{{ $facility->name }}</label>
                    <input class="text" type="checkbox" id="facility_{{$facility->id}}" name="facility_id[]" role="switch"
                        @if (old('visible')) checked @endif value="{{ $facility->id }}">
                </div>
                @endforeach
                <p id="FacilitiesError" style="color: red;"></p>
           </div>

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
