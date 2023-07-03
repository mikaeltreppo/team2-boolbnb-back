@extends('layouts.admin')
@section('content')
    <div class="m-0 m-lg-3">
        {{-- buttons-top --}}
        <a href="{{ route('admin.apartments.index') }}" class="btn ms-btn-outline-primary d-none d-lg-inline-block">
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
        <h1 class="text-center mt-5 mt-lg-0">Aggiungi un nuovo appartamento</h1>
        <form method="POST" action="{{ route('admin.apartments.store') }}" enctype="multipart/form-data" id="formCreate">
    
            @csrf
            {{-- info principali --}}
            <div class="row flex-wrap">
                <div class="col-12 col-lg-6 p-3">
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
                <div class=" col-12 col-lg-6 p-3">
                    <label for="cover_image" class="form-label">Immagine</label>
                    <input type="file" class="form-control @error('cover_image') is-invalid @enderror" id="cover_image"
                        name="cover_image">
                    @error('cover_image')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="col-12 col-lg-6 p-3">
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
                <!--search-->
                <div class="col-12  col-lg-6  px-3">
                    <label for="ttAddress" class="form-label">Indirizzo</label>
                    <div id="ttAddress"></div>
                    <p id="addressError" style="color: red;"></p>
                    @error('ttAddress')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                    <input type="hidden" id="longitude" name="longitude" value="">
                    <input type="hidden" id="latitude" name="latitude" value="">

                    <input type="hidden" id="address" name="address" value="">
                    <input type="hidden" id="city" name="city" value="">
                    <input type="hidden" id="country" name="country" value="">
                   
                </div>
                <div class="p-3 col-12">
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

            <div class="row flex-wrap">
                <div class="p-3 col-6 col-lg-3">
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
                <div class="p-3 col-6 col-lg-3">
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
                <div class="p-3 col-6 col-lg-3">
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
                <div class="p-3 col-6 col-lg-3">
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
                        <input class="text" type="checkbox" id="facility_{{ $facility->id }}" name="facility_id[]"
                            role="switch" @if (old('visible')) checked @endif value="{{ $facility->id }}">
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

          {{-- button --}}
        <a href="{{ route('admin.apartments.index') }}" class="btn ms-btn-outline-primary d-block d-lg-none my-3">
            <i class="fa-solid fa-arrow-left"></i> Torna ai miei appartamenti
        </a>
    </div>
    <script src="https://api.tomtom.com/maps-sdk-for-web/cdn/6.x/6.13.0/maps/maps-web.min.js"></script>
    <script>
        var options = {
            searchOptions: {
                key: "aVjvNWJ9xnYI72ZDUSFsELvlUkaTS9kP",
                language: "en-GB",
                limit: 5,
            },
            autocompleteOptions: {
                key: "aVjvNWJ9xnYI72ZDUSFsELvlUkaTS9kP",
                language: "en-GB",
            },
        };
        var ttSearchBox = new tt.plugins.SearchBox(tt.services, options);
        var searchBoxHTML = ttSearchBox.getSearchBoxHTML();
        document.getElementById("ttAddress").appendChild(searchBoxHTML);

        ttSearchBox.on('tomtom.searchbox.resultselected', function(data) {
            var result = data.data.result;


            var longitude = result.position.lng;
            var latitude = result.position.lat;

            var address = result.address.streetName;

            var number = result.address.streetNumber;

            if(number != undefined){
                address += `, ${number}`;
            }

            var country = result.address.country;
            var city = result.address.municipality;
                
            document.getElementById("longitude").value = longitude;
            document.getElementById("latitude").value = latitude;
            
            document.getElementById("country").value = country;
            document.getElementById("city").value = city;
            document.getElementById("address").value = address;
       
        });

    </script>
@endsection
