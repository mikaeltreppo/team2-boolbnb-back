<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">



<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <link rel="stylesheet" type="text/css"
        href="https://api.tomtom.com/maps-sdk-for-web/cdn/plugins/SearchBox/3.1.3-public-preview.0/SearchBox.css" />
    <script src="https://api.tomtom.com/maps-sdk-for-web/cdn/6.x/6.1.2-public-preview.15/services/services-web.min.js">
    </script>
    <script src="https://api.tomtom.com/maps-sdk-for-web/cdn/plugins/SearchBox/3.1.3-public-preview.0/SearchBox-web.js">
    </script>
    <!-- Add this script tag in the <head> section of your HTML -->
    <script src="https://api.tomtom.com/maps-sdk-for-web/cdn/6.x/6.15.0/maps/maps-web.min.js"></script>

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    {{-- Google Fonts --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Lora:wght@400;500;700&family=Montserrat:wght@400;500;700&display=swap"
        rel="stylesheet">

    {{-- Fontawesome --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

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


        {{-- modal per delete --}}
        <div class="modal fade" id="confirmModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <i class="fa-solid fa-circle-exclamation fs-3 me-2"></i>
                        <h1 class="modal-title fs-4" id="exampleModalLabel">Conferma eliminazione</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        Confermi di voler eliminare l'appartamento? <br>
                        I dati di questo appartamento andranno persi.
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn ms-btn-outline-primary" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-danger">Conferma eliminazione</button>
                    </div>
                </div>
            </div>
        </div>

    </div>

 

</body>



</html>
