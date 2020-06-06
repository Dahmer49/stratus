@extends('layouts.app')

@section('content')

<div class="container">
    <div class="offset-md-10 col-md-2 mb-4">
        <a type="button" class="btn btn-primary" href="/cadastro_clientes">
            <i class="fas fa-plus"></i>
            Cadastrar Produto
        </a>
    </div>

    {{ $clientes->links() }}

    <table class="table table-striped table-hover">
        <thead>
            <tr>
                <th>Id</th>
                <th>Nome</th>
                <th>CPF</th>
                <th>Telefone</th>
                <th>Email</th>
                <th>Data de Nascimento</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($clientes as $cliente)
                <tr>
                    <td>
                        {{ $cliente->id }}
                    </td>
                    <td>
                        {{ $cliente->nome }}
                    </td>
                    <td>
                        {{ $cliente->cpf }}
                    </td>
                    <td>
                        {{ $cliente->telefone }}
                    </td>
                    <td>
                        {{ $cliente->email }}
                    </td>
                    <td>
                        {{ $cliente->data_nascimento }}
                    </td>
                    <td>
                        <a type="button" class="btn btn-warning" href="/edicao_clientes/{{ $cliente->id }}">
                            <i class="fas fa-edit"></i>
                        </a>
                        <a type="button" class="btn btn-danger" href="/apagar_clientes/{{ $cliente->id }}">
                            <i class="fas fa-trash"></i>
                        </a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {{ $clientes->links() }}

    <div class="text-center">
        <a type="button" class="btn btn-secondary" href="/home">
            <i class="fas fa-chevron-left"></i>
            Voltar
        </a>
    </div>

</div>

@endsection