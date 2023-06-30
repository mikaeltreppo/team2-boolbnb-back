@extends('layouts.admin')
@section('content')

<div class="container">
    <h2 class="fs-1 mt-4 mb-2 text-center">
        {{ __('Modifica Account') }}
    </h2>
    <span class="text-center d-block mb-5">
        Modifica le informazioni del tuo account
    </span>

    <div class="row mb-4">
        <div class="col-12 col-lg-6">
            <div class="card p-5 bg-white rounded-lg rounded-4 flat-shadow h-100">

                @include('profile.partials.update-profile-information-form')
        
            </div>
        </div>
        <div class="col-12 col-lg-6 mt-3 mt-lg-0">

            <div class="card p-5  bg-white rounded-lg rounded-4 flat-shadow h-100">


                @include('profile.partials.update-password-form')
        
            </div>
        
        </div>
    </div>

    <div class="row">
        
       <div class="col-12 col-lg-6">
        <div class="card p-5 mb-4 bg-white rounded-lg rounded-4 flat-shadow">


            @include('profile.partials.delete-user-form')

        </div>
       </div>
    </div>
</div>

@endsection
