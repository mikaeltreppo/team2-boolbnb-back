<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Usando Vite -->
    @vite(['resources/js/app.js'])
</head>

<body>
    <div id="app">
        <main>
            <div class="container-fluid g-0">
                <div class="row g-0">
                    {{-- Sidebar --}}
                    <div class="col-2">
                        @include('partials.sidebar')
                    </div>
                    {{-- End Sidebar --}}

                    {{-- Main Content --}}
                    <div class="col-10">
                        @include('partials.navbar')
                        @yield('content')        
                    </div>       
                    {{-- End Content --}}
                </div>
            </div>
        </main>
    </div>
</body>

</html>
