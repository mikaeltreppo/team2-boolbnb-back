<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    {{-- Google Fonts --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lora:wght@400;500;700&family=Montserrat:wght@400;500;700&display=swap" rel="stylesheet">

    {{-- Fontawesome --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Usando Vite -->
    @vite(['resources/js/app.js'])
</head>

<body>
    <div id="app">
        <main>
            <div class="container-fluid bg-light g-0">
                <div class="row g-0">
                    {{-- Sidebar --}}
                    <div class="col-xl-2 col-lg-3 col-md-4 col-2 vh-100">
                        @include('partials.sidebar')
                    </div>
                    {{-- End Sidebar --}}

                    {{-- Main Content --}}
                    <div class="col-xl-10 col-lg-9 col-md-8 col-10 vh-100 overflow-y-auto">
                        @include('partials.navbar')
                        <div class="container-fluid p-5">
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
