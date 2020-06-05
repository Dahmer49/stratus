<a href="/cadastro_categorias">Cadastrar</a>

<table>
    <thead>
        <tr>
            <th>Id</th>
            <th>Nome</th>
            <th>Ações</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($categorias as $categoria)
            <tr>
                <td>
                    {{ $categoria->id }}
                </td>
                <td>
                    {{ $categoria->nome }}
                </td>
                <td>
                    <a href="/edicao_categorias/{{ $categoria->id }}">Editar</a>
                    <a href="/apagar_categoria/{{ $categoria->id }}">Excluir</a>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

{{ $categorias->links() }}

<a href="/home">Voltar</a>