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
            </tr>
        @endforeach
    </tbody>
</table>

{{ $categorias->links() }}
