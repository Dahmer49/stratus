<?php

declare(strict_types=1);

namespace Tests\Feature\Cliente;

use App\Domain\Cliente\Cliente;
use App\Domain\Cliente\ClienteRepository;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Http\Response;
use Tests\TestCase;

class ClienteTest extends TestCase
{
    use RefreshDatabase, WithoutMiddleware;

    public function testCadastraCliente()
    {
        $cliente = $this->criarCliente();

        $clienteRepository = new ClienteRepository();
        $clienteRepository->salvar($cliente);

	    $this->assertDatabaseHas('clientes', [
	        'nome' => 'Nome teste',
	    ]);
    }

    public function testEditaCliente()
    {
        $cliente = $this->criarCliente();
        $cliente->nome = 'Novo nome teste';

        $clienteRepository = new ClienteRepository();
        $clienteRepository->salvar($cliente);

        $this->assertDatabaseHas('clientes', [
            'nome' => 'Novo nome teste',
        ]);
    }

    public function testExcluiCliente()
    {
        $cliente = $this->criarCliente();

        $clienteRepository = new ClienteRepository();
        $clienteRepository->salvar($cliente);
        $clienteRepository->apagar($cliente->id);

        $this->assertDatabaseMissing('clientes', [
            'nome' => 'Nome teste',
        ]);   
    }

    public function testObterCliente()
    {
        $cliente = $this->criarCliente();

        $clienteRepository = new ClienteRepository();
        $clienteRepository->salvar($cliente);
        $clienteRepository->find($cliente->id);

        $this->assertEquals(1, $cliente->id);
    }

    private function criarCliente(): Cliente
    {
        $cliente = new Cliente();
        $cliente->nome = 'Nome teste';
		$cliente->cpf = '000000';
		$cliente->telefone = '000000';
		$cliente->email = '0000000';
		$cliente->data_nascimento = '15/12/1998';

        return $cliente;
    }
}
