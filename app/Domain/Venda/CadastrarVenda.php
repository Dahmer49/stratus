<?php

namespace App\Domain\Venda;

use App\Domain\Produto\Produto;
use App\Domain\Produto\ProdutoRepository;
use App\Domain\VendaProduto\VendaProduto;

class CadastrarVenda
{
    private $vendas;
    private $produtos;
    private $calcularDesconto;
    private $calcularValorPedido;

    public function __construct(VendaRepository $vendas, ProdutoRepository $produtos, CalcularDesconto $calcularDesconto, CalcularValorPedido $calcularValorPedido)
    {
        $this->vendas = $vendas;
        $this->produtos = $produtos;
        $this->calcularDesconto = $calcularDesconto;
        $this->calcularValorPedido = $calcularValorPedido;
    }

    public function executar(array $dados)
    {
        $venda = new Venda();
        $produtosAr = collect($dados['produtos']);

        $produtosId = $produtosAr->map(function ($produto) {
        	return $produto['produto_id'];
        })->toArray();

        $produtos = $this->produtos->findAll($produtosId);

        $produtos = $produtos->transform(function (Produto $produto) use (&$produtosAr) {
        	$a = $produtosAr->first(function (array $produtoA) use ($produto) {
        		return (int) $produtoA['produto_id'] === $produto->id;
        	});

        	$produto->quantidade = (int) $a['quantidade'];

        	return $produto;
        });

        $venda->cliente_id = $dados['cliente_id'];
        $venda->valor_total = $this->calcularValorPedido->executar($produtos);
        $venda->valor_com_desconto = $this->calcularDesconto->executar($venda->valor_total);

        $this->adicionarVendaProduto($dados['produtos'], $venda);

         $this->vendas->salvar($venda);
    }

    private function adicionarVendaProduto(array $vendaProdutos, Venda $venda): void
    {
        foreach ($vendaProdutos as $dados)
        {
            $vendaProduto = new VendaProduto();
            $vendaProduto->produto_id = $dados['produto_id'];
            $vendaProduto->valor = $dados['valor'];
            $vendaProduto->quantidade = $dados['quantidade'];

            $venda->adicionarVendaProduto($vendaProduto);
        }
    }
}
