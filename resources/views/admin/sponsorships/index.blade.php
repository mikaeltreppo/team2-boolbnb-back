@extends('layouts.admin')
@section('content')


<form action="{{route('admin.sponsorships.store')}}" method="POST">
    @csrf
    @method('POST')
    @foreach ($sponsorships as $sponsorship)
        <div class="card m-3" style="width: 14rem;">
        
            <div class="card-body">
                <h5 class="card-title">{{ $sponsorship->name }}</h5>
                <h5 class="card-title">{{ $sponsorship->price }} €</h5>
                <h5 class="card-title">{{ $sponsorship->duration }} Ore</h5>
                <input type="radio" id="sponsorship_{{$sponsorship->id}}" name="sponsorship_id" value="{{$sponsorship->id}}">
            </div>
        </div>
    @endforeach
      

      <select class="form-select form-select-lg mb-3" aria-label=".form-select-lg example">
        <option selected>Open this select menu</option>
        @foreach ($apartments as $apartment)         
            <option value="{{$apartment->id}}" name="apartment_id">{{$apartment->title}}</option>
        @endforeach
      </select>

      <button type="submit">Sponsorizza</button>
</form>


@endsection