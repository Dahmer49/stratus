<?php

namespace App\Domain\Produto;

class ProdutoRepository
{
    public function salvar(Produto $produto)
    {
        $produto->save();
    }

    public function find(int $id, array $relations = [])
    {
        return Produto::with($relations)->find($id);
	}

    public function findAll(array $ids)
    {
        return Produto::find($ids);
    }

	public function apagar(int $id)
	{
		return Produto::destroy($id);
	}
}
