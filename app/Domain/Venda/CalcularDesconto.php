<?php

namespace App\Domain\Venda;

class CalcularDesconto
{
    public function executar(float $valorTotal)
    {
    	$desconto = $this->obterDesconto($valorTotal);

    	return $valorTotal - ($valorTotal / 100 * $desconto);
    }

    private function obterDesconto(float $valorTotal)
    {
    	if ($valorTotal >= 2500)
    	{
    		return 20;
    	} 
    	else if ($valorTotal >= 1500)
    	{
    		return 18;
    	}
    	else if ($valorTotal >= 750)
    	{
    		return 15;
    	}
    	else if ($valorTotal >= 300)
    	{
    		return 10;
    	}

    	return 5;
    }
}
