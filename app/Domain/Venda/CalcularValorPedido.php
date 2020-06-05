<?php

namespace App\Domain\Venda;

use App\Domain\Produto\Produto;
use Illuminate\Support\Collection;

class CalcularValorPedido
{
    public function executar(Collection $produtos)
    {
    	return $produtos->sum(function (Produto $produto) {
    		if ($produto->valor > 0)
    		{
    			return $produto->valor;
    		}
    	});
	}
}
