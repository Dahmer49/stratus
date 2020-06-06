@extends('layouts.app')

@section('content')

<div class="container">
    <div class="offset-md-10 col-md-2 mb-4">
        <a type="button" class="btn btn-primary" href="/cadastro_vendas">
            <i class="fas fa-plus"></i>
            Cadastrar Venda
        </a>
    </div>

    {{ $vendas->links() }}

    <table class="table table-striped table-hover">
        <thead>
            <tr>
                <th>Id</th>
                <th>Produto</th>
                <th>Valor Total</th>
                <th>Valor com Desconto</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($vendas as $venda)
                <tr>
                    <td>
                        {{ $venda->id }}
                    </td>
                    <td>
                        {{ $venda->produto }}
                    </td>
                    <td>
                        {{ $venda->valor }}
                    </td>
                    <td>
                        {{ $venda->valor_com_desconto }}
                    </td>
                    <td>
                        <a type="button" class="btn btn-warning" href="/visualizar_venda/{{ $venda->id }}">
                            <i class="fas fa-eye"></i>
                        </a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {{ $vendas->links() }}

    <div class="text-center">
        <a type="button" class="btn btn-secondary" href="/home">
            <i class="fas fa-chevron-left"></i>
            Voltar
        </a>
    </div>
    
</div>

@endsection
