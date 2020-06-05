<?php

namespace App\Domain\Cliente;

class EditarCliente
{
    /**
     * @var ClienteRepository
     */
    private $clientes;

    public function __construct(ClienteRepository $clientes)
    {
        $this->clientes = $clientes;
    }

    public function executar(int $id, array $dados)
    {
        $cliente = $this->clientes->find($id);

		$cliente->nome = $dados['nome'];
		$cliente->cpf = $dados['cpf'];
		$cliente->telefone = $dados['telefone'];
		$cliente->email = $dados['email'];
		$cliente->data_nascimento = $dados['data_nascimento'];

        $this->clientes->salvar($cliente);
    }
}
