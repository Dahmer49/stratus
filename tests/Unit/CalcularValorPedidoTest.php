<?php

declare(strict_types=1);

namespace Tests\Unit;

use App\Domain\Produto\Produto;
use App\Domain\Venda\CalcularValorPedido;
use Tests\TestCase;

class CalcularValorPedidoTest extends TestCase
{
	public function testCalcularValorCorreto()
	{
		$produtoUm = $this->criarProduto(1, 200.08);
		$produtoDois = $this->criarProduto(2, 56.07);

		$produtos = collect();
		$produtos->add($produtoUm);
		$produtos->add($produtoDois);

		$service = new CalcularValorPedido();

		$valorPedido = $service->executar($produtos);

		$this->assertEquals($valorPedido, 256.15);
	}

	public function testCaclularValorNegativo()
	{
		$produtoUm = $this->criarProduto(1, -200.08);
		$produtoDois = $this->criarProduto(2, 56.07);

		$produtos = collect();
		$produtos->add($produtoUm);
		$produtos->add($produtoDois);

		$service = new CalcularValorPedido();

		$valorPedido = $service->executar($produtos);

		$this->assertEquals($valorPedido, 56.07);
	}

	public function testCalcularValorErrado()
	{
		$produtoUm = $this->criarProduto(1, 200.08);
		$produtoDois = $this->criarProduto(2, 56.07);

		$produtos = collect();
		$produtos->add($produtoUm);
		$produtos->add($produtoDois);

		$service = new CalcularValorPedido();

		$valorPedido = $service->executar($produtos);

		$this->assertNotEquals($valorPedido, 9999999);
	}

	private function criarProduto(int $id, float $valor)
	{
		$produto = new Produto();

		$produto->id = $id;
		$produto->valor = $valor;
		$produto->quantidade = 1;

		return $produto;
	}
}
