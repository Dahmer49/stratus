<?php

declare(strict_types=1);

namespace Tests\Unit;

use App\Domain\Venda\CalcularDesconto;
use Tests\TestCase;

class CalcularDescontoTest extends TestCase
{
	public function testCalcularDescontoCincoPorcento()
	{
		$valorTotal = 120.00;

		$service = new CalcularDesconto();

		$valorComDesconto = $service->executar($valorTotal);

		$this->assertEquals($valorComDesconto, 114.00);
	}

	public function testCalcularDescontoDezPorcento()
	{
		$valorTotal = 380.00;

		$service = new CalcularDesconto();

		$valorComDesconto = $service->executar($valorTotal);

		$this->assertEquals($valorComDesconto, 342.00);
	}

	public function testCalcularDescontoQuinzePorcento()
	{
		$valorTotal = 980.00;

		$service = new CalcularDesconto();

		$valorComDesconto = $service->executar($valorTotal);

		$this->assertEquals($valorComDesconto, 833.00);
	}

	public function testCalcularDescontoDezoitoPorcento()
	{
		$valorTotal = 1895.00;

		$service = new CalcularDesconto();

		$valorComDesconto = $service->executar($valorTotal);

		$this->assertEquals($valorComDesconto, 1553.90);
	}

	public function testCalcularDescontoVintePorcento()
	{
		$valorTotal = 4750.00;

		$service = new CalcularDesconto();

		$valorComDesconto = $service->executar($valorTotal);

		$this->assertEquals($valorComDesconto, 3800.00);
	}
}
