@extends('layouts.app')

@section('content')

<div class="container">
    <div class="offset-md-10 col-md-2 mb-4">
        <a type="button" class="btn btn-primary" href="/cadastro_categorias">
            <i class="fas fa-plus"></i>
            Salvar Categoria
        </a>
    </div>

    {{ $categorias->links() }}

    <table class="table table-striped table-hover">
        <thead>
            <tr>
                <th>Id</th>
                <th>Nome</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($categorias as $categoria)
                <tr>
                    <td>
                        {{ $categoria->id }}
                    </td>
                    <td>
                        {{ $categoria->nome }}
                    </td>
                    <td>
                        <a type="button" class="btn btn-warning" href="/edicao_categorias/{{ $categoria->id }}">
                            <i class="fas fa-edit"></i>
                        </a>
                        <a type="button" class="btn btn-danger" href="/apagar_categoria/{{ $categoria->id }}">
                            <i class="fas fa-trash"></i>
                        </a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {{ $categorias->links() }}

    <div class="text-center">
        <a type="button" class="btn btn-secondary" href="/home">
            <i class="fas fa-chevron-left"></i>
            Voltar
        </a>
    </div>
    
</div>

@endsection