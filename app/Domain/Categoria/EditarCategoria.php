<?php

namespace App\Domain\Categoria;

class EditarCategoria
{
    /**
     * @var CategoriaRepository
     */
    private $categorias;

    public function __construct(CategoriaRepository $categorias)
    {
        $this->categorias = $categorias;
    }

    public function executar(int $id, array $dados)
    {
        $categoria = $this->categorias->find($id);

        $categoria->nome = $dados['nome'];
        $categoria->descricao = $dados['descricao'];

        $this->categorias->salvar($categoria);
    }
}
