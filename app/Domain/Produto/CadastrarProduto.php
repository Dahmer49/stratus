<?php

namespace App\Domain\Produto;

class CadastrarProduto
{
    /**
     * @var ProdutoRepository
     */
    private $produtos;

    public function __construct(ProdutoRepository $produtos)
    {
        $this->produtos = $produtos;
    }

    public function executar(array $dados)
    {
        $produto = new Produto();

        $produto->nome = $dados['nome'];
        $produto->categoria_id = $dados['categoria_id'];
        $produto->valor = $dados['valor'];

        $this->produtos->salvar($produto);
    }
}
