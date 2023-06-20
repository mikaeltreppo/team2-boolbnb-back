@extends('layouts.admin')
@section('content')
    <div class="d-flex justify-content-center ">
        <div class="card ">
            @if ($apartment->cover_image)
                <img src="{{ asset('storage/' . $apartment->cover_image) }}" class="card-img-top"
                    alt="{{ $apartment->title }}">
            @endif
            <div class="card-body">
                <h5 class="card-title fs-5 font-semibold">{{ $apartment->title }}</h5>
                <span class="card-text"><i
                        class="fa-solid fa-location-dot ms_light_gray_text me-2 mt-1"></i>{{ $apartment->address }}</span>

                <div class="d-flex mt-2 justify-content-between">
                    <div class="card-text">
                        <span class="fw-bold ">{{ $apartment->price }}</span> €/notte
                    </div>
                    <div class="card-text">
                        <span class="fw-bold ">{{ $apartment->size_m2 }}</span> m<sup>2</sup>
                    </div>
                </div>
            </div>

            <div class="card-body">
                <h5 class="card-title">{{ $apartment->title }}</h5>
                <p class="card-text">{{ $apartment->description }}</p>
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
    @endsection
