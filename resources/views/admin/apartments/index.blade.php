@extends('layouts.admin')

@section('content')

    <div>

        <h1 class="text-center">I miei appartamenti</h1>
        <p class="text-center mb-5">Qui puoi gestire i tuoi appartamenti.</p>

        <div class="row flex-wrap gy-4">

            {{-- card add --}}
            <div class="col-lg-3 col-md-6 col-sm-12 ">
          
                <a href="{{ route('admin.apartments.create') }}" class="card ms_card ms_btn_add">
                    <div class="ms_box_info">
                        <i class="fa-solid fa-circle-info"></i>
                        <div class="ms_speech ms_bottom ms_info">Aggiungi un appartamento</div>
                    </div>
                    
                    <div class="d-flex align-items-center justify-content-center h-100">
                        <i class="fa-solid fa-square-plus"></i>
                    </div>
                </a>
            </div>
           
            {{-- fine card add --}}

            {{-- card apartment --}}
            @foreach ($apartments as $apartment)
            <div class="col-lg-3 col-md-6 col-sm-12">
                <div class="p-0 card ms_card ">
                    <a href="{{ route('admin.apartments.show', ['apartment' => $apartment->id]) }}">
                        <img src="{{ asset('storage/' . $apartment->cover_image) }}" class="card-img-top"
                        alt="{{ $apartment->title }}">
                    </a>
                    
                    <div class="card-body">
                        <h5 class="card-title fs-5 font-semibold">{{ $apartment->title }}</h5>
                        <span class="card-text"><i
                            class="fa-solid fa-location-dot ms_light_gray_text me-2 mt-1"
                          ></i>{{ $apartment->address }}</span>
                        
                        <div class="d-flex mt-2 justify-content-between">
                            <div class="card-text">
                                <span class="fw-bold ">{{ $apartment->price }}</span> €/notte
                            </div>
                            <div class="card-text">
                                <span class="fw-bold ">{{ $apartment->size_m2 }}</span> m<sup>2</sup>
                            </div>
                        </div>
                        {{-- buttons --}}
                        <div class="d-flex position-absolute mb-2 bottom-0 start-0 justify-content-between w-100">
                            <a href="#" class="btn ms-btn ms-btn-sm ms-btn-premium ms-2"><i class="fa-solid fa-star me-2"></i>Sponsorizza</a>
                            <div class="me-2">
                                <a href="{{ route('admin.apartments.edit', ['apartment' => $apartment->id]) }}"
                                    class="btn ms-btn-sm btn-outline-primary"><i class="fa-solid fa-pen"></i></a>
                                <a href="#"
                                    class="btn ms-btn-sm btn-outline-dark"><i class="fa-solid fa-trash"></i></a>
                            </div>
                        </div>
                        {{-- end buttons --}}
                    </div>
                </div>
            </div>
                
            @endforeach
            {{-- end card apartment --}}

        </div>
    </div>
@endsection
