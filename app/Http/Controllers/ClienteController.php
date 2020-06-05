<?php

namespace App\Http\Controllers;

use App\Domain\Cliente\CadastrarCliente;
use App\Domain\Cliente\EditarCliente;
use App\Domain\Cliente\ClienteRepository;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ClienteController extends Controller
{
    /**
     * @var ClienteRepository
     */
    private $clientes;

    public function __construct(ClienteRepository $clientes)
    {
        $this->clientes = $clientes;

        $this->middleware('auth');
    }

    public function index()
    {
        $clientes = DB::table('clientes')->paginate(15);

        return view('cliente.cliente_index', ['clientes' => $clientes]);
    }

    public function cadastrar(Request $request, CadastrarCliente $service)
    {
        $dados = [
            'nome' => $request->input('nome'),
            'cpf' => $request->input('cpf'),
            'telefone' => $request->input('telefone'),
            'email' => $request->input('email'),
            'data_nascimento' => $request->input('data_nascimento'),
        ];

        $service->executar($dados);

        return redirect()->route('listagem_clientes');
    }

    public function editar(Request $request, int $id, EditarCliente $service)
    {
        $dados = [
            'nome' => $request->input('nome'),
            'cpf' => $request->input('cpf'),
            'telefone' => $request->input('telefone'),
            'email' => $request->input('email'),
            'data_nascimento' => $request->input('data_nascimento'),
        ];

        $service->executar($id, $dados);

        return redirect()->route('listagem_clientes');
    }

    public function formCadastro()
    {
        return view('cliente.cliente_cadastro');
    }

    public function formEdicao(int $id)
    {
        $cliente = $this->clientes->find($id);

        return view('cliente.cliente_edicao', ['cliente' => $cliente]);
    }

    public function apagar(int $id)
    {
        $this->clientes->apagar($id);

        return redirect()->route('listagem_clientes');
    }

}
