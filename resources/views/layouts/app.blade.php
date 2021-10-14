<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    @include('layouts.header')
</head>

<body style="background-color: #e9ecef;">
    <div class="container-fluid bg-white">
        <div class="p-2 row justify-content-end" style="border-top: 6px solid #0d8efd;">
            
            <div class="col text-center">
                    <h2>Lista de Bolos</h2>
            </div>
        </div>
    </div>
    <!-- Preloader - todas as páginas terão-->
    <div class="preloader w-100 h-100 d-flex flex-column justify-content-center align-items-center">
        <div class="spinner-grow text-info" style="width: 3rem; height: 3rem;" role="status">
            <span class="sr-only">Loading...</span>
        </div>
    </div>

    @yield('content')

    <!--Imports JS -->
    @include('layouts.footer')
</body>

</html>
