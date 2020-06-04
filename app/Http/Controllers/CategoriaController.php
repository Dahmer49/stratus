<?php

namespace App\Http\Controllers;

use App\Domain\Categoria\CadastrarCategoria;
use App\Domain\Categoria\EditarCategoria;
use App\Domain\Categoria\CategoriaRepository;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoriaController extends Controller
{
    /**
     * @var CategoriaRepository
     */
    private $categorias;

    public function __construct(CategoriaRepository $categorias)
    {
        $this->categorias = $categorias;

        $this->middleware('auth');
    }

    public function index()
    {
        $categorias = DB::table('categorias')->paginate(15);

        return view('categoria.categoria_index', ['categorias' => $categorias]);
    }

    public function cadastrar(Request $request, CadastrarCategoria $service)
    {
        $dados = [
            'nome' => $request->input('nome'),
            'descricao' => $request->input('descricao'),
        ];

        $service->executar($dados);

        return redirect()->route('listagem_categorias');
    }

    public function editar(Request $request, int $id, EditarCategoria $service)
    {
        $dados = [
            'nome' => $request->input('nome'),
            'descricao' => $request->input('descricao'),
        ];

        $service->executar($id, $dados);

        return redirect()->route('listagem_categorias');
    }

    public function formCadastro()
    {
        return view('categoria.categoria_cadastro');
    }

    public function formEdicao(int $id)
    {
        $categoria = $this->categorias->find($id);

        return view('categoria.categoria_edicao', ['categoria' => $categoria]);
    }

    public function apagar(int $id)
    {
        $this->categorias->apagar($id);

        return redirect()->route('listagem_categorias');
    }

}
