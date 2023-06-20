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
                <div class="p-0 card ms_card">
                    <img src="{{ asset('storage/' . $apartment->cover_image) }}" class="card-img-top"
                        alt="{{ $apartment->title }}">
                    <div class="card-body">
                        <h5 class="card-title fs-5">{{ $apartment->title }}</h5>
                        <span class="card-text">{{ $apartment->address }}</span>
                        <div class="card-text mt-2">
                            <span class="fw-bold ">{{ $apartment->price }}</span> €
                        </div>
                        <div class="d-flex position-absolute bottom-0">
                            <a href="#" class="btn btn-warning">Sponsorizza <i class="fa-solid fa-star"></i></a>
                            <a href="{{ route('admin.apartments.show', ['apartment' => $apartment->id]) }}"
                                class="btn btn-primary m-2"><i class="fa-solid fa-pen"></i></a>
                            <a href="{{ route('admin.apartments.edit', ['apartment' => $apartment->id]) }}"
                                class="btn btn-warning m-2"><i class="fa-solid fa-trash"></i></a>
                        </div>
                    </div>
                </div>
            </div>
                
            @endforeach
            {{-- end card apartment --}}

        </div>
    </div>
@endsection
