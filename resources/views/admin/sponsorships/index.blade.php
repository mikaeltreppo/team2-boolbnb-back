@extends('layouts.admin')
@section('content')
@foreach ($sponsorships as $sponsorhip)
<div class="card m-3" style="width: 14rem;">
   
    <div class="card-body">
        <h5 class="card-title">{{ $sponsorhip->name }}</h5>
        <h5 class="card-title">{{ $sponsorhip->price }} €</h5>
        <h5 class="card-title">{{ $sponsorhip->duration }} Ore</h5>
    </div>
</div>
@endforeach
@endsection