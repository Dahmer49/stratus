<a href="/cadastro_produtos">Cadastrar</a>

<table>
    <thead>
        <tr>
            <th>Id</th>
            <th>Nome</th>
            <th>Valor</th>
            <th>Categoria</th>
            <th>Ações</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($produtos as $produto)
            <tr>
                <td>
                    {{ $produto->id }}
                </td>
                <td>
                    {{ $produto->produto }}
                </td>
                <td>
                    {{ $produto->valor }}
                </td>
                <td>
                    {{ $produto->categoria }}
                </td>
                <td>
                    <a href="/edicao_produtos/{{ $produto->id }}">Editar</a>
                    <a href="/apagar_produtos/{{ $produto->id }}">Excluir</a>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

{{ $produtos->links() }}

<a href="/home">Voltar</a>