@extends('layouts.admin')
@section('content')

<div class="d-flex justify-content-center">

    {{-- inizio big-card apartment --}}
    <div class="card border-0 ms_big_card">
       
        {{-- card-top --}}
        <div class="top row gx-2">

            {{-- col left --}}
            <div class="col-8 position-relative">
                {{-- buttons-top --}}
                <a href="{{ route('admin.apartments.index') }}" class="btn ms-btn-outline-primary  ms_arrow_back">
                    <i class="fa-solid fa-arrow-left"></i>
                </a>
                <a href="#" class="btn ms-btn ms-btn-sm ms-btn-premium ms-2 mb-2 position-absolute bottom-0">
                    <i class="fa-solid fa-star me-2"></i>Sponsorizza</a>
                {{-- image --}}
                @if ($apartment->cover_image)
                <img src="{{ asset('storage/' . $apartment->cover_image) }}" alt="{{ $apartment->title }}" class="card-img-top border-0">
                @endif
            </div> 

            {{-- col right --}}
            <div class="col-4">
                {{-- map --}}
                <div class="ms_map h-100">
                    Anteprima mappa
                </div>
            </div>
        </div>
        
        {{-- card-bottom --}}
        <div class="bottom row card-body">

            {{-- col left --}}
            <div class="col-8 border-end">
                <h5 class="card-title fs-2 font-semibold mb-3">{{ $apartment->title }}</h5>
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
                <div class="card-text d-flex align-items-center gap-2 pb-4 border-bottom">
                    @if ($apartment->visible == 0)
                    <i class="fa-regular fa-face-sad-cry fs-4"></i>
                    <span>Non disponibile</span> 
                    @else
                    <i class="fa-regular fa-face-grin-wide fs-4 ms_text_main_darker"></i>
                    <span>Disponibile</span> 
                    @endif
                </div>

                {{-- buttons --}}
                <div class="d-flex flex-column mt-5">
                    <a href="{{ route('admin.apartments.edit', ['apartment' => $apartment->id]) }}"
                    class="btn ms-btn-md ms-btn-outline-primary">
                        <i class="fa-solid fa-pen me-2"></i>Modifica appartamento</a>

                    <div class="my-3">oppure</div>

                    <form method="POST" action="{{ route('admin.apartments.destroy', ['apartment' => $apartment->id]) }}">
                        @method('DELETE')
                        @csrf
                        <button type="submit" class="btn btn-outline-danger w-100">
                            <i class="fa-solid fa-trash me-2"></i>Elimina appartamento</button>
                    </form>
                </div>

            </div>
        </div>
    </div>
    {{-- fine big-card apartment --}}
@endsection
