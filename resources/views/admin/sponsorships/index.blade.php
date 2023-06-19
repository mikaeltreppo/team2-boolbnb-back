@extends('layouts.admin')
@section('content')
@foreach ($sponsorships as $sponsorhip)
<div class="card m-3" style="width: 14rem;">
    <img src="https://picsum.photos/400/200" class="card-img-top" alt="...">
    <div class="card-body">
        <h5 class="card-title">{{ $sponsorhip->title }}</h5>
    </div>
</div>
@endforeach
@endsection