@extends('layouts.admin')
@section('content')
<div class="d-flex justify-content-center ">
    <div class="card" style="width: 30rem;">
        <img src="https://picsum.photos/400/250" class="card-img-top" alt="...">
        <div class="card-body">
 
            <p class="card-text">{{$message->message}}</p>
       
            
            <form method="POST" action="{{ route('admin.messages.destroy', ['message' => $message->id]) }}">
                @method('DELETE')
                @csrf
                <button type="submit" class="btn btn-danger mt-2">Elimina Messaggio</button>
            </form>
        </div>
    </div>
</div>
@endsection
