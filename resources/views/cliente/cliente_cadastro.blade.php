<form method="POST" action="/cadastrar_cliente">
    @csrf

    <label for="nome">Nome:</label>
    <input type="text" id="nome" name="nome" required>
    <label for="cpf">CPF:</label>
    <input type="text" id="cpf" name="cpf" required>
    <label for="telefone">Telefone:</label>
    <input type="text" id="telefone" name="telefone" required>
    <label for="email">Email:</label>
    <input type="text" id="email" name="email" required>
    <label for="data_nascimento">Data de Nascimento:</label>
    <input type="text" id="data_nascimento" name="data_nascimento" required>
	<button type="submit">Salvar</button>
    <a href="/listagem_clientes">Voltar</a>
</form>
