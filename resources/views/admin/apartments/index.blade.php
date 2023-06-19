@extends('layouts.admin')

@section('content')

    <div class="mx-5">

    <h1 class="text-center my-5">I miei appartamenti</h1>
        
    <div class="row flex-wrap justify-content-center">

        {{-- card add --}}
        <a href="{{ route('admin.apartments.create') }}" class="col-lg col-sm-12 card m-3 ms_card ms_btn_add">
            <i class="fa-solid fa-circle-info"></i>
            <div class="d-flex align-items-center flex-column justify-content-center h-100">
                <i class="fa-solid fa-square-plus"></i>
                <div class="ms_add_apartment">Aggiungi un appartamento</div>
            </div>
        </a>
        {{-- fine card add--}}

        {{-- card apartment--}}
        @foreach ($apartments as $apartment)
            <div class="col-lg col-sm-12 p-0 card m-3 ms_card">
                <img src="https://picsum.photos/400/200" class="card-img-top" alt="{{ $apartment->title }}">
                <div class="card-body">
                    <h5 class="card-title fs-5">{{ $apartment->title }}</h5>
                    <span class="card-text">{{$apartment->address}}</span>
                    <div class="card-text mt-2">
                        <span class="fw-bold ">{{$apartment->price}}</span> €</div>
                    <div class="d-flex position-absolute bottom-0">
                        <a href="#" class="btn btn-warning">Sponsorizza <i class="fa-solid fa-star"></i></a>
                        <a href="{{route('admin.apartments.show', ['apartment' => $apartment->id])}}" class="btn btn-primary m-2"><i class="fa-solid fa-pen"></i></a>
                        <a href="{{route('admin.apartments.edit', ['apartment' => $apartment->id])}}" class="btn btn-warning m-2"><i class="fa-solid fa-trash"></i></a>
                    </div>

                </div>
            </div>
        @endforeach
        {{-- end card apartment--}}

    </div>
    </div>

@endsection
