@extends('layouts.admin')
@section('content')

<table class="table">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Messaggio</th>
        <th scope="col">Mittente</th>
        <th scope="col">Per l'appartamento</th>
        <th scope="col">Vedi</th>

  
      </tr>
    </thead>
    <tbody>
        @foreach ($messages as $message)
      <tr>
        <th scope="row">{{$message->id}}</th>
        <td>{{$message->message}}</td>
        <td>{{$message->email}}</td>
        <td>{{$message->apartment_id}}</td>
        <td> <a href="{{route('admin.messages.show', ['message' => $message->id])}}"class="btn btn-primary">Vedi</a></td>
   
      </tr>
      @endforeach
    </tbody>
  </table>

@endsection