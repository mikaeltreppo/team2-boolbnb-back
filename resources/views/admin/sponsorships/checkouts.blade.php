@extends('layouts.admin')
@section('content')

<div class="row h-100 align-items-center">
    @if (isset($transaction))
        <div class="col-10 mx-auto text-center h-100">
            <i class="fa-solid fa-circle-check fa-3x text-success mb-5"></i>
            <h1 class=" text-center mb-5">Pagamento Completato!</h1>
            <p>Il pagamento è stato completato con successo</p>
            <div class="token">Il tuo ID transazione è: <span class="fw-bold">{{$transaction}}</span></div>
            <div class="mt-4 small">
                Sarai reindirizzato automaticamente alla dashboard
            </div>
        </div>

        <script>
            setTimeout(function() {
                window.location.href = '{{ route('admin.dashboard') }}';
            }, 5000); // Redirect dopo 5 secondi (5000 millisecondi)
        </script>
       
    @else
    <div class="col-10 mx-auto text-center h-100">
        <i class="fa-solid fa-circle-exclamation fa-3x text-danger mb-5"></i>
        <h1 class=" text-center mb-5 text-danger">Pagamento Rifiutato</h1>
        <p>Qualcosa è andato storto. Riprova.</p>

        <a href="{{route('admin.sponsorships.index')}}" class="btn ms-btn ms-btn-primary">Riprova</a>
    </div>
    @endif
    
   


</div>
    {{-- @if (session('success_message'))
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
    @endif --}}


</script>
    
@endsection