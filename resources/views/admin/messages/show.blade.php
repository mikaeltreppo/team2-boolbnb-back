@extends('layouts.admin')
@section('content')

<h1 class="text-center">Messaggi</h1>
<p class="text-center ">Nuovi clienti ti stanno aspettando!</p>

<div class="row">
    <div class="col-12 col-lg-8 mx-auto">
            {{-- button- torna indietro lg--}}
        <a href="{{ route('admin.messages.index') }}" class="btn ms-btn-outline-primary mb-4 d-lg-inline-block d-none
        ">
            <i class="fa-solid fa-arrow-left"></i>
        </a>
        {{-- card --}}
        <div class="card card-tile flat-shadow rounded-4">
            <div class="card-header">
                <div class="small fw-bold">Da: <span class="fw-lighter">{{$message->name}}</span></div>
                <div class="small fw-bold">Appartamento: <span class="fw-lighter">{{$message->apartment->title}}</span></div>
            </div>
            <div class="card-body">
                <div class="small fw-bold">Messaggio:</div>
                <p class="card-text">{{$message->message}}</p>
            </div>
            <div class="card-footer">
                <form method="POST" action="{{ route('admin.messages.destroy', ['message' => $message->id]) }}">
                    @method('DELETE')
                    @csrf
                    <button type="submit" class="btn btn-sm ms-btn-primary  mt-3">
                        <i class="fa-solid fa-trash me-1"></i>
                        Elimina
                    </button>
                </form>
                  
            </div>
             {{-- button- torna indietro lg--}}
             <a href="{{ route('admin.messages.index') }}" class="btn ms-btn-outline-primary d-lg-none my-5
             ">
                 <i class="fa-solid fa-arrow-left"></i>
                 Torna ai miei messaggi
             </a>
        </div>
    </div>
</div>

@endsection
