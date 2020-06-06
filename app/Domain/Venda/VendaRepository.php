<?php

namespace App\Domain\Venda;

class VendaRepository
{
    public function salvar(Venda $venda)
    {
        $venda->save();

        $venda->vendaProduto()->saveMany($venda->obterVendaProduto());
    }

    public function find(int $id, array $relations = [])
    {
        return Venda::with($relations)->find($id);
	}

	public function apagar(int $id)
	{
		return Venda::destroy($id);
	}
}
