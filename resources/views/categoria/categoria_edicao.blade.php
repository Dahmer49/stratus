@extends('layouts.app')

@section('content')

<div class="container">

	<div class="col-md-12 mb-4">
		<h4>Edição da Categoria: {{ $categoria->nome }}</h4>
	</div>

	<form method="POST" action="/editar_categoria/{{ $categoria->id }}">
	    @csrf

	    <div class="col-md-12 form-group">
	    	<label for="nome">Nome: <span class="text-danger">*</span></label>
	    	<input class="form-control" type="text" id="nome" name="nome" value="{{ $categoria->nome }}" required>
	    </div>
	    <div class="col-md-12 form-group">
	    	<label for="descricao">Descrição: <span class="text-danger">*</span></label>
	    	<input class="form-control" type="text" id="descricao" name="descricao" value="{{ $categoria->descricao }}" required>
	    </div>
	    <div class="col-md-12 text-center">
		    <button class="btn btn-success" type="submit">
		    	<i class="fas fa-check"></i>
			    Salvar
			</button>
		    <a type="button" class="btn btn-secondary" href="/listagem_categorias">
		    	<i class="fas fa-chevron-left"></i>
		    	Voltar
		    </a>
	    </div>

	</form>

</div>

@endsection