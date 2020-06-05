<form method="POST" action="/editar_produto/{{ $produto->id }}">
    @csrf

    <label for="nome">Nome:</label>
    <input type="text" id="nome" name="nome" value="{{ $produto->nome }}">
    <label for="valor">Valor:</label>
    <input type="text" id="valor" name="valor" required value="{{ $produto->valor }}">
    <select id="categoria_id" name="categoria_id" required>
    	<option value="">Selecione uma opção...</option>	
    	@foreach($categorias as $categoria)
    		@if($categoria->id !== $produto->categoria_id)
				<option value="{{ $categoria->id }}">{{ $categoria->nome }}</option>
			@else
				<option selected value="{{ $categoria->id }}">{{ $categoria->nome }}</option>
			@endif
    	@endforeach
    </select>
    <button type="submit">Salvar</button>
    <a href="/listagem_produtos">Voltar</a>
</form>
