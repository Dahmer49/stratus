<form method="POST" action="/cadastrar_categoria">
    @csrf

    <label for="nome">Nome:</label>
    <input type="text" id="nome" name="nome">
    <label for="descricao">Descrição:</label>
    <input type="text" id="descricao" name="descricao">
    <button type="submit">Salvar</button>
    <a href="/listagem_categorias">Voltar</a>
</form>
