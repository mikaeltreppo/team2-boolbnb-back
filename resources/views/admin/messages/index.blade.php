@extends('layouts.admin')
@section('content')

<h1 class="text-center">Messaggi</h1>
<p class="text-center mb-5">Nuovi clienti ti stanno aspettando!</p>

<div class="row">
  <div class="col-10 mx-auto">
    <div class="card card-tile flat-shadow">
      <div class="card-body">
        <table class="table">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Messaggio</th>
              <th scope="col">Mittente</th>
              <th scope="col">Appartamento</th>
              <th scope="col" class="text-center">Visualizza</th>
        
            </tr>
          </thead>
          <tbody>
              @foreach ($messages as $message)
            <tr>
              <th scope="row">{{$message->id}}</th>
              <td>{{$message->message}}</td>
              <td>{{$message->email}}</td>
              <td>{{$message->apartment->title}}</td>
              <td class="text-center"> <a href="{{route('admin.messages.show', ['message' => $message->id])}}"class="btn btn-sm ms-btn-primary">
                <i class="fa-solid fa-eye me-1"></i>
                Vedi
                </a>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>

@endsection