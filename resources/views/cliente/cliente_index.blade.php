<a href="/cadastro_clientes">Cadastrar</a>

<table>
    <thead>
        <tr>
            <th>Id</th>
            <th>Nome</th>
            <th>CPF</th>
            <th>Telefone</th>
            <th>Email</th>
            <th>Data de Nascimento</th>
            <th>Ações</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($clientes as $cliente)
            <tr>
                <td>
                    {{ $cliente->id }}
                </td>
                <td>
                    {{ $cliente->nome }}
                </td>
                <td>
                    {{ $cliente->cpf }}
                </td>
                <td>
                    {{ $cliente->telefone }}
                </td>
                <td>
                    {{ $cliente->email }}
                </td>
                <td>
                    {{ $cliente->data_nascimento }}
                </td>
                <td>
                    <a href="/edicao_clientes/{{ $cliente->id }}">Editar</a>
                    <a href="/apagar_clientes/{{ $cliente->id }}">Excluir</a>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

{{ $clientes->links() }}

<a href="/home">Voltar</a>