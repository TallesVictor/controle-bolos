@extends('layouts.app')
<?php define('Version', '1'); ?>
@section('nav')
    <!-- Imprime navegação -->
@endsection


@section('content')
    <div class="container-md">
        <div class="row" id="htmlNoticias">
            {{-- @foreach ($noticias as $noticia)
                <div class="col-md-10 col-sm-10 col-xs-12 pt-2 pb-3">
                    <div class="row bg-white shadow-sm border rounded zoom">
                        <div class="col-md-3">
                            <img class="m-auto p-1 shadow-sm img-noticia"
                                src="{{ "/$noticia->img" }}" alt="{{ $noticia->titulo }}">
                        </div>
                        <div class="col-md">
                            <div class="row pt-2">
                                <label class="text-secondary">{{ Str::ucfirst(strtolower($noticia->categoria)) }}</label>
                            </div>
                            <div class="row px-3">
                               <h3 class="fs-2 text-primary cursor" onclick="abrirNoticia({{ $noticia->id }})"> {{ $noticia->titulo }}</h3>
                                <p class="card-text"> {{ Str::substr($noticia->texto, 0, 300) }}...</p>
                                <button class="btn btn-outline-primary w-100" onclick="abrirNoticia({{ $noticia->id }})">Saber
                                    Mais</button>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach --}}
        </div>
    </div>
@endsection

@include('modal')