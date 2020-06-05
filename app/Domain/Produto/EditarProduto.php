<?php

namespace App\Domain\Produto;

class EditarProduto
{
    /**
     * @var ProdutoRepository
     */
    private $produtos;

    public function __construct(ProdutoRepository $produtos)
    {
        $this->produtos = $produtos;
    }

    public function executar(int $id, array $dados)
    {
        $produto = $this->produtos->find($id);

        $produto->nome = $dados['nome'];
        $produto->categoria_id = $dados['categoria_id'];
        $produto->valor = $dados['valor'];

        $this->produtos->salvar($produto);
    }
}
