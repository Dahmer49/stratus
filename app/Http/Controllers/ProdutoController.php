<?php

namespace App\Http\Controllers;

use App\Domain\Categoria\Categoria;
use App\Domain\Produto\CadastrarProduto;
use App\Domain\Produto\EditarProduto;
use App\Domain\Produto\ProdutoRepository;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProdutoController extends Controller
{
    /**
     * @var ProdutoRepository
     */
    private $produtos;

    public function __construct(ProdutoRepository $produtos)
    {
        $this->produtos = $produtos;

        $this->middleware('auth');
    }

    public function index()
    {
        $produtos = DB::table('produtos')
                        ->join('categorias', 'produtos.categoria_id', '=', 'categorias.id')
                        ->select(
                            'produtos.id as id',
                            'produtos.nome as produto',
                            'produtos.valor as valor',
                            'categorias.nome as categoria'
                        )
                        ->paginate(15);

        return view('produto.produto_index', ['produtos' => $produtos]);
    }

    public function cadastrar(Request $request, CadastrarProduto $service)
    {
        $dados = [
            'nome' => $request->input('nome'),
            'categoria_id' => $request->input('categoria_id'),
            'valor' => $request->input('valor'),
        ];

        $service->executar($dados);

        return redirect()->route('listagem_produtos');
    }

    public function editar(Request $request, int $id, EditarProduto $service)
    {
        $dados = [
            'nome' => $request->input('nome'),
            'categoria_id' => $request->input('categoria_id'),
            'valor' => $request->input('valor'),
        ];

        $service->executar($id, $dados);

        return redirect()->route('listagem_produtos');
    }

    public function formCadastro()
    {
        $categorias = Categoria::all();

        return view('produto.produto_cadastro', ['categorias' => $categorias]);
    }

    public function formEdicao(int $id)
    {
        $produto = $this->produtos->find($id);
        $categorias = Categoria::all();

        return view('produto.produto_edicao', ['produto' => $produto, 'categorias' => $categorias]);
    }

    public function apagar(int $id)
    {
        $this->produtos->apagar($id);

        return redirect()->route('listagem_produtos');
    }

}
