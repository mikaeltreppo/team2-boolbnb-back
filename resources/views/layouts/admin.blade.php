<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    {{-- Fontawesome --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Usando Vite -->
    @vite(['resources/js/app.js'])
</head>

<body>
    <div id="app">
        <main>
            <div class="container-fluid g-0">
                <div class="row g-0">
                    {{-- Sidebar --}}
                    <div class="col-xl-2 col-md-4 col-2">
                        @include('partials.sidebar')
                    </div>
                    {{-- End Sidebar --}}

                    {{-- Main Content --}}
                    <div class="col-xl-10 col-md-8 col-10">
                        @include('partials.navbar')
                        <div class="container-fluid p-3">
                            @yield('content')   
                        </div>     
                    </div>       
                    {{-- End Content --}}
                </div>
            </div>
        </main>
    </div>
</body>

</html>
