<?php

namespace App\Domain\Cliente;

class CadastrarCliente
{
    /**
     * @var ClienteRepository
     */
    private $clientes;

    public function __construct(ClienteRepository $clientes)
    {
        $this->clientes = $clientes;
    }

    public function executar(array $dados)
    {
        $cliente = new Cliente();

		$cliente->nome = $dados['nome'];
		$cliente->cpf = $dados['cpf'];
		$cliente->telefone = $dados['telefone'];
		$cliente->email = $dados['email'];
		$cliente->data_nascimento = $dados['data_nascimento'];

        $this->clientes->salvar($cliente);
    }
}
