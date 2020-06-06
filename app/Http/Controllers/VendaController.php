<?php

namespace App\Http\Controllers;

use App\Domain\Cliente\Cliente;
use App\Domain\Produto\Produto;
use App\Domain\Venda\Venda;
use App\Domain\Venda\CadastrarVenda;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class VendaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $vendas = DB::table('vendas')
                    ->join('venda_produto', 'venda_produto.venda_id', '=', 'vendas.id')
                    ->join('produtos', 'venda_produto.produto_id', '=', 'produtos.id')
                    ->distinct('vendas.id')
                    ->select(
                        'vendas.id as id',
                        'vendas.valor_total as valor',
                        'vendas.valor_com_desconto'
                    )
                    ->selectRaw("STRING_AGG(produtos.nome, ', ') as produto")
                    ->groupBy('vendas.id')
                    ->paginate(15);

        return view('venda.venda_index', ['vendas' => $vendas]);
    }

    public function cadastrar(Request $request, CadastrarVenda $service)
    {
        $dados = [
            'cliente_id' => $request->input('cliente_id'),
            'produtos' => $request->input('produtos'),
        ];

        $service->executar($dados);

        return redirect()->route('listagem_categorias');
    }

    public function formCadastro()
    {
        $produtos = Produto::all();
        $clientes = Cliente::all();

        return view('venda.venda_cadastro', ['produtos' => $produtos, 'clientes' => $clientes]);
    }

    public function visualizar(int $id)
    {
        $venda = Venda::with(['vendaProduto.produto'])->find($id);

        // foreach ($venda->vendaProduto as $vendaProduto) {
        //     dd($vendaProduto->produto);
        // }

        return view('venda.venda_visualizacao', ['venda' => $venda]);
    }
}
