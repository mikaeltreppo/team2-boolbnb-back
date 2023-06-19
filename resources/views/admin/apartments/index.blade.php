@extends('layouts.admin')

@section('content')
    <div class="d-flex flex-wrap justify-content-center">

        <div class="card m-3" style="width: 14rem;">
            <div class="ms_btn_add_card">
                <i class="fa-solid fa-plus"></i>
            </div>
        </div>

        {{-- card apartment--}}
        @foreach ($apartments as $apartment)
            <div class="card m-3" style="width: 14rem;">
                <img src="https://picsum.photos/400/200" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">{{ $apartment->title }}</h5>
                    <p class="card-text">{{$apartment->description}}</p>
                    <div class="d-flex flex-wrap">
                        <a href="{{route('admin.apartments.show', ['apartment' => $apartment->id])}}" class="btn btn-primary m-2">Visualizza i Dettagli</a>
                        <a href="{{route('admin.apartments.edit', ['apartment' => $apartment->id])}}" class="btn btn-warning m-2">Modifica</a>
                    </div>

                </div>
            </div>
        @endforeach
        {{-- end card apartment--}}

    </div>
@endsection
