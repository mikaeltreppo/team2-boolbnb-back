@extends('layouts.admin')
@section('content')
<!-- Header -->
<h2 class=" fw-semibold fs-2 text-secondary">
    {{ __('Profile') }}
</h2>

<!-- Data -->
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">

        <div class="row">
            <div class="col-12 col-lg-6">
                <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg ">
                        @include('profile.partials.update-profile-information-form')
                </div>
            </div>
        
            <div class="col-12 col-lg-6">
                <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg ">
                        @include('profile.partials.update-password-form')
                </div>
            </div>
        
            <div class="col-12 col-lg-6">
                <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg ">
                        @include('profile.partials.delete-user-form')
                </div>
            </div>
        </div>
           
        
    </div>
</div>
@endsection
