<?php

namespace App\Domain\Categoria;

class CadastrarCategoria
{
    /**
     * @var CategoriaRepository
     */
    private $categorias;

    public function __construct(CategoriaRepository $categorias)
    {
        $this->categorias = $categorias;
    }

    public function executar(array $dados)
    {
        $categoria = new Categoria();

        $categoria->nome = $dados['nome'];
        $categoria->descricao = $dados['descricao'];

        $this->categorias->salvar($categoria);
    }
}
