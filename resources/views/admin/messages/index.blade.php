@extends('layouts.admin')
@section('content')

<h1 class="text-center">Messaggi</h1>
<p class="text-center mb-5">Nuovi clienti ti stanno aspettando!</p>

<div class="row">
  <div class="col col-lg-10 mx-auto">
      
    <div class="card card-tile flat-shadow">
      <div class="card-body">

        {{-- mobile layout --}}
        <div class="row d-block d-lg-none">
          @foreach ($messages as $message)
          <div class="col">
            <div class="border rounded-3 p-3  mb-4">
              <ul class="list-unstyled">
                <li class="mb-3"><span class="font-semibold">Id: </span>{{$message->id}}</li>
                <li class="mb-3"><span class="font-semibold">Mittente: </span>{{$message->email}}</li>
                <li class="mb-3"><span class="font-semibold">Appartamento: </span>{{$message->apartment->title}}</li>
                <li class="mb-3"><span class="font-semibold">Messaggio: </span>{{Str::limit($message->message, 20, '...')}}</li>
              </ul>
              {{-- azioni --}}
              <div class="d-flex justify-content-between mt-4">
                {{-- link vedi --}}
                <a href="{{route('admin.messages.show', ['message' => $message->id])}}"class="btn btn-sm ms-btn-primary">
                  <i class="fa-solid fa-eye me-1"></i>
                  Vedi
                  </a>
                   {{-- button cancella --}}
                  <form method="POST" action="{{ route('admin.messages.destroy', ['message' => $message->id]) }}">
                    @method('DELETE')
                    @csrf
                    <button type="submit" class="btn ms-btn-sm ms-btn-outline-black">
                      <i class="fa-solid fa-trash"></i>
                    </button>
                </form>
              </div>
            </div>
          </div>
          @endforeach
         
        </div>

        {{-- lg layout --}}
        <div class="table d-none d-lg-block">
          <table class="table">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Messaggio</th>
                <th scope="col">Mittente</th>
                <th scope="col">Appartamento</th>
                <th scope="col" class="text-center">Azioni</th>
          
              </tr>
            </thead>
            <tbody>
                @foreach ($messages as $message)
              <tr>
                <th scope="row">{{$message->id}}</th>
                <td>{{Str::limit($message->message, 20, '...')}}</td>
                <td>{{$message->email}}</td>
                <td>{{$message->apartment->title}}</td>
                <td class="d-flex align-items-center justify-content-center gap-3"> 
                  {{-- link vedi --}}
                  <a href="{{route('admin.messages.show', ['message' => $message->id])}}"class="btn btn-sm ms-btn-primary">
                  <i class="fa-solid fa-eye me-1"></i>
                  Vedi
                  </a>
                   {{-- button cancella --}}
                  <form method="POST" action="{{ route('admin.messages.destroy', ['message' => $message->id]) }}">
                    @method('DELETE')
                    @csrf
                    <button type="submit" class="btn ms-btn-sm ms-btn-outline-black">
                      <i class="fa-solid fa-trash"></i>
                    </button>
                </form>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
        
      </div>
    </div>
  </div>
</div>

@endsection