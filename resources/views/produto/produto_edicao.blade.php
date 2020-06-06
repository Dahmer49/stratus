@extends('layouts.app')

@section('content')

<div class="container">

    <div class="col-md-12 mb-4">
        <h4>Edição do Produto: {{ $produto->nome }}</h4>
    </div>

    <form method="POST" action="/editar_produto/{{ $produto->id }}">
        @csrf

        <div class="col-md-12 form-group">
            <label for="nome">Nome: <span class="text-danger">*</span></label>
            <input class="form-control" type="text" id="nome" name="nome" required value="{{ $produto->nome }}">
        </div>
        <div class="col-md-12 form-group">
            <label for="valor">Valor: <span class="text-danger">* </span></label>
            <input class="form-control" type="number" id="valor" name="valor" required value="{{ $produto->valor }}">
        </div>
        <div class="col-md-12 form-group">
            <label for="categoria_id">Categoria: <span class="text-danger">*</span></label>
            <select class="form-control" id="categoria_id" name="categoria_id" required>
                <option value="">Selecione uma opção...</option>    
                @foreach($categorias as $categoria)
                    @if($categoria->id !== $produto->categoria_id)
                        <option value="{{ $categoria->id }}">{{ $categoria->nome }}</option>
                    @else
                        <option selected value="{{ $categoria->id }}">{{ $categoria->nome }}</option>
                    @endif
                @endforeach
            </select>
        </div>
        <div class="col-md-12 text-center">
            <button class="btn btn-success" type="submit">
                <i class="fas fa-check"></i>
                Salvar
            </button>
            <a type="button" class="btn btn-secondary" href="/listagem_produtos">
                <i class="fas fa-chevron-left"></i>
                Voltar
            </a>
        </div>
    </form>

</div>

@endsection