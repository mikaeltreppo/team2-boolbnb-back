@extends('layouts.admin')
@section('content')
<div class="d-flex justify-content-center ">
    <div class="card" style="width: 30rem;">
        <img src="https://picsum.photos/400/250" class="card-img-top" alt="...">
        <div class="card-body">
            <h5 class="card-title">{{ $apartment->title }}</h5>
            <p class="card-text">{{$apartment->description}}</p>
            <a href="{{route('admin.apartments.index')}}" class="btn btn-success">Torna ai tuoi Appartamenti</a>
            <a href="#" class="btn btn-danger">Elimina Appartamento</a>
        </div>
    </div>
</div>
@endsection
