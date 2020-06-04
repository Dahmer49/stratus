<form method="POST" action="/editar_categoria/{{ $categoria->id }}">
    @csrf

    <input type="hidden" id="id" value="{{ $categoria->id }}">
    <label for="nome">Nome:</label>
    <input type="text" id="nome" name="nome" value="{{ $categoria->nome }}">
    <label for="descricao">Descrição:</label>
    <input type="text" id="descricao" name="descricao" value="{{ $categoria->descricao }}">
    <button type="submit">Salvar</button>
</form>
