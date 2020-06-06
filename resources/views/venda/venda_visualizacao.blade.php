@extends('layouts.app')

@section('content')

<div class="container">
    
    <div class="col-md-12 form-group">
        <label for="cliente_id">Cliente:</label>
        <input class="form-control" value="{{ $venda->cliente->nome }}" disabled>
    </div>

    <table class="table table-striped table-hover">
        <thead>
        <tr>
            <th>Produto</th>
            <th>Quantidade</th>
            <th>Valor&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
        </tr>
        </thead>
        <tbody>
        @foreach($venda->vendaProduto as $vendaProduto)
        <tr>
            <td>
                <input class="form-control" disabled value="{{ $vendaProduto->produto->nome }}">
            </td>
            <td>
                <input class="form-control" disabled value="{{ $vendaProduto->quantidade }}">
            </td>
            <td>
                <input class="form-control" disabled value="{{ $vendaProduto->valor }}">
            </td>
        </tr>
        @endforeach
        </tbody>
    </table>

    <div class="col-md-12 text-center">
        <a type="button" class="btn btn-secondary" href="/listagem_vendas">
            <i class="fas fa-chevron-left"></i>
            Voltar
        </a>
    </div>

</div>

@endsection