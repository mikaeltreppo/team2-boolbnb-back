@extends('layouts.admin')
@section('content')


<div class="row">
    <div class="col-10 mx-auto">

        <h1 class=" text-center mb-2">Sponsorizza</h1>
        <p class="text-center">Dai una marcia in più ai tuoi annunci!</p>
        
        <form method="POST" action="{{route('admin.sponsorships.payement')}}">
            @csrf
            @method('POST')

            <div class="row mt-5">
                <div class="col-5 mx-auto text-center mb-4">
                    <label for="apartmentSelect" class="mb-2 small">
                        <span class="number-badge me-2">1</span>
                        Scegli un <span class="fw-bold">appartamento</span>
                    </label>
                    
                    <select class="form-select form-select-sm mb-3 mt-3" aria-label=".form-select-lg example" id="apartmentSelect" name="apartment_id">
                        <option selected>-</option>
                        @foreach ($apartments as $apartment)    
                            <option value="{{ $apartment->id }}" {{ old('apartment_id') == $apartment->id ? 'selected' : '' }}>{{ $apartment->title }}</option>
                        @endforeach
                    </select>
                      

                </div>
            
            </div>

            <div class="row py-3 justify-content-center">
                
                <span class="small text-center mb-3"><span class="number-badge me-2">2</span> Scegli un <span class="fw-bold">piano di sponsorizzazione</span></span>

                @foreach ($sponsorships as $sponsorship)
                <div class="col-3">
                    <label class="card-radio">
                        <input type="radio" id="sponsorship_{{$sponsorship->id}}" name="sponsorship_id" value="{{$sponsorship->id}}" class="card-radio-element">

                        <div class="card card-tile flat-shadow m-3 drop-shadow-sm card-radio-content">
                            <div class="card-header py-4 bg-secondary text-light">

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

    </div>
</div>


    
@endsection