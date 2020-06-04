<?php

namespace App\Domain\Categoria;

class CategoriaRepository
{
    public function salvar(Categoria $categoria)
    {
        $categoria->save();
    }

    public function find(int $id)
    {
        return Categoria::find($id);
	}

	public function apagar(int $id)
	{
		return Categoria::destroy($id);
	}
}
