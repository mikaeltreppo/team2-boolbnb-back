@extends('layouts.admin')
@section('content')
    <div class="d-flex justify-content-center">
        {{-- inizio big-card apartment --}}
        <div class="card border-0 ms_big_card ">

            {{-- card-top --}}
            <div class="top row gx-2">
                {{-- col left --}}
                <div class="col-8">
                    @if ($apartment->cover_image)
                    <img src="{{ asset('storage/' . $apartment->cover_image) }}" alt="{{ $apartment->title }}" class="card-img-top border-0">
                    @endif
                </div> 

                {{-- col right --}}
                <div class="col-4">
                    <div class="ms_map align-self-stretch h-100 ">
                        Anteprima mappa
                    </div>
                </div>
            </div>
            
            {{-- card-bottom --}}
            <div class="bottom row card-body">

                {{-- col left --}}
                <div class="col-8 border-end">
                    <h5 class="card-title fs-3 font-semibold mb-3">{{ $apartment->title }}</h5>
                    <p class="card-text">{{ $apartment->description }}</p>

                    <div class="my-5 ">
                        <h3 class="font-primary border-bottom pb-2 fs-4 mb-4">Caratteristiche stanze</h3>
                        <div class="d-flex gap-3">
                            <div class="ms_box_feature">
                                <i class="fa-solid fa-door-open fs-5"></i>
                                <span>Stanze</span>
                                <span class="fw-bold">{{ $apartment->bedrooms }}</span>
                            </div>
                            <div class="ms_box_feature">
                                <i class="fa-solid fa-bed fs-5"></i>
                                <span>Letti</span>
                                <span class="fw-bold">{{ $apartment->beds }}</span>
                            </div>
                            <div class="ms_box_feature">
                                <i class="fa-solid fa-restroom fs-5"></i>
                                <span>Letti</span>
                                <span class="fw-bold">{{ $apartment->bathrooms }}</span>
                            </div>
                        </div>
                    </div>

                    <div class="my-5">
                        <h3 class="font-primary border-bottom pb-2 fs-4 mb-4">Servizi</h3>
                        @foreach ( $apartment->facilities as $facility)
                            <div>
                                <div>{{$facility->icon}}</div>
                                <div>{{$facility->name}}</div>
                            </div>
                        @endforeach
                    </div>
                </div>

                {{-- col right --}}
                <div class="col-4 ">
                    <div class="card-text ">
                        <i class="fa-solid fa-location-dot ms_light_gray_text me-2 mt-1"></i>
                        <span>{{ $apartment->address }}</span>
                    </div>
                    <div class="card-text my-3 ">
                        <i class="fa-solid fa-money-check-dollar ms_light_gray_text me-2"></i>
                        <span class="fw-bold fs-5">{{ $apartment->price }}</span> 
                        <span>€/notte</span>
                    </div>
                    <div class="card-text my-3 pb-4 border-bottom">
                        <i class="fa-solid fa-ruler-combined ms_light_gray_text me-2"></i>
                        <span class="fw-bold fs-5">{{ $apartment->size_m2 }}</span> 
                        <span>m<sup>2</sup></span>
                    </div>
                    <div class="card-text d-flex align-items-center gap-2 my-4">
                        @if ($apartment->visible == 0)
                        <i class="fa-solid fa-eye-slash fs-4"></i>
                        <span>Non visibile all'utente</span> 
                        @else
                        <i class="fa-solid fa-eye fs-4 text-success"></i>
                        <span>Visibile</span> 
                        @endif
                    </div>
                    <div class="card-text d-flex align-items-center gap-2">
                        @if ($apartment->visible == 0)
                        <i class="fa-regular fa-face-sad-cry fs-4"></i>
                        <span>Non disponibile</span> 
                        @else
                        <i class="fa-regular fa-face-grin-wide fs-4 ms_text_main_darker"></i>
                        <span>Disponibile</span> 
                        @endif
                    </div>
                </div>
            </div>
            

            <div class="card-body">
                <a href="{{ route('admin.apartments.index') }}" class="btn btn-success">Torna ai tuoi Appartamenti</a>
                <a href="{{ route('admin.apartments.edit', ['apartment' => $apartment->id]) }}"
                    class="btn btn-warning m-2">Modifica</a>
                <a href="{{ route('admin.sponsorships.index') }}" class="btn btn-success">Sponsorizza</a>

                <form method="POST" action="{{ route('admin.apartments.destroy', ['apartment' => $apartment->id]) }}">
                    @method('DELETE')
                    @csrf
                    <button type="submit" class="btn btn-danger mt-2">Elimina Appartamento</button>
                </form>
            </div>
        </div>
        {{-- fine big-card apartment --}}
    @endsection
