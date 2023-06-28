@extends('layouts.admin')
@section('content')

    @if (session('success_message'))
    <div class="bg-success">
        {{session('success_message')}}
    </div>
    @endif

    @if (count($errors) > 0)
    <div class="errors bg-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
        </ul>
    </div>
    @endif


    {{$transaction}}
@endsection