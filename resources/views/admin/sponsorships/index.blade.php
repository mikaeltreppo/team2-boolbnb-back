@extends('layouts.admin')
@section('content')
    <div class="row">
        <div class="col-12 mx-auto">

            <h1 class=" text-center mb-2">Sponsorizza</h1>
            <p class="text-center">Dai una marcia in più ai tuoi annunci!</p>

            <form method="POST" action="{{ route('admin.sponsorships.store') }}">
                @csrf
                @method('POST')

                <div class="row mt-5">
                    <div class="col-lg-6 col-12 col-sm-10 mx-auto text-center mb-4">
                        <label for="apartmentSelect" class="mb-2 small">
                            <span class="number-badge me-2">1</span>
                            Scegli un <span class="fw-bold">appartamento</span>
                        </label>

                        <select class="form-select form-select-sm mb-3 mt-3" aria-label=".form-select-lg example"
                            id="apartmentSelect" name="apartment_id">
                            @foreach ($apartments as $apartment)
                                 @if($apartment_id != null && $apartment_id == $apartment->id)
                                    <option value="{{ $apartment->id }}" selected>{{ $apartment->title }}
                                    </option>
                                @else
                                    <option value="{{ $apartment->id }}"
                                        {{ old('apartment_id') == $apartment->id ? 'selected' : '' }}>{{ $apartment->title }}
                                    </option>
                                @endif
                            @endforeach
                        </select>


                    </div>

                </div>

                <div class="row py-3 justify-content-center">

                    <span class="small text-center mb-5"><span class="number-badge me-2">2</span> Scegli un <span
                            class="fw-bold">piano di sponsorizzazione</span></span>

                    @foreach ($sponsorships as $key => $sponsorship)
                        <div class="col-12 col-lg-3  col-md-4 col-sm-6 mb-4 mx-lg-3">
                            <label class="card-radio">
                                <input type="radio" id="sponsorship_{{ $sponsorship->id }}" name="sponsorship_id"
                                    value="{{ $sponsorship->id }}" class="card-radio-element" @if($key == 0) checked  @endif>

                                <div class="card card-tileflat-shadow  drop-shadow-sm card-radio-content">
                                    <div class="card-header py-4 bg-secondary text-light">

                                        <h6 class="text-center font-secondary text-light small text-uppercase fw-bold">
                                            {{ $sponsorship->name }}</h6>

                                        <h1 class="fw-semibold text-center mb-0">
                                            {{ $sponsorship->price }}
                                        </h1>
                                        <h6 class="text-center font-secondary small text-uppercase fw-bold">
                                            {{ $sponsorship->duration }} h</h6>
                                    </div>
                                    <div class="card-body text-center">

                                        <ul class="list-unstyled">
                                            @if($sponsorship->id === 1)
                                            <li class="my-3" >
                                                <b>Massima visibilità per 24 ore</b>
                                            </li>
                                            @elseif ($sponsorship->id === 2)
                                            <li class="my-3" >
                                                <b>Aumenta le possibilità di prenotazione per 72 ore</b> 
                                            </li>
                                            @else
                                            <li class="my-3" >
                                                <b>Promozione di alto livello per 144 ore</b> 
                                            </li>
                                            @endif


                                            @if($sponsorship->id === 1)
                                            <li class="my-3" >
                                                Risultati messi in primo piano nelle ricerche degli appartamenti 
                                            </li>
                                            @elseif ($sponsorship->id === 2)
                                            <li class="my-3" >
                                                Massima visibilità nei risultati di ricerca
                                            </li>
                                            @else
                                            <li class="my-3" >
                                                Massima visibilità nei risultati di ricerca
                                            </li>
                                            @endif

                                            <li class="my-3" >
                                                Inserimento nella sezione degli appartamenti in evidenza
                                            </li>
                                        </ul>

                                    </div>
                                </div>
                            </label>
                        </div>
                    @endforeach
                </div>


                <div class="row">
                    <div class="col text-center my-5">
                        <button type="submit" class="btn ms-btn ms-btn-primary">Continua</button>
                    </div>
                </div>
            </form>
        @endsection
