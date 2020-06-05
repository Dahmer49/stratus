<form method="POST" action="/editar_cliente/{{ $cliente->id }}">
    @csrf

    <label for="nome">Nome:</label>
    <input type="text" id="nome" name="nome" required value="{{ $cliente->nome }}">
    <label for="cpf">CPF:</label>
    <input type="text" id="cpf" name="cpf" required value="{{ $cliente->cpf }}">
    <label for="telefone">Telefone:</label>
    <input type="text" id="telefone" name="telefone" required value="{{ $cliente->telefone }}">
    <label for="email">Email:</label>
    <input type="text" id="email" name="email" required value="{{ $cliente->email }}">
    <label for="data_nascimento">Data de Nascimento:</label>
    <input type="text" id="data_nascimento" name="data_nascimento" required value="{{ $cliente->data_nascimento }}">
    <button type="submit">Salvar</button>
    <a href="/listagem_clientes">Voltar</a>
</form>
