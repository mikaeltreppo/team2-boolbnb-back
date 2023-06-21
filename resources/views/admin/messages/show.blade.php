@extends('layouts.admin')
@section('content')

<h1 class="text-center">Messaggi</h1>
<p class="text-center mb-5">Nuovi clienti ti stanno aspettando!</p>

<div class="row">
    <div class="col-8 mx-auto">
        <div class="card card-tile flat-shadow rounded-4">
            <div class="card-header">
                <div class="small fw-bold">Da: <span class="fw-lighter">{{$message->full_name}}</span></div>
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
                    <button type="submit" class="btn btn-sm ms-btn-primary mt-2">
                        <i class="fa-solid fa-envelope-circle-check me-1"></i>
                        Segna come letto
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
