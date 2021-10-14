@extends('emails.header')
<?php define('Version', '1'); ?>
@section('nav')
    <!-- Imprime navegação -->
@endsection
@section('content')

    <div class="container-md bg-white">
        <div class="row justify-content-end pt-4 pb-3" style="border-top: 6px solid #0d8efd;">

        </div>
    </div>
    <div class="container-md pt-3 bg-white">
        <div class="row">

            <div class="col">
                <p style="text-align: center">
                    Olá {{ $emails->nome }}.
                </p>
                <p>
                    O bolo <b>{{ $bolos->nome }}</b> está disponível.

                </p>
            </div>
        </div>
    </div>
@endsection
