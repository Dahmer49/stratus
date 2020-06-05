<form method="POST" action="/cadastrar_produto">
    @csrf

    <label for="nome">Nome:</label>
    <input type="text" id="nome" name="nome" required>
    <label for="valor">Valor:</label>
    <input type="text" id="valor" name="valor" required>
    <label for="categoria_id">Categoria:</label>
    <select id="categoria_id" name="categoria_id" required>
    	<option value="">Selecione uma opção...</option>	
    	@foreach($categorias as $categoria)
		<option value="{{ $categoria->id }}">{{ $categoria->nome }}</option>
    	@endforeach
    </select>
    <button type="submit">Salvar</button>
    <a href="/listagem_produtos">Voltar</a>
</form>
