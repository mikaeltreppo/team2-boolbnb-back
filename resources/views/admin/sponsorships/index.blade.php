@extends('layouts.admin')
@section('content')


<div class="row">
    <div class="col-10 mx-auto">

        <h1 class=" text-center mb-2">Sponsorizza</h1>
        <p class="text-center">Dai una marcia in più ai tuoi annunci!</p>
        
        <form  method="POST">
            @csrf
            @method('POST')

            <div class="row mt-5">
                <div class="col-5">
                    <label for="apartmentSelect" class="mb-2 small">Scegli un appartamento</label>
                    <select class="form-select form-select mb-3" aria-label=".form-select-lg example" id="apartmentSelect">
                        <option selected>Open this select menu</option>
                        @foreach ($apartments as $apartment)         
                            <option value="{{$apartment->id}}" name="apartment_id">{{$apartment->title}}</option>
                        @endforeach
                      </select>
                </div>
            
            </div>

            <div class="row py-3 justify-content-center">
                @foreach ($sponsorships as $sponsorship)
                <div class="col-3">
                    <div class="card card-tile flat-shadow m-3 drop-shadow-sm">
                        <div class="card-header py-4 ms-bg-dark text-light">
                            {{-- <div class="rounded-icon mx-auto bg-primary my-3">
                                <i class="fa-solid fa-eye"></i>
                            </div> --}}
                            <h6 class="text-center font-secondary text-light small text-uppercase fw-bold">{{ $sponsorship->name }}</h6>

                            <h1 class="fw-semibold text-center mb-0">
                                {{ $sponsorship->price }}
                            </h1>
                            <h6 class="text-center font-secondary small text-uppercase fw-bold">{{ $sponsorship->duration }} h</h6>
                        </div>
                        <div class="card-body text-center">
                            
                           <ul class="list-unstyled">
                                <li class="my-3">
                                    Feature #1
                                </li>
                                <li class="my-3">
                                    Feature #2
                                </li>
                                <li class="my-3">
                                    Feature #3
                                </li>
                           </ul>

                            {{-- <h5 class="card-title">{{ $sponsorship->name }}</h5>
                            <h5 class="card-title">{{ $sponsorship->price }} €</h5>
                            <h5 class="card-title">{{ $sponsorship->duration }} Ore</h5> --}}
                            <input type="radio" id="sponsorship_{{$sponsorship->id}}" name="sponsorship_id" value="{{$sponsorship->id}}">
                        </div>
                    </div>
                </div>
            @endforeach
            </div>
              
        
              
             <div class="row">
                <div class="col text-center my-5">
                    <button type="submit" class="btn ms-btn ms-btn-primary">Sponsorizza</button>
                </div>
             </div>
        </form>
    </div>
</div>
    
@endsection