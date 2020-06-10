@extends('layouts.app')

@section('content')
<div class="container">
    <div class="offset-md-10 col-md-2 mb-4">
        <a type="button" class="btn btn-primary" href="/cadastro_produtos">
            <i class="fas fa-plus"></i>
            Salvar Produto
        </a>
    </div>

    {{ $produtos->links() }}

    <table class="table table-striped table-hover">
        <thead>
            <tr>
                <th>Id</th>
                <th>Nome</th>
                <th>Valor</th>
                <th>Categoria</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($produtos as $produto)
                <tr>
                    <td>
                        {{ $produto->id }}
                    </td>
                    <td>
                        {{ $produto->produto }}
                    </td>
                    <td>
                        {{ $produto->valor }}
                    </td>
                    <td>
                        {{ $produto->categoria }}
                    </td>
                    <td>
                        <a type="button" class="btn btn-warning" href="/edicao_produtos/{{ $produto->id }}">
                            <i class="fas fa-edit"></i>
                        </a>
                        <a type="button" class="btn btn-danger" href="/apagar_produtos/{{ $produto->id }}">
                            <i class="fas fa-trash"></i>
                        </a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    
    {{ $produtos->links() }}

    <div class="text-center">
        <a type="button" class="btn btn-secondary" href="/home">
            <i class="fas fa-chevron-left"></i>
            Voltar
        </a>
    </div>

</div>

@endsection