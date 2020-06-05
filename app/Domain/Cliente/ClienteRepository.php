<?php

namespace App\Domain\Cliente;

class ClienteRepository
{
    public function salvar(Cliente $cliente)
    {
        $cliente->save();
    }

    public function find(int $id)
    {
        return Cliente::find($id);
	}

	public function apagar(int $id)
	{
		return Cliente::destroy($id);
	}
}
