@extends('layouts.app')
<?php define('Version', '1'); ?>
@section('nav')
    <!-- Imprime navegação -->
@endsection
@section('content')

    <div class="container-md bg-white">
        <div class="row justify-content-end pt-4 pb-3" style="border-top: 6px solid #0d8efd;">

            <div class="col-sm-3 text-end">
                <button class="btn btn-outline-primary" type="button" id="btnCadastrar" data-bs-toggle="modal"
                    data-bs-target="#modalCadBolos">
                    <i class="fas fa-plus"></i>
                    Cadastrar Bolo</button>
            </div>
        </div>
    </div>
    <div class="container-md pt-3 bg-white">
        <div class="row">
            <table class="table table-striped" id="tableBolos">
                <thead>
                    <th>Cód.</th>
                    <th>Nome</th>
                    <th>Peso</th>
                    <th>Valor</th>
                    <th>Quantidade</th>
                    <th></th>
                </thead>
                <tbody id="tbodyBolos">
                    @foreach ($bolos as $bolo)
                        <tr>
                            <td>{{ $bolo->id }}</td>
                            <td>{{ $bolo->nome }}</td>
                            <td>{{ maskMoney($bolo->peso) }}</td>
                            <td>{{ maskMoney($bolo->valor) }}</td>
                            <td>{{ $bolo->quantidade }}</td>
                            <td>
                                <i class="fas fa-pencil-alt cursor" onclick="editBolo({{ $bolo->id }})"
                                    title="Editar o {{ $bolo->nome }}"></i>
                                <i class="fas fa-trash-alt cursor" onclick="deleteBolo({{ $bolo->id }})"
                                    title="Apagar o {{ $bolo->nome }} "></i>
                                <i class="fas fa-envelope cursor" onclick="modalCadEmails({{ $bolo->id }})"
                                    title="Cadastrar e-mail no {{ $bolo->nome }}"></i>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection

@include('modal')
<?php function maskMoney($valor)
{
    $valor = number_format((float) $valor, 2, ',', '.');
    return $valor;
}
?>
