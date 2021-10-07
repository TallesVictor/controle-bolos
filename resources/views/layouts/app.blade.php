<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    @include('layouts.header')
</head>

<body style="background-color: #e9ecef;">
    <div class="container-fluid bg-white menu">
        <div class="p-2 row justify-content-end" style="border-top: 6px solid #0d8efd;">
            <div class="col-sm-3">
                <button class="btn btn-outline-primary" type="button" id="btnCadastrar" data-bs-toggle="modal" data-bs-target="#modalCadastrarNoticia">
                    <i class="fas fa-plus"></i> Cadastrar Notícia</button>
            </div>
            <div class="col-sm-3">
                <div class="input-group">
                    <input type="text" class="form-control" id="noticias" placeholder="Buscar ">
                    <button class="btn btn-outline-primary" type="button" id="btnPesquisa" onclick="htmlNoticias()"><i
                            class="fas fa-search"></i></button>
                </div>
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
